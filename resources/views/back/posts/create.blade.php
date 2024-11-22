@extends('layouts.back')
@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0">Add New Post</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
            <li class="breadcrumb-item active">Post Add</li>
        </ol>
    </div><!-- /.col -->

@endsection
@if (session()->has('error') || $errors->any())
    @section('alerts')
        <div class="alert alert-danger alert-dismissible fade show light-green" role="alert">
            {!! session('error') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endsection
@endif
@section('content')
<x-head.tinymce-config/>
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="featured" value="1">
                                <label class="form-check-label" for="exampleCheck1">Featured Post</label>
                            </div>
                            <div class="form-group">
                                <label for="title">Post Title </label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="excerpt">Post Excerpt</label>
                                <textarea id="excerpt" name="excerpt" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Post Description</label>
                                <textarea id="myeditorinstance" name="body" class="form-control text-area" rows="12"></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" name="category" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Post Image</label>
                                <input type="file" name="image" class="form-control-file" id="image">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Create" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
