@extends('layouts.front')

@section('content')
    <section class="s-content s-content--no-top-padding">
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('images/'.$post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('posts.view', $post->slug) }}">{{ $post->title }}</a>
                                </h5>
                                <p class="card-text">{{ $post->excerpt }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">
                                    By <b>{{ $post->user->name }}</b> in 
                                    <b>{{ optional($post->categories->first())->title }}</b>
                                </small>
                                <a href="{{ route('posts.view', $post->slug) }}" class="btn btn-primary float-right">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
