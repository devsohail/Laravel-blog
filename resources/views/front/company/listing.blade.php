@extends('layouts.front')
@section('content')
    <div class="cable-section">
        <main>
            <div class="container-fluid main">
                <div class="container main-section ">
                    <h3 class="text-light"><span class="text-light fw-bold fs-2">Internet</span> <span
                            class="text-light fs-3 fw-medium">Providers</span>
                        in Huffman</h3>
                    <p class="text-light fw-semi-bold pt-3">See Plan,speeds,srices & rating Of your local provider in one go!
                    </p>
                    <form action="{{ route('company.listing') }}" method="get">
                    <div class="location-change">
                        <li class="search-section">
                            <input type="text" id="zipCodeInput" class="input-zip" placeholder="Enter your zip code*" name="keyword" value="{{ request('keyword') }}">
                            <button class="btn" onclick="searchZip()">Search</button>
                        </li>
                    </div>
                    </form>
                </div>
            </div>
            <div class="container mt-5">
                <ul class="nav nav-tabs" id="navTabs">
                    <li class="nav-items mb-md-1">
                        <a class="nav-links active bg-transparent"
                            href="{{ route('company.listing', ['is_internet' => true]) }}">Internet</a>
                    </li>
                    <li class="nav-items mb-md-1">
                        <a class="nav-links" href="{{ route('company.listing', ['is_cable_tv' => true]) }}">TV</a>
                    </li>
                    <li class="nav-items mb-md-1">
                        <a class="nav-links" href="{{ route('company.listing') }}">TV + Internet + Phone</a>
                    </li>
                    <li class="nav-items mb-md-1">
                        <a class="nav-links" href="{{ route('company.listing') }}">Business</a>
                    </li>

                    <li class="search-section">
                        <form class="d-flex" role="search" action="{{ route('company.listing') }}" method="get">
                            <input type="text" id="zipCodeInput" placeholder="Enter your zip code*" name="keyword" value="{{ request('keyword') }}">
                            <button class="btn" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
                <h3 class="text-danger fw-medium py-4">All others Plan</h3>
                <div id="tabContent" class="mt-4 row">
                    @include('front.company.partials.company_list', ['companies' => $companies])
                </div>
                <div class="load d-block mx-auto text-center pb-5">
                    <button id="load-more" class="text-light border-2 border-danger rounded-pill bg-danger py-2 px-4" data-url="{{ $companies->nextPageUrl() }}">Load more</button>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#load-more').on('click', function() {
                var button = $(this);
                var url = button.data('url');

                if (url) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(response) {
                            $('#tabContent').append(response.companies);
                            button.data('url', response.nextPageUrl);

                            if (!response.nextPageUrl) {
                                button.hide();
                            }
                        },
                        error: function() {
                            alert('Failed to load more companies.');
                        }
                    });
                }
            });
        });
    </script>
@endsection
