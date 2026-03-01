
@extends('layouts.frontend')
@section('title','Terms & Conditions')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/text-editor.css">
 <style>
   .event-eight-wrapper .event-eight-content .text-truncate-short-2{
        line-height: 29px !important;
    }
 </style>
@endpush
@section('content')
<!--banner section start -->
<section class="common-banner">
    <div class="container">
        <div class="row">
            <div class="common-banner__content text-center">
                <span class="sub-title-main"><i class="icon-donation"></i>{{$setting->company_name??''}}</span>
                <h2 class="title-animation">Terms & Conditions</h2>
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
<!-- banner section end -->
<!-- Event area Start -->
<section id="eventSection" class="event-eight-area position-relative z-1">
    <div class="container">
        <div class="section-eight-wrapper text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
            <h6 class="sub-title-main"><i class="fa-solid fa-user-graduate"></i>{{$setting->company_name??''}}</h6>
            <h2 class="title-animation">Terms & Conditions </h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="terms-container">
                    {{--
                        The content from your database/text editor would be rendered here.
                        In a Laravel Blade file, you would use: {!! $terms->content !!}
                    --}}
                    <div class="editor-content">
                        {!! $policy->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Event area end -->
@endsection
@push('scripts')

@endpush
