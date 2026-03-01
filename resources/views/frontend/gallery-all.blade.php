@extends('layouts.frontend')
@section('title','Gallery')
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
<style>
    .award .award__single .content {
        background: none !important;
        backdrop-filter: blur(0) !important;
    }
</style>
@endpush
@section('content')
<!--banner section start -->
<section class="common-banner">
    <div class="container">
        <div class="row">
            <div class="common-banner__content text-center">
                <h2 class="title-animation  fs-35">{{$album->name}}</h2>
            </div>
        </div>
    </div>
    <div class="banner-bg">
        @php
        $coverPhoto = $allCoverImages->where('page_name', 'gallery')->first();
        @endphp

        @if ($coverPhoto)
        <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="Image">
        @else
        <img src="assets/images/page-bg.jpg" alt="Image">
        @endif
    </div>
</section>
<!-- banner section end -->
<!-- ==== award section start ==== -->
<section class="award" id="eventSection">
    <div class="container-fluid">
        <div class="row mt-5 mb-5" id="albumContainer">
            @foreach ($mediaItems as $index => $mediaItem)
            <div class="col-12 col-lg-4 album-item {{ $index >= 6 ? 'd-none' : '' }}">
                <div class="award__single mb-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="thumb">
                        @if ($mediaItem->type === 'image')
                        <a href="{{ asset('storage/' . $mediaItem->file_path) }}" class="glightbox" data-gallery="gallery">
                            <img src="{{ asset('storage/' . $mediaItem->file_path) }}" alt="Image" class="img-fluid">
                        </a>
                        @elseif ($mediaItem->type === 'video')
                        <a href="{{ asset('storage/' . $mediaItem->file_path) }}" class="glightbox" data-gallery="gallery" data-type="video">
                            <video class="w-100">
                                <source src="{{ asset('storage/' . $mediaItem->file_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        @if ($mediaItems->count() > 6)
        <div class="row">
            <div class="col-12">
                <div class="section__cta cta text-center">
                    <a href="#" id="viewAll" class="btn--primary">
                        View All <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @endif


    </div>
</section>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#viewAll').on('click', function(e) {
            e.preventDefault();
            $('.album-item').removeClass('d-none');
            $(this).parent().hide(); // Hide the "View All" button after showing all
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
    const lightbox = GLightbox({
        selector: '.glightbox'
    });
</script>
@endpush