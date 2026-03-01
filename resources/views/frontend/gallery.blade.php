@extends('layouts.frontend')
@section('title','About Us')
@section('content')


<section class="cta-section-two" id="gallerySection">
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-12">
        <div class="section__header text-center mt-5 mb-5" data-aos="fade-up" data-aos-duration="1000">

          <span class="sub-title-main text-white">
            <i class="icon-donation me-1"></i> Archives
          </span>

          <h1 class="title-animation text-white fs-40">
            <span>Past Events</span>
          </h1>

        </div>
      </div>
    </div>

    <div class="award row gutter-24" id="albumContainer">
      @if(isset($albums) && $albums->count() > 0)
      @foreach($albums as $index => $album)
      @php
      // Layout Logic: First 3 items smaller (col-lg-4), next 2 items larger (col-lg-6)
      $colClass = $index < 3 ? 'col-12 col-lg-4' : 'col-12 col-lg-6' ;

        // Animation Delay
        $delay=($index % 3) * 100;

        // Route Logic
        $detailsRoute=route('gallery.all', ['number'=> $album->id]);

        // Counts
        $imgCount = $album->albumImageVideos->where('type', 'image')->count();
        $vidCount = $album->albumImageVideos->where('type', 'video')->count();

        // Visibility Class - Initially hidden for animation
        $visibilityClass = 'aos-init';
        @endphp

        <div class="{{ $colClass }} {{ $visibilityClass }}">
          <div class="award__single" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ $delay }}">

            <div class="thumb">
              <a href="{{ $detailsRoute }}" title="{{ $album->name }}">
                <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->name }}">
              </a>
            </div>

            <div class="content">
              <div class="award__content">
                <h5 @if($index < 4) class="fs-18 fw-700 p-0 m-0 text-center" @endif>
                  <a href="{{ $detailsRoute }}" title="{{ $album->name }}">{{ $album->name }}</a>
                </h5>
                <p class="mb-0">
                  {{ $imgCount }} Images • {{ $vidCount }} Videos
                </p>
                <a href="{{ $detailsRoute }}" class="badge-2 fs-13 pt-3 pb-3 text-center">
                  <i class="fa-solid fa-arrow-right"></i> {{ $album->date }}
                </a>
              </div>

            </div>

          </div>
        </div>
        @endforeach
        @else
        <div class="col-12 text-center py-5">
          <p class="text-muted">No albums available at the moment.</p>
        </div>
        @endif
    </div>

    @if(isset($albums) && $albums->count() > 7)
    <div class="row">
      <div class="col-12">
        <div class="text-center mt-5">
          <a href="javascript:void(0);" id="viewAllBtn" aria-label="all albums" title="all albums" class="btn--primary p-2 px-5">
            View All Albums <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
    @endif
  </div>

  <div class="cta-bg">
    @php
    // Fetching cover photo for 'gallery' as per Code A
    $coverPhoto = $allCoverImages->where('page_name', 'gallery')->first();
    @endphp

    @if ($coverPhoto)
    <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="Gallery Cover" class="parallax-image">
    @else
    <img src="{{ asset('assets/images/page-bg.jpg') }}" alt="Default Cover" class="parallax-image">
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
@endpush