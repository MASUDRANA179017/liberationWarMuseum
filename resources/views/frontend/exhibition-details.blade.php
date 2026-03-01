@extends('layouts.frontend')
@section('title','Exhibition Details')
@section('content')
<style>
    .product-card {
        background-color: #ffffff;
        border: 1px solid #e9ecef;
    }

    .nav-tabs .nav-link {
        border: none;
        border-bottom: 3px solid transparent;
        color: #f6881d;
        font-weight: 600;
    }

    .nav-tabs .nav-link.active {
        border-bottom-color: #f6881d;
        color: #f6881d;
        background-color: transparent;
    }

    .features-icon-color {
        color: #f6881d;
    }

    .feature-icon {
        font-size: 1.5rem;
        width: 60px;
        height: 50px;
        line-height: 50px;
        text-align: center;
    }
</style>

<!-- Banner Section -->
<section class="common-banner">
    <div class="container">
        <div class="row">
            <div class="common-banner__content text-center">
                <span class="sub-title-main"><i class="icon-donation"></i> {{$setting->company_name}}</span>
                <h2 class="title-animation">Exhibitions</h2>
            </div>
        </div>
    </div>
    <div class="banner-bg">
        @php
        $coverPhoto = $allCoverImages->where('page_name', 'exhibition')->first();
        @endphp

        @if ($coverPhoto)
        <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="Image">
        @else
        <img src="assets/images/page-bg.jpg" alt="Image">
        @endif
    </div>
</section>

<!-- Product Section -->
<section class="award" id="eventSection">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{route('exhibition.page')}}" aria-label="Discover Our Expertise" title="Discover Our Expertise" class="apece-primary-button mt-4"><i class="fa-solid fa-arrow-left"></i>View All Exhibitions</a>
            </div>
        </div>


        <div class="row g-4">
            <!-- Left Column: Image -->
            <div class="col-lg-5">
                @if($exhibition->images->isNotEmpty())
                <div id="exhibitionCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner rounded-4 shadow-sm">
                        @foreach($exhibition->images as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $image->image) }}"
                                class="d-block w-100 img-fluid"
                                alt="Exhibition Image {{ $key+1 }}"
                                style="aspect-ratio: 1 / 1; object-fit: cover;">
                        </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#exhibitionCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#exhibitionCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                @else
                <img src="https://placehold.co/600x600/dee2e6/495057?text=Floor+Hardener"
                    alt="A sample of the hardened floor surface"
                    class="img-fluid rounded-4 shadow-sm w-100"
                    style="aspect-ratio: 1 / 1; object-fit: cover;"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x600/dee2e6/495057?text=Image+Not+Available';">
                @endif
            </div>

            <!-- Right Column: Details -->
            <div class="col-lg-7">
                <div class="product-card p-4 rounded-4 shadow-sm h-100">
                    <h2 class="title-animation mb-2">
                        {{$exhibition->exhibition_title ?? ''}}
                    </h2>

                    @if($exhibition->director_name)
                    <div class="event-eight-address">
                        <ul>
                            <li class=" fs-19">
                                <span><i class="fa-solid fa-user-tie"></i></span> Director Name: {{ $exhibition->director_name }}
                            </li>
                        </ul>
                    </div>
                    @endif

                    <!-- Tab Navigation -->
                    <ul class="nav nav-tabs mb-4" id="productTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold fs-19 active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description-tab-pane" type="button" role="tab"
                                aria-controls="description-tab-pane" aria-selected="true">Synopsis</button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="productTabContent">
                        <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel"
                            aria-labelledby="description-tab" tabindex="0">
                            <p class="text-muted fs-19">{{$exhibition->synopsis ?? ''}}</p>
                        </div>
                    </div>

                    @if($exhibition->video)
                    <div class="mt-4">
                        <h5 class="fs-19 fw-bold">Video</h5>
                        <video width="100%" controls class="rounded-4 shadow-sm">
                            <source src="{{ asset('storage/' . $exhibition->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')

@endpush