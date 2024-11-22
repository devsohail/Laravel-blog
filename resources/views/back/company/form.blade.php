<x-head.tinymce-config/>
<div class="row">
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('company_name') ? 'has-error' : '' }}">
            {!! Form::label('company_name', 'Company Name', ['class' => 'control-label']) !!}
            {!! Form::text(
                'company_name',
                null,
                'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
            ) !!}
            {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('company_logo') ? 'has-error' : '' }}">
            {!! Form::label('company_logo', 'Company Logo', ['class' => 'control-label']) !!}
            {!! Form::file(
                'company_logo',
                null,
                'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
            ) !!}
            {!! $errors->first('company_logo', '<p class="help-block">:message</p>') !!}
        </div>
        @if ($formMode === 'edit' && $company->company_logo)
            <div class="image-preview">
                <img src="{{ asset('images/company/' . $company->company_logo) }}" alt="Company Logo"
                    style="width: 100px; height: auto;">
                <a href="{{ route('company.remove-img', ['company' => $company->id, 'image' => 'company_logo']) }}"
                    class="btn btn-danger btn-sm">Remove</a>
            </div>
        @endif
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('header_image') ? 'has-error' : '' }}">
            {!! Form::label('header_image', 'Header Image', ['class' => 'control-label']) !!}
            {!! Form::file(
                'header_image',
                null,
                '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
            ) !!}
            {!! $errors->first('header_image', '<p class="help-block">:message</p>') !!}
        </div>
        @if ($formMode === 'edit' && $company->header_image)
            <div class="image-preview">
                <img src="{{ asset('images/company/' . $company->header_image) }}" alt="Header Image"
                    style="width: 100px; height: auto;">
                <a href="{{ route('company.remove-img', ['company' => $company->id, 'image' => 'header_image']) }}"
                    class="btn btn-danger btn-sm">Remove</a>
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('company_description') ? 'has-error' : '' }}">
            {!! Form::label('company_description', 'Company Description', ['class' => 'control-label']) !!}
            {!! Form::textarea(
                'company_description',
                $formMode === 'edit' ? $company->company_description : null,
                'required' == 'required' ? ['class' => 'form-control text-area', 'required' => 'required'] : ['class' => 'form-control text-area'],
            ) !!}
            {!! $errors->first('company_description', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('monthly_rate') ? 'has-error' : '' }}">
            {!! Form::label('monthly_rate', 'Monthly Rate', ['class' => 'control-label']) !!}
            {!! Form::number(
                'monthly_rate',
                null,
                'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
            ) !!}
            {!! $errors->first('monthly_rate', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('zip_code') ? 'has-error' : '' }}">
            {!! Form::label('zip_code', 'Upload Zip Code', ['class' => 'control-label']) !!}
            {!! Form::file(
                'zip_code',
                null,
                '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
            ) !!}
            {!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('is_auto_searchable') ? 'has-error' : '' }}">
            {!! Form::label('is_auto_searchable', 'Auto Searchable', ['class' => 'control-label']) !!}
            <div class="form-check">
                {!! Form::label('is_auto_searchable', 'Yes', ['class' => 'form-check-label']) !!}
                {!! Form::radio('is_auto_searchable', 1, $formMode === 'edit' && $company->is_auto_searchable ? true : false, [
                    'class' => '',
                    'require' => 'required',
                ]) !!}
                {!! Form::label('is_auto_searchable', 'No', ['class' => 'form-check-label']) !!}
                {!! Form::radio('is_auto_searchable', 0, $formMode === 'edit' && !$company->is_auto_searchable ? true : false, [
                    'class' => '',
                    'required' => 'required',
                ]) !!}
            </div>
            {!! $errors->first('is_auto_searchable', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        {!! Form::label('text_area_1', 'Text Area 1', ['class' => 'control-label']) !!}
        {!! Form::textarea('text_area_1', $formMode === 'edit' ? $company->text_area_1 : null, ['class' => 'form-control text-area']) !!}
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('image_area_1') ? 'has-error' : '' }}">
            {!! Form::label('image_area_1', 'Image Area 1', ['class' => 'control-label']) !!}
            {!! Form::file(
                'image_area_1',
                null,
                '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
            ) !!}
            {!! $errors->first('image_area_1', '<p class="help-block">:message</p>') !!}
        </div>
        @if ($formMode === 'edit' && $company->image_area_1)
            <div class="image-preview">
                <img src="{{ asset('images/company/' . $company->image_area_1) }}" alt="Image Area 1"
                    style="width: 100px; height: auto;">
                <a href="{{ route('company.remove-img', ['company' => $company->id, 'image' => 'image_area_1']) }}"
                    class="btn btn-danger btn-sm">Remove</a>
            </div>
        @endif
    </div>
    <div class="col-md-8">
        {!! Form::label('text_area_2', 'Text Area 2', ['class' => 'control-label']) !!}
        {!! Form::textarea('text_area_2', $formMode === 'edit' ? $company->text_area_2 : null, ['class' => 'form-control text-area']) !!}
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('image_area_2') ? 'has-error' : '' }}">
            {!! Form::label('image_area_2', 'Image Area 2', ['class' => 'control-label']) !!}
            {!! Form::file(
                'image_area_2',
                null,
                '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
            ) !!}
            {!! $errors->first('image_area_2', '<p class="help-block">:message</p>') !!}
        </div>
        @if ($formMode === 'edit' && $company->image_area_2)
            <div class="image-preview">
                <img src="{{ asset('images/company/' . $company->image_area_2) }}" alt="Image Area 2"
                    style="width: 100px; height: auto;">
                <a href="{{ route('company.remove-img', ['company' => $company->id, 'image' => 'image_area_2']) }}"
                    class="btn btn-danger btn-sm">Remove</a>
            </div>
        @endif
    </div>
    <div class="col-md-8">
        {!! Form::label('text_area_3', 'Text Area 3', ['class' => 'control-label']) !!}
        {!! Form::textarea('text_area_3', $formMode === 'edit' ? $company->text_area_3 : null, ['class' => 'form-control text-area']) !!}
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('image_area_3') ? 'has-error' : '' }}">
            {!! Form::label('image_area_3', 'Image Area 3', ['class' => 'control-label']) !!}
            {!! Form::file(
                'image_area_3',
                null,
                '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
            ) !!}
            {!! $errors->first('image_area_3', '<p class="help-block">:message</p>') !!}
        </div>
        @if ($formMode === 'edit' && $company->image_area_3)
            <div class="image-preview">
                <img src="{{ asset('images/company/' . $company->image_area_3) }}" alt="Image Area 3"
                    style="width: 100px; height: auto;">
                <a href="{{ route('company.remove-img', ['company' => $company->id, 'image' => 'image_area_3']) }}"
                    class="btn btn-danger btn-sm">Remove</a>
            </div>
        @endif
    </div>
    <div class="col-md-8">
        {!! Form::label('text_area_4', 'Text Area 4', ['class' => 'control-label']) !!}
        {!! Form::textarea('text_area_4', $formMode === 'edit' ? $company->text_area_4 : null, ['class' => 'form-control text-area']) !!}
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('image_area_4') ? 'has-error' : '' }}">
            {!! Form::label('image_area_4', 'Image Area 4', ['class' => 'control-label']) !!}
            {!! Form::file(
                'image_area_4',
                null,
                '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
            ) !!}
            {!! $errors->first('image_area_4', '<p class="help-block">:message</p>') !!}
        </div>
        @if ($formMode === 'edit' && $company->image_area_4)
            <div class="image-preview">
                <img src="{{ asset('images/company/' . $company->image_area_4) }}" alt="Image Area 4"
                    style="width: 100px; height: auto;">
                <a href="{{ route('company.remove-img', ['company' => $company->id, 'image' => 'image_area_4']) }}"
                    class="btn btn-danger btn-sm">Remove</a>
            </div>
        @endif
    </div>
    <div class="col-md-4">
        <div class="form-check">
            <input type="checkbox" name="is_internet" value="1"
                {{ $formMode === 'edit' && $company->is_internet ? 'checked' : '' }}> Internet
            <input type="checkbox" name="is_cable_tv" value="1"
                {{ $formMode === 'edit' && $company->is_cable_tv ? 'checked' : '' }}> Cable TV
            <input type="checkbox" name="is_phone" value="1"
                {{ $formMode === 'edit' && $company->is_phone ? 'checked' : '' }}> Phone
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-check">
            <input type="checkbox" name="is_featured" value="1"
                {{ $formMode === 'edit' && $company->is_featured ? 'checked' : '' }}> Featured
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('speed', 'Speed', ['class' => 'control-label']) !!}
            {!! Form::input('text', 'speed', $formMode === 'edit' ? $company->speed : null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('contract_length', 'Contract Length', ['class' => 'control-label']) !!}
            {!! Form::input('text', 'contract_length', $formMode === 'edit' ? $company->contract_length : null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('connection_type', 'Connection Type', ['class' => 'control-label']) !!}
            {!! Form::input('text', 'connection_type', $formMode === 'edit' ? $company->connection_type : null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>



<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
