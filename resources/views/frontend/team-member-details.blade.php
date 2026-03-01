@extends('layouts.frontend')
@section('title','Team Member Details')
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

    .contact-social {
    display: flex;
    gap: 15px; /* Space between icons */
}

.contact-social a {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;
    border: 2px solid #333;
    border-radius: 50%;
    color: #333;
    font-size: 20px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.contact-social a:hover {
    color: #fff;
    background-color: #f6881d; /* Hover color */
    border-color: #f6881d;
}


</style>

<!-- Banner Section -->
<section class="common-banner">
    <div class="container">
        <div class="row">
            <div class="common-banner__content text-center">
                <span class="sub-title-main"><i class="icon-donation"></i> {{$setting->company_name}}</span>
                <h2 class="title-animation">Member Details</h2>
            </div>
        </div>
    </div>
    <div class="banner-bg">
        @php
        $coverPhoto = $allCoverImages->where('page_name', 'about')->first();
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
        <a href="javascript:history.back()" aria-label="Discover Our Expertise" title="Discover Our Expertise" class="apece-primary-button mt-4"><i class="fa-solid fa-arrow-left"></i>Back</a>
    </div>
</div>


        <div class="row g-4">
            <!-- Left Column: Image -->
            <div class="col-lg-4">
                @if ($member->image != null)
                <img src="{{ asset('storage/'.$member->image) }}" alt="A sample of the hardened floor surface"
                    class="img-fluid rounded-4 shadow-sm w-100" style="aspect-ratio: 1 / 1; object-fit: cover;">
                @else
                <img src="https://placehold.co/600x600/dee2e6/495057?text=Floor+Hardener"
                    alt="A sample of the hardened floor surface" class="img-fluid rounded-4 shadow-sm w-100"
                    style="aspect-ratio: 1 / 1; object-fit: cover;"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x600/dee2e6/495057?text=Image+Not+Available';">

                @endif
            </div>

            <!-- Right Column: Details -->
            <div class="col-lg-8">
                <div class="product-card p-4 rounded-4 shadow-sm h-100">
                    <h2 class="title-animation mb-2">{{$member->name ?? ''}}</h2>
                    <h5 class="text-muted mb-2">{{$member->designation ?? ''}}</h5>
                    <div class="contact-social mb-2">
                        @if ($member->phone)
                        <a href="tel:{{ $member->phone }}"> <!-- Phone -->
                            <i class="fas fa-phone"></i>
                        </a>
                        @endif
                        @if ($member->whatsapp)
                        <a href="https://wa.me/{{ $member->whatsapp }}" target="_blank"> <!-- WhatsApp -->
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        @endif
                        @if ($member->facebook)

                        <a href="{{$member->facebook}}" target="_blank"> <!-- Facebook -->
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        @endif
                        @if ($member->linkedin)
                        <a href="{{$member->linkedin}}" target="_blank"> <!-- LinkedIn -->
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        @endif
                        @if ($member->github)
                        <a href="{{$member->github}}" target="_blank"> <!-- GitHub -->
                            <i class="fab fa-github"></i>
                        </a>
                        @endif
                    </div>

                    <!-- Tab Navigation -->
                    <ul class="nav nav-tabs mb-4" id="productTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold fs-19 active" id="about-me-tab" data-bs-toggle="tab"
                                data-bs-target="#about-me-tab-pane" type="button" role="tab"
                                aria-controls="about-me-tab-pane" aria-selected="true">About Me</button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="productTabContent">
                        <div class="tab-pane fade show active" id="about-me-tab-pane" role="tabpanel"
                            aria-labelledby="about-me-tab" tabindex="0">
                            <p class="text-muted fs-19">{!!$member->about ?? ''!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')

@endpush
