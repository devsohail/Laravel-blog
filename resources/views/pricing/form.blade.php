<x-head.tinymce-config/>
<div class="form-group{{ $errors->has('internet') ? 'has-error' : ''}}">
    <div class="row">
        <div class="col-md-6">
            {!! Form::label('internet', 'Internet', ['class' => 'control-label']) !!}
            <div class="checkbox">
                <label>{!! Form::radio('internet', '1') !!} Yes</label>
                <label>{!! Form::radio('internet', '0', true) !!} No</label>
            </div>
        </div>
        <div class="col-md-6">
            {!! Form::label('internet_charges', 'Internet Charges', ['class' => 'control-label']) !!}
            {!! Form::number('internet_charges', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    {!! $errors->first('internet', '<p class="help-block">:message</p>') !!}
    {!! $errors->first('internet_charges', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('cable_tv') ? 'has-error' : ''}}">
    <div class="row">
        <div class="col-md-6">
            <div class="checkbox">
                {!! Form::label('cable_tv', 'Cable Tv', ['class' => 'control-label']) !!}
                <label>{!! Form::radio('cable_tv', '1') !!} Yes</label>
                <label>{!! Form::radio('cable_tv', '0', true) !!} No</label>
            </div>
        </div>
        <div class="col-md-6">
            {!! Form::label('cable_tv_charges', 'Cable Tv Charges', ['class' => 'control-label']) !!}
            {!! Form::number('cable_tv_charges', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    {!! $errors->first('cable_tv', '<p class="help-block">:message</p>') !!}
    {!! $errors->first('cable_tv_charges', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('phone') ? 'has-error' : ''}}">
    <div class="row">
        <div class="col-md-6">
            <div class="checkbox">
                {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
                <label>{!! Form::radio('phone', '1') !!} Yes</label>
                <label>{!! Form::radio('phone', '0', true) !!} No</label>
            </div>
        </div>
        <div class="col-md-6">
            {!! Form::label('phone_charges', 'Phone Charges', ['class' => 'control-label']) !!}
            {!! Form::number('phone_charges', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    {!! $errors->first('phone_charges', '<p class="help-block">:message</p>') !!}
</div>
<div class="row">
    <div class="col-md-2">
        <div class="form-group{{ $errors->has('phone_number') ? 'has-error' : ''}}">
            {!! Form::label('phone_number', 'Phone Number', ['class' => 'control-label']) !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
            {!! $errors->first('phone_number', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-10">
        <div class="form-group{{ $errors->has('description') ? 'has-error' : ''}}">
            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control text-area']) !!}
            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
