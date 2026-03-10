@extends('layouts.frontend')
@section('title','Products')
@section('content')
<style>
    .event-eight-thumb {
        width: 100%;
        /* responsive container */
        height: 200px;
        /* fixed height for all images (adjust as needed) */
        overflow: hidden;
        /* hide overflow */
        border-radius: 8px;
        /* optional rounded corners */
    }

    .event-eight-thumb .event-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* crop to fit */
        display: block;
    }
</style>

<!-- ==== banner section start ==== -->
<section class="common-banner">
    <div class="container">
        <div class="row">
            <div class="common-banner__content text-center">
                <span class="sub-title-main"><i class="icon-donation"></i>{{$setting->company_name??''}}</span>
                <h2 class="title-animation">Reimaging Sultana’s Dream</h2>
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
<!-- ==== / banner section end ==== -->
<!-- Completed Exhibitions Section Start -->
<section id="exhibitionSection" class="event-eight-area position-relative z-1 pt-120 pb-120">
    <div class="container-fluid">

        <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" class="mb-0 d-flex justify-content-between align-items-center mb-5">
            <div class="mb-0 w-30 section-eight-wrapper">
                <h6 class="sub-title-main"><i class="fa-solid fa-briefcase"></i> Our Portfolio</h6>
                <h2 class="mb-0 title-animation">Our Products</h2>
            </div>
        </div>

        <div class="row" id="exhibition-grid">
            @foreach ($exhibitions as $exhibition)
            <div class="col-md-6 exhibition-item">
                <div class="event-eight-wrapper flex-wrap row-gap-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="event-eight-wrap">
                        <div class="event-eight-thumb">
                            @if($exhibition->images->isNotEmpty() && $exhibition->images[0]->image)
                            <img src="/storage/{{ $exhibition->images[0]->image }}" alt="{{ $exhibition->exhibition_title }}">

                            @endif

                        </div>
                        <div class="event-eight-content">
                            <h4 class="events-six-content-top">
                                <a href="{{ route('exhibition.details.page', $exhibition->id) }}">
                                    {{ $exhibition->exhibition_title }}</a>
                            </h4>
                            <p>{{ $exhibition->director_name }}</p>
                            <p>{!! \Illuminate\Support\Str::limit($exhibition->synopsis, 120, '...') !!}</p>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Completed Exhibitions Section end -->


@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#exhibition-filters button').on('click', function() {
            var filterValue = $(this).attr('data-filter');

            // Remove active class from all buttons
            $('#exhibition-filters button').removeClass('active');
            // Add active class to the clicked button
            $(this).addClass('active');

            // Show/hide exhibitions
            if (filterValue === '*') {
                $('#exhibition-grid .exhibition-item').show();
            } else {
                $('#exhibition-grid .exhibition-item').hide();
                $(filterValue).show(); // filterValue is like ".cat-1"
            }
        });
    });
</script>
@endpush
