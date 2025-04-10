@extends('layouts.master')
@section('main-body')

<main id="content">
    {{-- <div class="container-fluid vh-100"> --}}
        <div class="row g-4 h-100">
            @foreach ($services as $item)
                <div class="col-md-6">
                    @php
                        $image = explode('|', $item->images);
                    @endphp
                    <div class="position-relative overflow-hidden rounded shadow-sm">
                        @foreach ($image as $value)
                            <img src="{{ $value ? $value : url('/front-assets/default-image.jpg') }}" 
                                 alt="{{ $item->name ?? 'Image' }}" class="img-fluid h-100 w-100 rounded">
                        @endforeach
                    </div>
                </div>
        
                <div class="col-md-6 d-flex bg-light rounded shadow-sm">
                    <div class="container py-4">
                        <h2 class="text-start text-dark mb-3">{{ $item->name == 'KYC+CCRV' ? 'Aadhar KYC + Criminal Background Verification' : $item->name }}</h2>
                        <h3 class="text-success text-start mb-3">₹{{ number_format($item->price, 2) }}</h3>
                        
                        <form action="{{ route('cart.add') }}" method="POST" class="text-start">
                            @csrf
                            <div class="row align-items-center mb-3">
                                <div class="col-md-4">
                                    {{-- <label for="tokens" class="form-label fw-semibold">Number of Tokens:</label> --}}
                                    <input type="hidden" id="tokens" name="tokens" min="1" value="1" required class="form-control">
                                    {{-- <div class="input-group">
                                        <button type="button" id="decrease" class="btn btn-outline-secondary">-</button>
                                        
                                        <button type="button" id="increase" class="btn btn-outline-secondary">+</button>
                                    </div> --}}
                                    <input type="hidden" name="pricePerItem" value="{{ $item->price }}">
                                    <input type="hidden" name="serviceName" value="{{ $item->name }}">
                                    <div class="col-md-12" style="margin-top: 30px;">
                                        <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </form>
        
                        <div class="text-muted mt-3 text-start">
                            <p class="lead">{!!  $item->short_description !!}</p>
                            <p>{!!  $item->long_description !!}</p>
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
        


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const tokensInput = document.getElementById('tokens');
        const decreaseButton = document.getElementById('decrease');
        const increaseButton = document.getElementById('increase');

        // Ensure value is not less than 1
        tokensInput.addEventListener('input', () => {
            if (parseInt(tokensInput.value) < 1) {
                tokensInput.value = 1;
            }
        });

        // Decrease value
        decreaseButton.addEventListener('click', () => {
            let currentValue = parseInt(tokensInput.value);
            if (currentValue > 1) {
                tokensInput.value = currentValue - 1;
            }
        });

        // Increase value
        increaseButton.addEventListener('click', () => {
            let currentValue = parseInt(tokensInput.value);
            tokensInput.value = currentValue + 1;
        });
    </script>
</main>
@endsection