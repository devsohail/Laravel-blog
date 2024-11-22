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
                    <div class="location-change">
                        <li class="search-section">
                            <input type="text" id="zipCodeInput" class="input-zip" placeholder="Enter your zip code*">
                            <button class="btn" onclick="searchZip()">Search</button>
                        </li>
                    </div>
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
                            <input type="text" id="zipCodeInput" placeholder="Enter your zip code*" name="keyword">
                            <button class="btn" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
                <h3 class="text-danger fw-medium py-4">All others Plan</h3>
                <div id="tabContent" class="mt-4 row">
                    @foreach ($company as $item)
                        <div class="row service-card mb-4">
                            <div class="inner-container">
                                <!-- Logo section -->
                                <div class="card-section">
                                    <img src="{{ asset('images/company/' . $item->company_logo) }}" alt="Logo"
                                        class="mb-3 w-100">
                                    <a href="{{ route('company.show', $item->id) }}"
                                        class="text-decoration-underline text-dark fw-medium">view details</a>
                                </div>

                                <div class="border-line"></div>

                                <!-- Speed section -->
                                <div class="card-section">
                                    <p class="mb-1">Speeds up to</p>
                                    <strong>{{ $item->speed }}</strong>
                                </div>

                                <div class="border-line"></div>

                                <!-- Contract Length section -->
                                <div class="card-section">
                                    <p class="mb-1">Contract Length</p>
                                    <strong>{{ $item->contract_length ?? 'None' }}</strong>
                                </div>

                                <div class="border-line"></div>

                                <!-- Connection Type section -->
                                <div class="card-section">
                                    <p class="mb-1">Connection Type</p>
                                    <strong>{{ $item->connection_type }}</strong>
                                    <p class="mb-1 rating">Reliability rating<i class="bi bi-info-circle"></i></p>
                                    <div class="d-flex align-items-center gap-2">
                                        <p class="reliability-rating mt-2">High</p>
                                        <div class="reliability-meter">
                                            <div class="reliability-level"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-line"></div>

                                <!-- Price section -->
                                <div class="card-section">
                                    <p class="mb-1">Price</p>
                                    <strong class="price">${{ $item->monthly_rate }}/mo</strong>
                                    <p class="text-dark limit">for {{ $item->contract_length }} mos</p>
                                    <p class="text-dark border-bottom price-title">Price breakdown</p>
                                </div>

                                <!-- Button section -->
                                <div class="card-section text-end">
                                    <p class="text-dark price-title fw-bold">Call to Order.</p>
                                    <p class="phone-number mb-1">(844) 418-5455</p>
                                    <button class="btn btn-custom">Check with Frontier</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="load d-block mx-auto text-center pb-5">
                    <button class="text-light border-2 border-danger rounded-pill bg-danger py-2 px-4">Load more</button>
                </div>
            </div>
        </main>
    </div>
@endsection
