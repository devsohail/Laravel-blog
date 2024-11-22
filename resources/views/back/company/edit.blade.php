@extends('layouts.back')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Company #{{ $company->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/companies') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if (session('flash_message'))
                            <div class="alert alert-success">
                                {{ session('flash_message') }}
                            </div>
                        @endif

                        {!! Form::model($company, [
                            'method' => 'PATCH',
                            'url' => ['/admin/companies', $company->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('back.company.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
