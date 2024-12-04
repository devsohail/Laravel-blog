@extends('layouts.back')
@section('breadcrumb')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Pricing</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/pricing/create') }}" class="btn btn-success btn-sm" title="Add New Pricing">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open([
                            'method' => 'GET',
                            'url' => '/admin/pricing',
                            'class' => 'form-inline my-2 my-lg-0 float-right',
                            'role' => 'search',
                        ]) !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..."
                                value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Internet</th>
                                        <th>Internet Charges</th>
                                        <th>Cable Tv</th>
                                        <th>Cable Tv Charges</th>
                                        <th>Phone</th>
                                        <th>Phone Charges</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pricing as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ ($item->internet == 1) ? 'Yes' : 'No' }}</td>
                                            <td>{{ $item->internet_charges }}</td>
                                            <td>{{ ($item->cable_tv == 1) ? 'Yes' : 'No' }}</td>
                                            <td>{{ $item->cable_tv_charges }}</td>
                                            <td>{{ ($item->phone == 1) ? 'Yes' : 'No' }}</td>
                                            <td>{{ $item->phone_charges }}</td>

                                            <td>
                                                <a href="{{ url('/admin/pricing/' . $item->id) }}"
                                                    title="View Pricing"><button class="btn btn-info btn-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                <a href="{{ url('/admin/pricing/' . $item->id . '/edit') }}"
                                                    title="Edit Pricing"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o"
                                                            aria-hidden="true"></i>Edit</button></a>
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'url' => ['/admin/pricing', $item->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true">Delete</i>', [
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'Delete Pricing',
                                                    'onclick' => 'return confirm("Confirm delete?")',
                                                ]) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $pricing->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
