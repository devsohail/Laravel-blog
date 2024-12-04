<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="description" content="{{ env('APP_DESCRIPTION') }}">
    <meta name="author" content="{{ env('APP_AUTHOR') }}">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- customize-css -->
    <link rel="stylesheet" href="{{ asset('front/css/home.css') }}">
</head>

<body id="top">

    <!-- header
    ================================================== -->
    <header class="header-nav">
        <div class="container py-3">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('front/images/LOgo.png') }}" alt="Logo" width="55">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('company.listing', ['is_cable_tv' => true]) }}">Cable
                                    TV</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('company.listing', ['is_internet' => true]) }}">Internet</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('company.listing', ['is_phone' => true]) }}">Phone</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="providersDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Providers
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="providersDropdown">
                                    @foreach ($companies->take(10) as $company)
                                        <li><a class="dropdown-item"
                                                href="{{ route('company.show', $company->id) }}">{{ $company->company_name }}</a>
                                        </li>
                                    @endforeach
                                    <li><a class="dropdown-item" href="{{ route('company.listing') }}">More</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('posts') }}">Blog</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search" action="{{ route('company.listing') }}" method="get">
                            <input class="form-control me-2 border border-primary rounded-pill bg-light fw-medium"
                                type="search" placeholder="Search" aria-label="Search" style="font-size: 13px;"
                                name="keyword">
                            <button class="btn btn-primary search-code fw-bold" type="submit">
                                <i class="fa-solid fa-magnifying-glass"
                                    style="position: relative; left: 0; display: flex; align-items: center;"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>



    </header>
    @yield('content')
    <!-- footer================================================== -->
    <footer class="pt-4">

        <div class="container-fluid footer-sec mt-5 py-5">

            <div class="first-footer">
                <img src="{{ asset('front/images/Vector Smart Object.png') }}"
                    class="text-center footer-logo d-block mx-auto" alt="">
                <div class="social-logo d-flex justify-content-center align-items-center py-5">
                    <img src="{{ asset('front/images/Vector Smart Object-1.png') }}" alt="">
                    <img src="{{ asset('front/images/Vector Smart Object-2.png') }}" alt="">
                    <img src="{{ asset('front/images/Vector Smart Object-3.png') }}" alt="">
                    <img src="{{ asset('front/images/Vector Smart Object-4.png') }}" alt="">
                </div>
                <div class="lists-tag">
                    @php
                        $chunks = $companies->chunk(6); // Start by chunking into 6
                        $firstChunk = $chunks->shift(); // Get the first chunk of 6
                        $remainingCompanies = $chunks->flatten(); // Flatten the remaining companies
                        $secondChunk = $remainingCompanies->take(4); // Take the next 4
                        $thirdChunk = $remainingCompanies->skip(4)->take(4); // Take the next 4 after skipping the first 4
                    @endphp
                    <ul class="list-1">
                        @foreach ($firstChunk as $company)
                            <li>{{ $company->company_name }}</li>
                        @endforeach
                    </ul>
                    <ul class="list-2">
                        @foreach ($secondChunk as $company)
                            <li>{{ $company->company_name }}</li>
                        @endforeach
                    </ul>
                    <ul class="list-3">
                        @foreach ($thirdChunk as $company)
                            <li>{{ $company->company_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="second-footer pt-5 pb-0">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="border-start border-2 border-light"></li>
                    <li><a href="{{ route('posts') }}">Blog</a></li>

                </ul>
                <p class="text-light">Copyright © {{ env('APP_NAME') }} {{ date('Y') }}, All Rights Reserved.</p>
            </div>

        </div>

    </footer>

    <!-- Fontawesome Code -->
    <script src="https://kit.fontawesome.com/6a2acfaa82.js" crossorigin="anonymous"></script>
    <!-- bootstrap-js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
