    @extends('layouts.front')
    @section('content')
        <main>
            <div class="container-fluid main">
                <div class="main-section">
                    <h3 class="text-dark">Find <span class="text-danger fw-bold">Cable TV, Phone & Internet</span>Providers
                        Utilities By Zip Code</h3>
                    <p class="text-dark fw-semi-bold pt-3">See Plan, speeds, prices & ratings of your local provider in one
                        go!
                    </p>
                    <form action="{{ route('company.listing') }}" method="get">
                        <div class="input-btn col-12 d-flex position-relative">
                            <img src="{{ asset('front/images/gps.png') }}" alt="GPS Icon">
                            <input type="text" id="input-text" class="form-control input-zip mr-2 border-danger border-2"
                                placeholder="Enter Your Zip Code*" name="keyword">
                            <button type="submit" class="btn btn-primary search-code fw-bold">Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Company Carousel -->
            <div id="companyCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="container">
                    <div class="slider">
                        <div class="slide-track">
                            @foreach ($companies as $company)
                                <div class="col-6 col-md-3 slide">
                                    <img src="{{ asset('images/company/' . $company->company_logo) }}" class="img-fluid"
                                        alt="{{ $company->company_name }} Logo">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Step Section -->
            <div class="container-fluid step-sec mt-5">
                <div class="container">
                    <div class="step-for-provider py-5">
                        <h3 class="text-primary fw-bold text-center">3 Steps to Find the<span
                                class="text-danger fw-bold">Best
                                Internet Provider</span>in Your Area</h3>

                        <div class="card-group pt-5">
                            <div class="card border-0 text-center m-auto bg-transparent">
                                <img src="{{ asset('front/images/transparency.png') }}" class="search" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This card has even longer content than the first to show that
                                        equal
                                        height action.</p>

                                </div>
                            </div>
                            <div class="card border-0 text-center m-auto bg-transparent">
                                <img src="{{ asset('front/images/compare.png') }}" class="campare" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This card has even longer content than the first to show that
                                        equal
                                        height action.</p>

                                </div>
                            </div>
                            <div class="card border-0 text-center m-auto bg-transparent">
                                <img src="{{ asset('front/images/booking.png') }}" class="booking" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This card has even longer content than the first to show that
                                        equal
                                        height action.</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- Order Section -->
            <div class="container-fluid mb-5 order-section" id="Internet">
                <div class="container">
                    <div class="order-section-content py-5 text-center">
                        <h5 class="text-light">Moving to a New Home?</h5>
                        <h3 class="text-light pb-4">Let's Get You Started!</h3>
                        <div class="row w-100 mx-auto">
                            @foreach ($pricing as $item)
                                <div class="col-12 col-md-4 mb-4 order-card-body">
                                    <div class="card bg-transparent border-2 border-light rounded-3 pt-3">
                                        <div class="wir-led d-flex align-items-center justify-content-center ">
                                            @if ($item->internet == 1)
                                                <img src="{{ asset('front/images/wireless-internet copy.png') }}"
                                                    class="wireless" alt="">
                                            @endif
                                            @if ($item->cable_tv == 1)
                                                <img src="{{ asset('front/images/led (1).png') }}"
                                                    class="cable" alt="">
                                            @endif
                                            @if ($item->phone == 1)
                                                <img src="{{ asset('front/images/phone-call.png') }}"
                                                class="phone" alt="">
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title text-light">{{ $item->internet == 1 ? 'Internet' : '' }}
                                                {{ $item->cable_tv == 1 ? ' + Cable TV' : '' }}
                                                {{ $item->phone == 1 ? ' + Phone' : '' }}</h5>
                                            <h3 class="text-light">${{ $item->internet_charges + $item->cable_tv_charges + $item->phone_charges }}</h3>
                                            {!! $item->description !!}
                                            <div class="button-call">
                                                <button
                                                    class="py-2 px-4 border-2 border-light rounded-pill bg-transparent text-light">
                                                    <a href="tel:{{ $item->phone_number }}" class="text-light">Call to order</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Company Section -->
            <div class="container">
                <h3 class="text-dark fw-bold text-center">All the Leaading Internet Provider You Know & Love</h3>
                <h1 class="place fw-bold text-center">In One Place!</h1>
                <div class="row">
                    @foreach ($companies as $company)
                        <div class="col-12 col-md-3 mb-3">
                            <div class="card border-primary {{ $loop->index == 1 ? 'border-danger bg-danger' : '' }} rounded-4 company-cards"
                                style="height: 400px;">
                                <div class="card-body text-center">
                                    <img src="{{ asset('images/company/' . $company->company_logo) }}" class="w-50"
                                        alt="">
                                    <p class="card-text {{ $loop->index == 1 ? 'text-light' : '' }}">Bundles starting from
                                        <strong>${{ $company->monthly_rate }}/mo.</strong>
                                    </p>
                                    <p class="card-text fs-6 {{ $loop->index == 1 ? 'text-light' : '' }}">
                                        {!! \Illuminate\Support\Str::limit($company->company_description, 200) !!}
                                    </p>
                                    <a href="{{ route('company.show', $company->id) }}"
                                        class="{{ $loop->index == 1 ? 'btn btn-danger order-to border-2 border-light bg-transparent rounded-pill' : 'btn btn-danger call-order bg-transparent text-danger rounded-pill border-2' }} "
                                        style="display: inline-flex ; position: absolute; bottom: 18px; right: 30%;">
                                        Call to order
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Map Section -->
            <div class="container-fluid">
                <div class="map-img">
                    <img src="{{ asset('front/images/Bg3.png') }}" class="" alt="">
                </div>
                <div class="map-content text-center mx-auto">
                    <h2 class="text-danger fw-medium">Internet Near Me!</h2>
                    <p class="pb-3">LocalCableDeals cuts your research time in half by letting you know about the top
                        internet, TV &
                        phone service providers in your area through a simple zip code search, so you can compare them at
                        ease and make an informed decision.</p>
                    <div class="input-btn1 col-12 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('front/images/gps.png') }}" alt="">
                        <input type="text" id="input-text1" class="form-control  mr-2 border-danger border-2"
                            height="50" placeholder="Enter Your Zip Code*">
                        <a onclick="alertShow()" class="btn btn-primary search-code1 fw-bold">Search
                        </a>
                    </div>
                </div>
            </div>
            <!-- Comparison Section -->
            <div class="container camparison mt-5 pt-5">
                <h1 class="text-danger fw-bold text-center">We rearch so you don't have to</h1>
                <p class="text-dark text-center">No one here expects you to know everything about TV and internet—that’s
                    our
                    job. So let our team of
                    experts guide you to the best services and products out there.</p>
                <div class="">
                    <!-- <hr style="color: #003399; width: 15%; margin: auto; height: 3px;border: 2px solid #003399;"> -->
                </div>

                <h2 class="text-black text-center py-5">CHECK OUT OUR HEAD-TO-HEAD CAMPARISON</h2>

                <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="container">
                        <div class="carousel-inner">
                            <!-- First Slide -->
                            @php
                                $chunks = $comparisons->chunk(3); // Divide the comparisons into chunks of 3
                            @endphp

                            @foreach ($chunks as $chunk)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <div class="row row-cols-1 row-cols-md-3 g-4">
                                        @foreach ($chunk as $post)
                                            <div class="col">
                                                <div class="card youtube-card border-0">
                                                    <a href="{{ route('posts.view', $post->slug) }}">
                                                        <img src="{{ asset('images/' . $post->image) }}"
                                                            class="card-img-top" alt="..." style="height: 250px;">
                                                    </a>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-secondary text-center">
                                                            {{ $post->title }}</h5>
                                                        <p class="card-text text-black text-center">{{ $post->excerpt }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                            <!-- Carousel Navigation -->

                        </div>

                        <!-- Carousel Navigation -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#blogCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#blogCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div>
                </div>
                <div class="button-seemore pt-5 mt-5">
                    <button onclick="window.location.href='{{ route('posts') }}'"
                        class="border-danger border-2 text-danger bg-transparent py-1 px-4 d-block mx-auto text-center rounded-pill">see
                        more...</button>
                </div>
            </div>
            <!-- Blog Section -->
            <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="container my-5" id="cableTv">
                    <h1 class="text-primary fw-bold text-center">Catch The latest From Our Cable TV</h1>

                    <div class="carousel-inner">
                        @php
                            $postChunks = $posts->chunk(3); // Divide the posts into chunks of 3
                        @endphp

                        @foreach ($postChunks as $chunk)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                    @foreach ($chunk as $post)
                                        <div class="col">
                                            <div class="card border-0 d-flex flex-column blogs-content">

                                                <img src="{{ asset('images/' . $post->image) }}"
                                                    class="card-img custom-img" alt="...">

                                                <a href="{{ route('posts.view', $post->slug) }}">
                                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                                        <p class="card-text text-light text-center pb-3">
                                                            {{ $post->title }}
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </main>
    @endsection
