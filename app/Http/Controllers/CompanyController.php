<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ZipCode;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $company = Company::where('company_name', 'LIKE', "%$keyword%")
                ->orWhere('monthly_rate', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $company = Company::latest()->paginate($perPage);
        }

        return view('back.company.index', compact('company'));
    }
    /**
     * Display a listing of the resource on frontend.
     *
     * @return \Illuminate\View\View
     */
    public function listing(Request $request)
    {
        $keyword = $request->get('keyword');
        $is_internet = $request->get('is_internet');
        $is_cable_tv = $request->get('is_cable_tv');
        $is_phone = $request->get('is_phone');
        $perPage = 25;

        $companyQuery = Company::query();

        if (!empty($keyword)) {
            $companyQuery->where('is_auto_searchable', true)
                ->orWhereHas('zipCodes', function ($query) use ($keyword) {
                    $query->where('zip_code', 'LIKE', "%$keyword%");
                });
        }

        $companyQuery->when($is_internet, function ($query) {
            return $query->where('is_internet', true);
        })
        ->when($is_cable_tv, function ($query) {
            return $query->where('is_cable_tv', true);
        })
        ->when($is_phone, function ($query) {
            return $query->where('is_phone', true);
        });

        $company = $companyQuery->latest()->paginate($perPage);

        $categories = Category::all();
        return view('front.company.listing', compact('company', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('back.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_description' => 'required',
            'monthly_rate' => 'required',
            'image_area_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_area_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_area_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_area_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_internet' => 'nullable',
            'is_cable_tv' => 'nullable',
            'is_phone' => 'nullable',
            'is_featured' => 'nullable',
            'is_auto_searchable' => 'nullable',
            'contract_length' => 'nullable',
            'connection_type' => 'nullable',
            'speed' => 'nullable',
            'text_area_1' => 'nullable',
            'text_area_2' => 'nullable',
            'text_area_3' => 'nullable',
            'text_area_4' => 'nullable',
        ]);

        $imageNames = $this->uploadImage($request);
        $this->processZipCodeFile($request->file('zip_code'), $request->input('company_id'));

        $requestData = array_merge($request->all(), $imageNames);

        Company::create($requestData);

        return redirect('admin/companies')->with('message', 'Company added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('front.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('back.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'company_name' => 'required',
            'company_description' => 'required',
            'monthly_rate' => 'required',
            'is_internet' => 'nullable',
            'is_cable_tv' => 'nullable',
            'is_phone' => 'nullable',
            'is_featured' => 'nullable',
            'is_auto_searchable' => 'nullable',
            'contract_length' => 'nullable',
            'connection_type' => 'nullable',
            'speed' => 'nullable',
            'text_area_1' => 'nullable',
            'text_area_2' => 'nullable',
            'text_area_3' => 'nullable',
            'text_area_4' => 'nullable',
        ]);
        $requestData = $request->all();
        $imageNames = $this->uploadImage($request);
        $request->hasFile('zip_code') ? $this->processZipCodeFile($request->file('zip_code'), $id) : null;

        $requestData = array_merge($request->all(), $imageNames);
        $company = Company::findOrFail($id);
        $company->update($requestData);

        return redirect('admin/companies')->with('message', 'Company updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Company::destroy($id);

        return redirect('admin/companies')->with('message', 'Company deleted!');
    }
    public function removeImage($companyId, $image)
    {
        $company = Company::findOrFail($companyId);
        $company->$image = null;
        $company->save();
        return redirect()->back()->with('flash_message', 'Image removed!');
    }
    public function uploadImage($request)
    {
        $imageFields = ['company_logo', 'header_image', 'image_area_1', 'image_area_2', 'image_area_3', 'image_area_4'];
        $imageNames = [];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $image = $request->file($field);
                $imageName = time() . '_' . $field . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/company'), $imageName);
                $imageNames[$field] = $imageName;
            }
        }

        return $imageNames;
    }
    private function processZipCodeFile($file, $companyId)
    {
        $zipCodes = [];

        if (($handle = fopen($file->getRealPath(), 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $zipCode = $data[0]; // Assuming the zip code is in the first column
                if ($zipCode) {
                    // Check if the zip code already exists for this company
                    $exists = ZipCode::where('zip_code', $zipCode)
                        ->where('company_id', $companyId)
                        ->exists();

                    if (!$exists) {
                        $zipCodes[] = ['zip_code' => $zipCode, 'company_id' => $companyId];
                    }
                }
            }
            fclose($handle);
        }

        if (!empty($zipCodes)) {
            ZipCode::insert($zipCodes);
        }
    }
}
