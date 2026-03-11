@extends('layouts.frontend')
@section('title', 'Home')
@section('content')
    <section class="banner-two">
        <div class="banner-two__slider swiper">
            <div class="swiper-wrapper">

                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="banner-two__slider-single">

                            <div class="banner-two__slider-bg" data-background="/storage/{{ $slider->image }}"></div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-8">
                                        <div class="banner-two__slider-content">

                                            <h1 class="mb-0 text-white title-animation">{{ $slider->title }}</h1>

                                            <p class="mt-0 mb-5 text-white fs-13 text-white-50">{{ $slider->sub_title }}</p>

                                            <div class="gap-2 mt-4 d-flex">
                                                <a href="{{ $slider->button_url }}" class="p-2 px-5 btn--primary">
                                                    {{ $slider->button_text }} <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div
            class="banner-six-slide-dot swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
            <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span>
            <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span>
            <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span>
            <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span>
            <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"></span>
            <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button"
                aria-label="Go to slide 3" aria-current="true"></span>
        </div>
    </section>


    <section class="cta-section-two cta-section-three cert-section">
        <div class="container">
            @if (isset($counters) && $counters->count() > 0)
                <div class="mt-5 row">
                    @foreach ($counters as $counter)
                        <div class="mb-4 col-lg col-md-4 col-6">
                            <div class="counter-item">

                                <div class="icon-wrapper">
                                    <img src="/storage/{{ $counter->counter_icon }}" alt="{{ $counter->counter_title }}"
                                        style="width: 50px; height: 50px; object-fit: contain;">
                                </div>

                                <h3 class="mb-0 title-animation fs-30 fw-800 lh-1">
                                    <span>{{ $counter->data_count }}{{ $counter->counter_symbol ?? '' }}</span>
                                </h3>

                                <p class="pt-1 text-center text-white fs-16 fw-600 lh-1">
                                    {{ $counter->counter_title }}
                                </p>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="cta-bg">
            <img src="{{ asset('assets/image/slider-1.jpg') }}" alt="Background" class="parallax-image">
        </div>
    </section>


    <section class="difference-two">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 col-xxl-5 d-none d-lg-block">
                    <div class="difference-two__thumb-wrapper">
                        <div class="difference-two__thumb">
                            <div class="mb-0 thumb-lg" data-aos="fade-right" data-aos-duration="1000">
                                <img src="{{ isset($about) && $about->image ? asset('storage/' . $about->image) : asset('assets/images/page-bg.jpg') }}"
                                    alt="{{ $setting->company_name ?? 'About Us' }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-7 col-xxl-7">
                    <div class="difference-two__content">



                        <h2 class="title-animation fs-35">
                            {{ isset($about) && $about->title ? $about->title : 'A Leading Real Estate Developer' }}
                        </h2>

                        @php
                            $allowedTags = '<p><br><ul><ol><li><b><strong><i><em>';
                            $cleanDescription = strip_tags(
                                isset($about) ? $about->description ?? '' : '',
                                $allowedTags,
                            );
                        @endphp

                        <div class="mb-4 about-description">
                            {!! \Illuminate\Support\Str::limit($cleanDescription, 700, '...') !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="cta-section-two" id="serviceSection">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="text-center section__header" data-aos="fade-up" data-aos-duration="1000">

                        <h1 class="text-white title-animation fs-40">
                            <span>Services</span>
                        </h1>
                        <p class="mt-3 text-center text-white fs-16">
                            Style, Perspectives & Aspiration of Sultana’s Dream
                        </p>
                    </div>
                </div>
            </div>

            <div class="award">
                <div class="row" id="serviceContainer">
                    @if (isset($films) && $films->count() > 0)
                        @foreach ($films as $index => $film)
                            @php
                                // Image Logic
                                $firstImage = isset($film->images) ? $film->images->first() : null;
                                $imagePath = $firstImage
                                    ? asset('storage/' . $firstImage->image)
                                    : asset('assets/images/no-image.jpg');

                                // Route Logic
                                $detailsRoute = route('film.details', $film->slug);
                            @endphp

                            <div class="col-12 col-md-6 mb-4 col-lg-4 service-item {{ $index >= 6 ? 'd-none' : '' }}">
                                <div class="award__single" data-aos="fade-up" data-aos-duration="1000">

                                    <div class="thumb h-[250px]">
                                        <a href="{{ $detailsRoute }}">
                                            <img src="{{ $imagePath }}" alt="{{ $film->film_name }}"
                                                style="width: 100%; height: autto; object-fit: cover; border-radius: 10px;">
                                        </a>
                                    </div>

                                    <div class="content">
                                        <div class="award__content">
                                            <h5 class="mb-3 text-center text-white title-animation fs-22 fw-700 lh-1">

                                                <a href="{{ $detailsRoute }}"
                                                    class="text-white">{{ Str::limit($film->film_name, 20, '...') }}</a>
                                            </h5>

                                            @if ($film->director_name)
                                                <h3 class="mb-3 text-center text-white title-sm"
                                                    style="font-size: 14px; font-weight: 400;">
                                                    {{ $film->director_name }}
                                                </h3>
                                            @endif

                                            <a href="{{ $detailsRoute }}" class="pt-3 pb-3 badge-2 fs-13">
                                                <i class="bx bx-cloud-download me-1"></i> View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                @if (isset($films) && $films->count() > 6)
                    <div class="row">
                        <div class="col-12">
                            <div class="mt-4 text-center section__cta cta">
                                <a href="{{ route('film.page') }}" class="btn--primary">
                                    View All Services <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="cta-bg">
            <img src="{{ asset('assets/image/slider-1.jpg') }}" alt="Background" class="parallax-image">
        </div>
    </section>

    <style>
        /* Keeping Code A's styling fix for images */
        .award__single .thumb img {
            object-fit: cover;
        }
    </style>
    <!--  product section end -->




    <section class="team ff-team">
        <div class="container">
            <div class="text-center section-eight-wrapper" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="200">
                <h6 class="sub-title-main"><i class="fa-solid fa-briefcase"></i> Art Products</h6>
                <h2 class="title-animation">Reimaging <span>Sultana’s Dream</span></h2>
            </div>

            <div class="row">
                @if (isset($exhibitions) && $exhibitions->count() > 0)
                    @foreach ($exhibitions as $exhibition)
                        @php
                            // Image Logic: Try to get from relation, else fallback
                            $firstImage = $exhibition->images->first();
                            $imagePath = $firstImage
                                ? asset('storage/' . $firstImage->image)
                                : asset('assets/images/no-image.png');

                            // Route Handling
                            $detailsRoute = route('exhibition.details.page', $exhibition->id);

                            // Subtitle Logic
                            $subtitle = \Illuminate\Support\Str::limit(strip_tags($exhibition->synopsis), 50, '...');
                        @endphp

                        <div class="col-lg-4 col-md-6">
                            <div class="p-0 property-single-boxarea" data-aos="fade-up" data-aos-duration="1000">

                                <div class="property-list-img-area position-relative">
                                    <a href="{{ $detailsRoute }}">

                                        <div class="thumb h-[250px] image-anime">
                                            <img src="{{ $imagePath }}" alt="{{ $exhibition->exhibition_title }}"
                                                style="width: 100%; height: autto; object-fit: cover; border-radius: 10px;">
                                        </div>
                                    </a>

                                    <div class="top-0 p-2 position-absolute start-0">
                                        <span class="badge bg-primary me-1">Product</span>
                                    </div>
                                </div>


                                <div class="property-single-content">
                                    <h4 class="title-animation">
                                        <a
                                            href="{{ $detailsRoute }}">{{ Str::limit($exhibition->exhibition_title, 30, '...') }}</a>
                                    </h4>
                                </div>

                                <div class="property-details">
                                    <p class="m-0 fs-14">
                                        <i class="fa-solid fa-user-tie me-1 text-primary"></i>
                                        {{ $exhibition->director_name }}
                                    </p>
                                </div>

                                <div class="text-center btn-area1 d-flex align-items-center justify-content-center">
                                    <a href="{{ $detailsRoute }}" class="p-3 w-auto action-btn-success h-30px">
                                        <i class='bx bx-show fs-15 me-1'></i>View Details
                                    </a>
                                    <a href="#" class="p-3 w-auto action-btn-info ms-2 h-30px" title="WhatsApp">
                                        <i class='bx bxl-whatsapp fs-15 me-1'></i> Message
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="py-5 text-center col-12">
                        <p class="text-muted">No products found.</p>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mt-5 text-center">
                        <a href="{{ route('exhibition.page') }}" aria-label="all products" title="all products"
                            class="p-2 px-5 btn--primary">
                            View All Products <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ====== How We Work Section Start ====== -->
    <section class="py-5 how-we-work bg-light">
        <div class="container">
            <div class="mb-5 row justify-content-center">
                <div class="text-center col-lg-8">
                    <h2 class="mb-3 title-animation fs-40 fw-700">How We Work</h2>
                    <p class="text-center fs-16 text-muted">A simple, transparent process from concept to completion.</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Step 1 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="p-4 text-center border-0 shadow-sm card h-100">
                        <div class="mb-3">
                            <div class="mx-auto icon-box rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                 style="width: 80px; height: 80px;">
                                <i class="text-white fa-solid fa-comments fs-2"></i>
                            </div>
                        </div>
                        <h5 class="mb-2 fw-600">1. Consultation</h5>
                        <p class="fs-14 text-muted">We listen to your ideas, goals and budget to understand your vision.</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="p-4 text-center border-0 shadow-sm card h-100">
                        <div class="mb-3">
                            <div class="mx-auto icon-box rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                 style="width: 80px; height: 80px;">
                                <i class="text-white fa-solid fa-pencil-ruler fs-2"></i>
                            </div>
                        </div>
                        <h5 class="mb-2 fw-600">2. Planning & Design</h5>
                        <p class="fs-14 text-muted">Our team crafts detailed plans, 3D renders and material boards for your approval.</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="p-4 text-center border-0 shadow-sm card h-100">
                        <div class="mb-3">
                            <div class="mx-auto icon-box rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                 style="width: 80px; height: 80px;">
                                <i class="text-white fa-solid fa-hammer fs-2"></i>
                            </div>
                        </div>
                        <h5 class="mb-2 fw-600">3. Execution</h5>
                        <p class="fs-14 text-muted">Skilled craftsmen bring the design to life with quality materials and on-site supervision.</p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="p-4 text-center border-0 shadow-sm card h-100">
                        <div class="mb-3">
                            <div class="mx-auto icon-box rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                 style="width: 80px; height: 80px;">
                                <i class="text-white fa-solid fa-key fs-2"></i>
                            </div>
                        </div>
                        <h5 class="mb-2 fw-600">4. Handover</h5>
                        <p class="fs-14 text-muted">Final walk-through, snag-list clearance and timely delivery of your dream space.</p>
                    </div>
                </div>
            </div>

            <div class="mt-5 text-center">
                <a href="#" class="px-5 py-2 btn--primary">Start Your Project</a>
            </div>
        </div>
    </section>
    <!-- ====== How We Work Section End ====== -->



    <!-- ==== / Testimonial section start ==== -->
    <section class="testimonial-six-area pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center testimonial-six-frist-row">
                <div class="col-xl-6 col-lg-6">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="overflow-hidden testimonial-six-slide position-relative" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="200">
                                <div class="testimonial-six-active swiper-container">
                                    <div class="swiper-wrapper">
                                        <!-- slide 1 -->
                                        @foreach ($testimonials as $testimonial)
                                            <div class="testimonial-six-wrapper swiper-slide">
                                                <div class="mb-3 testimonial-six-top">
                                                    <p class="testimonial-six-paragraph">{!! $testimonial->review !!}</p>
                                                </div>
                                                <div class="testimonial-six-bottom">
                                                    <div class="testimonial-six-author">
                                                        <div class="testimonial-six-author-img">
                                                            <img src="/storage/{{ $testimonial->image }}"
                                                                alt="Anwar Ahmed"
                                                                style="height: 60px; width: 60px; object-fit: cover;">
                                                        </div>
                                                        <div class="testimonial-six-author-content">
                                                            <h6>{{ $testimonial->client_name }}</h6>
                                                            <p class="mb-0">{{ $testimonial->designation }},
                                                                {{ $testimonial->organization }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="testimonial-six-author-quate">
                                                        <span><img
                                                                src="assets/images/testimonial/testimonial-six-quate.png"
                                                                alt="quate"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="testimonial-six-dot"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="testimonial-six-right" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <div class="mb-4 section-six-wrapper">
                            <h2 class="section-six-title">{{ $maintestimonial->title ?? '' }}</h2>
                            <p class="section-six-paragraph">{!! $maintestimonial->description ?? '' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ====== Dynamic FAQ Section Start ====== -->
    <section class="py-5 bg-white faq-section">
        <div class="container">
            <div class="mb-5 row justify-content-center">
                <div class="text-center col-lg-8">
                    <h2 class="mb-3 title-animation fs-40 fw-700">Frequently Asked Questions</h2>
                    <p class="text-center fs-16 text-muted">Quick answers to common questions about our services.</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="faqAccordion">
                        @forelse (($questions ?? collect()) as $index => $faq)
                            <div class="mb-3 border-0 shadow-sm accordion-item">
                                <h2 class="accordion-header" id="faqHeading{{ $index }}">
                                    <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $index }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="faqCollapse{{ $index }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="faqCollapse{{ $index }}"
                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                    aria-labelledby="faqHeading{{ $index }}" data-bs-parent="#faqAccordion">
                                    <p class="accordion-body line-height-5">
                                        {!! $faq->answer !!}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center col-12">
                                <p class="text-muted">No FAQs available at the moment.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="mt-5 text-center">
                <p class="mb-2 text-center fs-14 text-muted">Still have questions?</p>
                <a href="{{ route('contact-us.page') }}" class="px-5 py-2 btn--primary">Contact Us</a>
            </div>
        </div>
    </section>
    <!-- ====== Dynamic FAQ Section End ====== -->



    <section class="pt-80 pb-60 blog-main blog cm-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="text-center section-six-wrapper" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="200">
                        <h2 class="mb-5 title-animation"><span>Latest News</span></h2>
                    </div>
                </div>
            </div>

            <div class="row gutter-30">
                @foreach ($newses as $index => $news)
                    @php
                        // Dynamic delay logic for animation
                        $delay = ($index % 3) * 300;
                    @endphp

                    <div class="col-12 col-lg-4">
                        <div class="blog__single-wrapper" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-delay="{{ $delay }}">
                            <div class="blog__single van-tilt">

                                <div class="blog__single-thumb">
                                    <a href="{{ route('news.details', $news->slug) }}">
                                        <img src="{{ $news->image }}" alt="{{ $news->title }}">
                                    </a>

                                    <div class="tag">
                                        <a href="javascript:void(0);">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            {{ \Carbon\Carbon::parse($news->date)->format('d M') }}
                                        </a>
                                    </div>
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
                                        <a href="{{ route('news.details', $news->slug) }}" aria-label="blog details"
                                            title="read more">
                                            Read More <i class="fa-solid fa-circle-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>

                                <img src="{{ asset('assets/images/blog/spade.png') }}" alt="Shape" class="spade-two">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <script>
        function productChanged(productId) {

            const $colorSelect = $('#colorSelect');
            $colorSelect.html(`<option value="">Loading colors...</option>`);

            if (!productId) {
                $colorSelect.html(`<option value="" disabled selected>---Select Product First---</option>`);
                alert('invalid product:', productId);
                return;
            }

            const url = COLOR_URL_TEMPLATE.replace('__ID__', productId);

            $.get(url)
                .done(res => {

                    const colors = res.colors || [];
                    $colorSelect.empty();
                    if (colors.length) {

                        $colorSelect.append(`<option value="">Select color</option>`);
                        colors.forEach(c => {
                            $colorSelect.append(`<option value="${c}">${c}</option>`)
                        });
                    } else {
                        $colorSelect.append(`<option value="">No colors available</option>`);
                    }
                })
                .fail(() => $colorSelect.html(`<option value="" disabled selected>Error loading colors</option>`));
        }
    </script>


@endsection




@push('script')
    <script>
        const SERVICE_TYPE_URL_TEMPLATE = "{{ url('/services/__ID__/types') }}"; // AJAX URL
        const LOOKUP_URL = "{{ route('estimations.lookup.public') }}";

        // Format BDT
        const fmtBDT = n => (n == null || isNaN(n)) ? '' : '৳ ' + Number(n).toLocaleString('en-BD', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        // Set calculation result
        function setResult({
            total = null,
            error = null
        }) {
            $('#totalText').text(fmtBDT(total));
            $('#estError').toggle(!!error).text(error || '');
        }

        // Load service types when a service is selected
        function loadServiceTypes(serviceId, selectedType = null) {
            const $sel = $('#serviceTypeSelect');
            if (!serviceId) {
                $sel.html(`<option value="" disabled selected>---Select Service First---</option>`);
                return;
            }
            $sel.html(`<option value="">Loading...</option>`);

            const url = SERVICE_TYPE_URL_TEMPLATE.replace('__ID__', serviceId);

            $.get(url)
                .done(res => {
                    const types = res.types || [];
                    $sel.empty().append(`<option value="">Select service type</option>`);
                    if (types.length) {
                        types.forEach(t => $sel.append(`<option value="${t}">${t}</option>`));
                        if (selectedType) $sel.val(selectedType);
                    } else {
                        $sel.append(`<option value="">No types available</option>`);
                    }
                })
                .fail(() => $sel.html(`<option value="" disabled selected>Error loading types</option>`));
        }

        // Calculate total
        function calc() {
            const service_id = $('#estService').val();
            const service_type_value = $('#serviceTypeSelect').val();
            const sft = parseFloat($('#estSft').val());

            if (!service_id) {
                setResult({
                    error: 'Select a service.'
                });
                return;
            }
            if (!(sft > 0)) {
                setResult({
                    error: 'Enter a valid area in sft.'
                });
                return;
            }

            setResult({}); // clear error

            $.get(LOOKUP_URL, {
                    service_id,
                    service_type_value
                })
                .done(res => {
                    const rate = parseFloat(res?.price_per_sft);
                    if (isNaN(rate)) {
                        setResult({
                            error: 'No rate configured for this combination.'
                        });
                        return;
                    }
                    setResult({
                        total: rate * sft
                    });
                })
                .fail(xhr => setResult({
                    error: (xhr.responseJSON?.message) || 'Lookup failed.'
                }));
        }

        // jQuery ready
        $(function() {
            // Load service types on service change
            $('#estService').on('change', function() {
                loadServiceTypes($(this).val());
                if ($('#estSft').val()) calc(); // recalc if area entered
            });

            $('#serviceTypeSelect, #estSft').on('change input', function() {
                if ($('#estSft').val() && $('#estService').val()) calc();
            });

            $('#btnCalc').on('click', calc);

            $('#btnResetEst').on('click', () => {
                $('#priceEstimatorForm')[0].reset();
                $('#serviceTypeSelect').html(
                    `<option value="" disabled selected>---Select Service First---</option>`);
                setResult({
                    total: 0
                });
            });
        });
    </script>







    <script>
        // (function(){
        //   const LOOKUP_URL = "{{ route('estimations.lookup.public') }}";

        //   const fmtBDT = n => (n==null||isNaN(n)) ? ''
        //     : '৳ ' + Number(n).toLocaleString('en-BD',{minimumFractionDigits:2,maximumFractionDigits:2});

        //   function setResult({total=null,error=null}){
        //     $('#totalText').text(fmtBDT(total));
        //     $('#estError').toggle(!!error).text(error||'');
        //   }

        //   function calc(){
        //     const product_id = $('#estProduct').val();
        //     const service_id = $('#estService').val();
        //     const sft = parseFloat($('#estSft').val());

        //     if(!product_id || !service_id){ setResult({error:'Select both product and service.'}); return; }
        //     if(!(sft>0)){ setResult({error:'Enter a valid area in sft.'}); return; }

        //     setResult({}); // clear

        //     $.get(LOOKUP_URL, {product_id, service_id})
        //       .done(res => {
        //         const rate = parseFloat(res?.price_per_sft);
        //         if(isNaN(rate)){ setResult({error:'No rate configured for this combination.'}); return; }
        //         setResult({ total: rate * sft });
        //       })
        //       .fail(xhr => setResult({error: (xhr.responseJSON && xhr.responseJSON.message) || 'Lookup failed.'}));
        //   }

        //   $(function(){
        //     $('#btnCalc').on('click', calc);
        //     $('#estProduct,#estService').on('change', ()=> { if($('#estSft').val()) calc(); });
        //     $('#estSft').on('input', ()=>{
        //       clearTimeout(window.__estDeb);
        //       window.__estDeb = setTimeout(()=>{ if($('#estProduct').val() && $('#estService').val()) calc(); }, 250);
        //     });
        //    $('#btnResetEst').on('click', ()=>{
        //   $('#priceEstimatorForm')[0].reset();
        //   $('#estProduct').val("");
        //   $('#estService').val("");
        //   $('#estSft').val('');
        //   setResult({ total: 0 }); // shows "৳ 0.00"
        // });
        //   });
        // })();
    </script>


    <script>
        $(document).ready(function() {
            $(document).on('click', '.apply-btn', function() {
                const careerId = $(this).data('id');
                const jobTitle = $(this).data('title');
                $('#applyCareerId').val(careerId);
                $('#jobTitle').text(jobTitle);
                $('#jobApplyModal').modal('show');
            });

            $(document).on('click', '.view-job-btn', function() {
                const $this = $(this);

                $("#jobCompany").text($this.data("company"));
                $("#jobEmail").text("Email: " + $this.data("email")).attr("href", "mailto:" + $this.data(
                    "email"));
                $("#jobPhone").text("Phone: " + $this.data("phone")).attr("href", "tel:" + $this.data(
                    "phone"));
                $("#jobAddress").text("Location: " + $this.data("location"));
                $("#jobDescription").text($this.data("description"));
                $("#jobLogo").attr("src", $this.data("logo"));

                const $applyBtn2 = $("#job-view-modal .apply-btn2");
                $applyBtn2.removeData('id').removeData('title');
                $applyBtn2
                    .data('id', $this.data('id'))
                    .data('title', $this.data('title'))
                    .attr('data-id', $this.data('id'))
                    .attr('data-title', $this.data('title'));

                // Responsibilities
                const responsibilities = $this.data("responsibilities") || [];
                $("#jobResponsibilities").empty();
                $.each(responsibilities, function(_, item) {
                    $("#jobResponsibilities").append(
                        `<li><i class="bx bx-log-in-circle bx-tada"></i> ${item}</li>`
                    );
                });

                // Requirements
                const requirements = $this.data("requirements") || [];
                $("#jobRequirements").empty();
                $.each(requirements, function(_, item) {
                    $("#jobRequirements").append(
                        `<li><i class="bx bx-log-in-circle bx-tada"></i> ${item}</li>`
                    );
                });
            });

            $(document).on('click', '.apply-btn2', function() {
                const careerId = $(this).data('id');
                const jobTitle = $(this).data('title');
                $('#applyCareerId').val(careerId);
                $('#jobTitle').text(jobTitle);
                $('#job-view-modal').modal('hide');
                $('#jobApplyModal').modal('show');
            });

            // Submit Application (unchanged)
            $('#jobApplyForm').on('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                $.ajax({
                    url: "{{ route('job.apply') }}",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#jobApplyForm')[0].reset();
                        $('#jobApplyModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.success
                        });
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        });
                    }
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#project-filters button').on('click', function() {
                var filterValue = $(this).attr('data-filter');

                // Remove active class from all buttons
                $('#project-filters button').removeClass('active');
                // Add active class to the clicked button
                $(this).addClass('active');

                // Show/hide projects
                if (filterValue === '*') {
                    $('#project-grid .project-item').show();
                } else {
                    $('#project-grid .project-item').hide();
                    $(filterValue).show(); // filterValue is like ".cat-1"
                }
            });
        });
    </script>

    <!-- Isotope JS for filtering -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Init Isotope
            var iso = new Isotope('.project-container', {
                itemSelector: '.project-item',
                layoutMode: 'vertical'
            });

            // Filter items on button click
            var filterContainer = document.getElementById('project-filters');
            if (filterContainer) {
                filterContainer.addEventListener('click', function(event) {
                    if (!event.target.matches('.filter-btn')) {
                        return;
                    }

                    var filterValue = event.target.getAttribute('data-filter');
                    iso.arrange({
                        filter: filterValue
                    });

                    // Update active button
                    var filterBtns = filterContainer.querySelectorAll('.filter-btn');
                    filterBtns.forEach(function(btn) {
                        btn.classList.remove('active');
                    });
                    event.target.classList.add('active');
                });
            }
        });
    </script>
