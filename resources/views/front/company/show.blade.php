@extends('layouts.front')

@section('content')
    <main>
        <div class="container main-section1">
            <div class="main-content py-5">
                <h2 class="cox-title fw-bold">{{ $company->company_name }}</h2>
                <h4 class="cox-description fw-semi-bold">
                    {{ $company->is_internet ? 'Internet' : '' }}{{ $company->is_cable_tv ? ' | Cable' : '' }}{{ $company->is_phone ? ' | Phone' : '' }}{{ $company->is_home_security ? ' | Home Security' : '' }}
                </h4>
                <div class="text-area">
                    {!! $company->company_description !!}
                </div>
                <button
                    class="land-line py-2 px-4 border-primary text-success fw-bold rounded-pill bg-transparent fs-2 border ">1-855-814-6044</button>
            </div>
        </div>
        <div class="container-fluid deal-section">
            <div class="container py-5">
                <div class="row">
                    @if ($company->text_area_1)
                        <div class="container-fluid content-sec1"
                            style="background-image: url({{ asset('images/company/' . $company->image_area_1) }});">
                            <div class="container first-content py-5">
                                <h3 class="text-primary fw-bold">
                                    {!! $company->text_area_1 !!}
                                </h3>
                            </div>
                        </div>
                    @endif
                    @if ($company->text_area_2)
                        <div class="container-fluid content-sec1"
                            style="background-image: url({{ asset('images/company/' . $company->image_area_2) }});">
                            <div class="container first-content py-5">
                                <h3 class="text-primary fw-bold">
                                    {!! $company->text_area_2 !!}
                                </h3>
                            </div>
                        </div>
                    @endif
                    @if ($company->text_area_3)
                        <div class="container-fluid content-sec1"
                            style="background-image: url({{ asset('images/company/' . $company->image_area_3) }});">
                            <div class="container first-content py-5">
                                <h3 class="text-primary fw-bold">
                                    {!! $company->text_area_3 !!}
                                </h3>
                            </div>
                        </div>
                    @endif
                    @if ($company->text_area_4)
                        <div class="container-fluid content-sec1"
                            style="background-image: url({{ asset('images/company/' . $company->image_area_4) }});">
                            <div class="container first-content py-5">
                                <h3 class="text-primary fw-bold">
                                    {!! $company->text_area_4 !!}
                                </h3>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
