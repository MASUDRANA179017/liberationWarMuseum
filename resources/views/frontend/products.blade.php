@extends('layouts.frontend')
@section('title','Our Products')
@section('content')

<section class="cta-section-two" id="productSection">
    <div class="container">

        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <div class="section__header text-center mt-5 mb-5" data-aos="fade-up" data-aos-duration="1000">

                    <span class="sub-title-main text-white">
                        <i class="fa-solid fa-box-open me-1"></i> Performance
                    </span>

                    <h1 class="title-animation text-white fs-40">
                        <span>Sultana's Dream</span>
                    </h1>


                </div>
            </div>
        </div>

        <div class="award">
            <div class="row" id="productContainer">
                @if(isset($products) && $products->count() > 0)
                @foreach ($products as $index => $product)
                @php
                // Image Logic
                $thumbnail = $product->image ? asset('storage/' . $product->image) : asset('assets/images/no-image.jpg');

                // Route Logic (From Code A)
                $detailsRoute = route('product.details.page', ['productId' => $product->id]);
                @endphp

                <div class="col-12 col-md-6 mb-4 col-lg-6 product-item {{ $index >= 6 ? 'd-none' : '' }}">
                    <div class="award__single" data-aos="fade-up" data-aos-duration="1000">

                        <div class="thumb">
                            <a href="{{ $detailsRoute }}">
                                <img src="{{ $thumbnail }}" alt="{{ $product->name }}" style="width: 100%; height: 300px; object-fit: cover;">
                            </a>
                        </div>

                        <div class="content">
                            <div class="award__content">
                                <h5 class="title-animation text-white fs-22 fw-700 lh-1 mb-3 text-center">
                                    {{ $product->name }}
                                </h5>

                                @if($product->subtitle)
                                <h3 class="title-sm text-white text-center mb-2" style="font-size: 14px; font-weight: 400;">
                                    <i class="fa-solid fa-check me-1"></i> {{ $product->subtitle }}
                                </h3>
                                @endif

                                @if($product->price)
                                <p class="text-center text-white-50 mb-3" style="font-size: 14px;">
                                    {{$product->text_before_price ?? ''}}
                                    <span class="text-white fw-800">{{$product->price}}</span>
                                    {{$product->text_after_price ?? ''}}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>

            @if (isset($products) && $products->count() > 6)
            <div class="row">
                <div class="col-12">
                    <div class="section__cta cta text-center mt-4">
                        <a href="javascript:void(0)" id="viewAllBtn" class="btn--primary">
                            View All <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>

    <div class="cta-bg">
        @php
        $coverPhoto = $allCoverImages->where('page_name', 'product')->first();
        @endphp

        @if ($coverPhoto)
        <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="Product Background" class="parallax-image">
        @else
        <img src="{{ asset('assets/images/page-bg.jpg') }}" alt="Default Background" class="parallax-image">
        @endif
    </div>
</section>

<style>
    .fade-in-bottom {
        animation: fadeInBottom 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
    }

    @keyframes fadeInBottom {
        0% {
            transform: translateY(50px);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const viewAllBtn = document.getElementById('viewAllBtn');
        if (viewAllBtn) {
            viewAllBtn.addEventListener('click', function(e) {
                e.preventDefault();
                // Select all hidden items
                const hiddenItems = document.querySelectorAll('.product-item.d-none');
                hiddenItems.forEach(function(item) {
                    item.classList.remove('d-none');
                    item.classList.add('fade-in-bottom');
                });
                // Hide the button after expanding
                this.closest('.section__cta').style.display = 'none';
            });
        }
    });
</script>

@endsection