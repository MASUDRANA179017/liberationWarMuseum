@extends('layouts.frontend')
@section('title','Product Details')
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
                <h2 class="title-animation">Product Details</h2>
            </div>
        </div>
    </div>
    <div class="banner-bg">
        @php
        $coverPhoto = $allCoverImages->where('page_name', 'product')->first();
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
        <a href="{{route('product.page')}}" aria-label="Discover Our Expertise" title="Discover Our Expertise" class="apece-primary-button mt-4"><i class="fa-solid fa-arrow-left"></i>View All Products</a>
    </div>
</div>


        <div class="row g-4">
            <!-- Left Column: Image -->
            <div class="col-lg-5">
                @if ($product->image != null)
                <img src="{{ asset('storage/'.$product->image) }}" alt="A sample of the hardened floor surface"
                    class="img-fluid rounded-4 shadow-sm w-100" style="aspect-ratio: 1 / 1; object-fit: cover;">
                @else
                <img src="https://placehold.co/600x600/dee2e6/495057?text=Floor+Hardener"
                    alt="A sample of the hardened floor surface" class="img-fluid rounded-4 shadow-sm w-100"
                    style="aspect-ratio: 1 / 1; object-fit: cover;"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x600/dee2e6/495057?text=Image+Not+Available';">

                @endif
            </div>

            <!-- Right Column: Details -->
            <div class="col-lg-7">
                <div class="product-card p-4 rounded-4 shadow-sm h-100">
                    <h2 class="title-animation mb-2">{{$product->name ?? ''}}</h2>
                    <p class="text-muted fs-20 mb-4">
                        {{$product->subtitle ?? ''}}
                    </p>
                    <p>{{$product->text_before_price ?? ''}} <span class="sub-title-main fw-800">{{$product->price ?? ''}}</span> {{$product->text_after_price ?? ''}} </p>

                    <!-- Tab Navigation -->
                    <ul class="nav nav-tabs mb-4" id="productTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold fs-19 active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description-tab-pane" type="button" role="tab"
                                aria-controls="description-tab-pane" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold fs-19" id="benefits-tab" data-bs-toggle="tab"
                                data-bs-target="#benefits-tab-pane" type="button" role="tab"
                                aria-controls="benefits-tab-pane" aria-selected="false">Key Benefits</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold fs-19" id="applications-tab" data-bs-toggle="tab"
                                data-bs-target="#applications-tab-pane" type="button" role="tab"
                                aria-controls="applications-tab-pane" aria-selected="false">Applications</button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="productTabContent">
                        <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel"
                            aria-labelledby="description-tab" tabindex="0">
                            <p class="text-muted fs-19">{{$product->description ?? ''}}</p>
                        </div>
                        <div class="tab-pane fade" id="benefits-tab-pane" role="tabpanel" aria-labelledby="benefits-tab"
                            tabindex="0">
                            <ul class="list-unstyled text-muted">
                                @php
                                    $benefits = json_decode($product->benefits, true); // decode JSON to array
                                @endphp

                                @if(is_array($benefits))
                                    @foreach ($benefits as $benefit)
                                        <li class="mb-2 fs-19">
                                            <i class="bx bx-check text-success me-2"></i>
                                            {{ $benefit }}
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="applications-tab-pane" role="tabpanel"
                            aria-labelledby="applications-tab" tabindex="0">
                            <p class="text-muted fs-19">{{$product->applications ?? ''}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $features = json_decode($product->features, true); // decode JSON to array
        @endphp
        @if ($features)
        <!-- Key Features Section -->
        <div class="mt-5">
            <div class="text-center mb-4">
                <h3 class="h4 fw-bold text-dark">Core Features at a Glance</h3>
            </div>
            <div class="product-card p-4 rounded-4 shadow-sm">
                <div class="row g-4">
                    <!-- Feature 1 -->
                    @if(is_array($features))
                        @foreach ($features as $feature)
                            <div class="col-md-6 d-flex align-items-start">
                                <div class="feature-icon bg-primary-subtle text-primary rounded-circle d-flex justify-content-center align-items-center me-3">
                                    <i class="{{ $feature['icon'] ?? ''}} fs-1 features-icon-color"></i>
                                </div>
                                <div>
                                    <h4 class="h6 fw-bold fs-19 mb-1">{{ $feature['title'] ?? '' }}</h4>
                                    <p class="text-muted small mb-0">{{ $feature['description'] ?? '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection

@push('scripts')

@endpush
