@extends('layouts.frontend')
@section('title','About Us')
@section('content')

<section class="cta-section-two blog" id="newsSection">
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-12">
        <div class="section__header text-center mt-5 mb-5" data-aos="fade-up" data-aos-duration="1000">
          
          <span class="sub-title-main text-white">
            <i class="icon-donation me-1"></i> {{ $setting->company_name ?? '' }}
          </span>

          <h1 class="title-animation text-white fs-40">
            Latest News & <span>Blogs</span>
          </h1>
          
        </div>
      </div>
    </div>
    <div class="row blog-main cm-details">
            @foreach ($newses as $index => $news)
                @php
                    // Dynamic delay for animation based on index
                    $delay = ($index % 3) * 300; 
                @endphp
                
                <div class="col-12 col-lg-4">
                    <div class="blog__single-wrapper" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ $delay }}">
                        <div class="blog__single van-tilt">
                            
                            <div class="blog__single-thumb">
                                <a href="{{ route('news.details', $news->slug) }}">
                                    <img src="{{ $news->image }}" alt="{{ $news->title }}">
                                </a>
                            </div>

                            <div class="blog__single-inner">
                                
                                <div class="blog__single-meta">
                                    <p>
                                        <i class="far fa-calendar"></i>
                                        {{ \Carbon\Carbon::parse($news->date)->format('d F, Y') }}
                                    </p>
                                    </div>

                                <div class="blog__single-content">
                                    <h5>
                                        <a href="{{ route('news.details', $news->slug) }}">{{ $news->title }}</a>
                                    </h5>
                                </div>

                                <div class="blog__single-cta">
                                    <a href="{{ route('news.details', $news->slug) }}" aria-label="blog details" title="read more">
                                        Read More <i class="fa-solid fa-circle-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
  </div>

  <div class="cta-bg">
    @php
        // Fetching cover photo for 'news' page (Logic from Code A)
        $coverPhoto = $allCoverImages->where('page_name', 'news')->first();
    @endphp

    @if ($coverPhoto)
        <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="News Cover" class="parallax-image">
    @else
        <img src="{{ asset('assets/images/page-bg.jpg') }}" alt="Default Cover" class="parallax-image">
    @endif
  </div>
</section>



@endsection