@extends('layouts.app')

@section('content')
<div class="brands-container">
    <div class="brands-header">
        <h1 class="brands-title">Top Casino Brands</h1>
        <p class="brands-country">Country: <span>{{ $country_code ?? 'Global' }}</span></p>

        <!-- View Toggle Buttons -->
        <div class="view-toggle">
            <button class="view-btn active" data-view="grid">Grid View</button>
            <button class="view-btn" data-view="list">List View</button>
        </div>
    </div>



    <div class="brands-grid">
        @foreach($displayBrands as $index => $brand)
            @php
                $rating = (int) ($brand->rating ?? 0);
                $rating = max(0, min(5, $rating));
            @endphp

            <div class="brand-card" data-index="{{ $index }}">
                @if($rating >= 4.5)
                    <div class="brand-ribbon">TOP RATED</div>
                @endif

                <div class="brand-image-container">
                    <img
                        src="{{ $brand->brand_image }}"
                        alt="{{ $brand->brand_name }} logo"
                        class="brand-image"
                        loading="lazy"
                    >
                    <div class="brand-image-overlay"></div>
                </div>

                <div class="brand-content">
                    <div class="brand-header">
                        <h3 class="brand-name">{{ $brand->brand_name }}</h3>
                        <div class="brand-rating-badge">
                            <span class="rating-value">{{ $rating }}</span>
                            <span class="rating-star">★</span>
                        </div>
                    </div>

                    <div class="brand-stars">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="star-icon @if($i <= $rating) star-filled @else star-empty @endif" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @endfor
                    </div>

                    <p class="brand-bonus">{{ $brand->bonus_text ?? 'Welcome bonus available' }}</p>

                    <button class="brand-cta">
                        {{ $brand->cta_text ?? 'Jouer Maintenant' }}
                        <span class="cta-arrow">→</span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div> --}}

   <div class="brands-list view-content" id="list-view" style="display: none;">
        @foreach($displayBrands as $index => $brand)
            @php
                $rating = (int) ($brand->rating ?? 0);
                $rating = max(0, min(5, $rating));
            @endphp

            <div class="list-brand-card">
                <div class="list-rating">
                    <span class="list-rating-value">{{ $rating }}.0</span>
                    <div class="list-stars">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="list-star @if($i <= $rating) filled @endif">★</span>
                        @endfor
                    </div>
                </div>

                <div class="list-brand-info">
                    <h3 class="list-brand-name">{{ $brand->brand_name }}</h3>
                    <p class="list-brand-bonus">{{ $brand->bonus_text ?? 'Welcome bonus available' }}</p>
                    <div class="list-bonus-details">
                        <strong>Bonus</strong>
                        <p>{{ $brand->bonus_text ?? 'Welcome bonus available' }}</p>
                    </div>
                </div>

                <button class="list-brand-cta">
                    {{ $brand->cta_text ?? 'JOUER MAINTENANT' }}
                </button>
            </div>
        @endforeach
    </div>
</div>


<div class="background-elements">
    <div class="bg-circle bg-circle-1"></div>
    <div class="bg-circle bg-circle-2"></div>
</div>
@endsection