@endpush


@push('style')
    <style>
        .feature-six-wrapper {
            width: 100%;
            /* height: 100%;     */
            /* min-height: 100%;  */
            /* display: block;   */
        }
    </style>

    <style>
        .difference-two__tab-btn {
            padding: 10px 30px;
            border-radius: 50px 25px 50px 25px;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            font-weight: 700;
            color: var(--apece-title);
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            background: rgba(242, 146, 32, 0.15);
        }

        .difference-two__tab-btn.active {
            background-color: rgba(242, 146, 32, 0.75);
            color: var(--white);
            ;
        }

        /*.project-container {
                  position: relative;
                  }*/
        .project-item {
            transition: transform 0.4s, opacity 0.4s;
        }

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

        .about-nine__content__text {
            display: none;
        }

        .feature-six-area .col-xl-4,
        .feature-six-area .col-lg-4,
        .feature-six-area .col-md-6 {
            display: flex;
        }
    </style>
    <style>
        .filter-btn {
            margin: 5px;
            border-radius: 25px;
            padding: 8px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn.active {
            background-color: #0056b3;
            color: white;
        }

        .project-item {
            transition: opacity 0.4s ease-in-out;
        }

        .isotope-hidden.project-item {
            opacity: 0;
            z-index: -1;
        }
    </style>
@endpush
