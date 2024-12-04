@foreach ($companies as $item)
    <div class="row service-card mb-4">
        <div class="inner-container">
            <!-- Logo section -->
            <div class="card-section">
                <img src="{{ asset('images/company/' . $item->company_logo) }}" alt="Logo" class="mb-3 w-100">
                <a href="{{ route('company.show', $item->id) }}" class="text-decoration-underline text-dark fw-medium">view details</a>
            </div>

            <div class="border-line"></div>

            <!-- Speed section -->
            <div class="card-section">
                <p class="mb-1">Speeds up to</p>
                <strong>{{ $item->speed ?? 'Not Available' }}</strong>
            </div>

            <div class="border-line"></div>

            <!-- Contract Length section -->
            <div class="card-section">
                <p class="mb-1">Contract Length</p>
                <strong>{{ $item->contract_length ?? 'Not Available' }}</strong>
            </div>

            <div class="border-line"></div>

            <!-- Connection Type section -->
            <div class="card-section">
                <p class="mb-1">Connection Type</p>
                <strong>{{ $item->connection_type ?? 'Note Available' }}</strong>
                {{-- <p class="mb-1 rating">Reliability rating<i class="bi bi-info-circle"></i></p>
                <div class="d-flex align-items-center gap-2">
                    <p class="reliability-rating mt-2">High</p>
                    <div class="reliability-meter">
                        <div class="reliability-level"></div>
                    </div>
                </div> --}}
            </div>

            <div class="border-line"></div>

            <!-- Price section -->
            <div class="card-section">
                <p class="mb-1">Price</p>
                <strong class="price">${{ $item->monthly_rate }}/mo</strong>
                {{-- <p class="text-dark limit">for {{ $item->contract_length }} mos</p>
                <p class="text-dark border-bottom price-title">Price breakdown</p> --}}
            </div>

            <!-- Button section -->
            <div class="card-section text-end">
                <p class="text-dark price-title fw-bold">Call to Order.</p>
                <p class="phone-number mb-1">(844) 418-5455</p>
                <button class="btn btn-custom" onclick="window.location.href='{{route('company.show', $item->id)}}'">Check with <b>{{$item->company_name}}</b></button>
            </div>
        </div>
    </div>
@endforeach 