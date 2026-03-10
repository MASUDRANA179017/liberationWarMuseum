@extends('layouts.frontend')
@section('title','All Services')
@section('content')

<style>
    .property-list-img-area .img1.image-anime {
        height: 250px;
        overflow: hidden;
        background-color: #1a1a1a; /* fallback color */
        position: relative;
    }

    .property-list-img-area .img1.image-anime img {
        width: 100%;
        height: auto;
        object-fit: cover;
        object-position: center;
        display: block;
    }
</style>

<section class="cta-section-two" id="filmSection">
    <div class="container">

        <div class="mt-5 row justify-content-center">
            <div class="col-12">
                <div class="mt-5 mb-5 text-center section__header" data-aos="fade-up" data-aos-duration="1000">
                    <span class="text-white sub-title-main">
                        <i class="icon-donation me-1"></i> Services
                    </span>
                    <h1 class="text-white title-animation fs-40">
                        <span>Filmmaking Workshop on</span>
                    </h1>
                    <p class="mt-3 text-center text-white fs-16">
                        Style, Perspectives & Aspiration of Sultana’s Dream
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            @if(isset($films) && $films->count() > 0)
            @foreach($films as $film)
            @php
            // Image Handling
            $firstImage = isset($film->images) ? $film->images->first() : null;
            $imagePath = $firstImage ? asset('storage/' . $firstImage->image) : asset('assets/images/page-bg.jpg');

            // Route Handling
            $detailsRoute = route('film.details', $film->slug);
            @endphp

            <div class="col-lg-4 col-md-6">
                <div class="p-0 property-single-boxarea" data-aos="fade-up" data-aos-duration="1000">

                    <div class="property-list-img-area position-relative">
                        <a href="{{ $detailsRoute }}">
                            <div class="img1 image-anime">
                                <img src="{{ $imagePath }}" alt="{{ $film->film_name }}">
                            </div>
                        </a>

                        <div class="top-0 p-2 position-absolute start-0">
                            <span class="badge bg-primary me-1">Service</span>
                        </div>
                    </div>

                    <div class="property-single-content">
                        <h4 class="one-line title-animation">
                            <a href="{{ $detailsRoute }}">{{ Str::limit($film->film_name, 30, '...') }}</a>
                        </h4>
                        <p class="m-0 text-center fs-14">
                            {{ $film->director_name ?? '' }}
                        </p>
                    </div>

                    <div class="property-details">
                        <p class="m-0 text-center fs-14">
                            {{ $film->director_name ?? '' }}
                        </p>
                    </div>

                </div>
            </div>
            @endforeach
            @else
            <div class="py-5 text-center col-12">
                <p class="text-white">No services found at the moment.</p>
            </div>
            @endif
        </div>

        @if(method_exists($films, 'links'))
        <div class="row">
            <div class="mt-5 col-12 d-flex justify-content-center">
                {{ $films->links() }}
            </div>
        </div>
        @endif

    </div>

    <div class="cta-bg">
        @php
        // Fetching cover photo logic
        $coverPhoto = $allCoverImages->where('page_name', 'film')->first();
        @endphp

        @if ($coverPhoto)
        <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="Service Cover" class="parallax-image">
        @else
        <img src="{{ asset('assets/images/page-bg.jpg') }}" alt="Default Cover" class="parallax-image">
        @endif
    </div>
</section>

@endsection
