@extends('layouts.frontend')
@section('title','About Us')
@section('content')
@push('style')
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

   .project-item {
      transition: transform 0.4s, opacity 0.4s;
   }

   .testimonial-card {
      background-color: #f8f9fa;
      border-radius: 15px;
      padding: 30px;
      text-align: center;
      border: 1px solid #e9ecef;
   }

   .testimonial-card img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      margin-bottom: 15px;
   }
</style>
@endpush

<section class="cta-section-two" id="aboutSection">
   <div class="container">
      <div class="mt-5 row justify-content-center">
         <div class="col-12">
            <div class="mt-5 mb-5 text-center section__header" data-aos="fade-up" data-aos-duration="1000">



               <h1 class="text-white title-animation fs-40">
                  <span>Liberation War Museum</span>
               </h1>

               <p class="mt-3 text-center text-white fs-16">
                  Journey of Sultana's Dream in Bangladesh
               </p>

            </div>
         </div>
      </div>
   </div>

   <div class="cta-bg">
      @php
      // Fetching cover photo for 'about' page (Logic from Code A)
      $coverPhoto = $allCoverImages->where('page_name', 'about')->first();
      @endphp

      @if ($coverPhoto)
      <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="About Cover" class="parallax-image">
      @else
      <img src="{{ asset('assets/images/Rosa-Slider-1.jpg') }}" alt="Default Cover" class="parallax-image">
      @endif
   </div>
</section>

<section class="difference-two">
   <div class="container">
      <div class="row">
         <div class="col-12 col-lg-5 col-xxl-5 d-none d-lg-block">
            <div class="difference-two__thumb-wrapper">
               <div class="difference-two__thumb">
                  <div class="mb-0 thumb-lg" data-aos="fade-right" data-aos-duration="1000">
                     <img src="{{ asset('storage/'.$about->image) }}" alt="{{ $setting->company_name ?? 'About Us' }}">
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 col-lg-7 col-xxl-7">
            <div class="difference-two__content">
               <span class="sub-title-main">
                  <i class="fa-solid fa-city"></i> About {{ $setting->company_name ?? 'Us' }}
               </span>
               <h2 class="title-animation fs-35">
                  {{ $about->title ?? 'A Leading Real Estate Developer' }}
               </h2>

               @php
               $allowedTags = '<p><br>
               <ul>
                  <ol>
                     <li><b><strong><i><em>';
                                    $cleanDescription = strip_tags($about->description, $allowedTags);
                                    @endphp

                                    <div class="mb-4 about-description">
                                       {!! \Illuminate\Support\Str::limit($cleanDescription, 700, '...') !!}
                                    </div>
                                    @php
                                    $items = $about && isset($about->about_points) ? json_decode($about->about_points, true) : null;
                                    @endphp
            </div>
         </div>
      </div>
   </div>
</section>

<!-- Team area end -->
<div class="product-tab difference-two pb-120">
   <div class="container">
      <div class="row">
         <div class="m-auto col-10">
            <div class="mt-0 difference-two__inner cta">
               <div class="difference-two__inner-content">
                  <div class="difference-two__tab">
                     <div class="difference-two__tab-btns">
                        <button class="difference-two__tab-btn active" data-target="#mission"
                           aria-label="mission" title="mission"><i class='bx bx-fullscreen bx-tada fs-20' ></i>Our Mission</button>
                        <button class="difference-two__tab-btn" data-target="#vision" aria-label="vision"
                           title="vision"><i class='bx bxs-doughnut-chart bx-flashing fs-20' ></i>Our Vision</button>
                        <button class="difference-two__tab-btn" data-target="#excellence"
                           aria-label="excellence" title="excellence"><i class='bx bx-shape-square bx-tada fs-20' ></i>Excellence</button>
                     </div>
                     <div class="difference-two__tab-content">
                        <div class="fc-profit difference-two__content-single" id="mission">
                           <div class="fc-profit-group">
                              <div class="thumb thumb-sm">
                                 <img src="assets/images/event-3.jpg" alt="Image">
                              </div>
                              <p>To provide Bangladesh's industrial sector with the most durable, innovative, and environmentally sound flooring and waterproofing solutions, ensuring quality and reliability in every project we undertake.</p>
                           </div>
                        </div>
                        <div class="fc-profit difference-two__content-single" id="vision">
                           <div class="fc-profit-group">
                              <div class="thumb thumb-sm">
                                 <img src="assets/images/event-2.jpg" alt="Image">
                              </div>
                              <p>To be the undisputed industry leader in Bangladesh, setting new benchmarks for excellence, sustainability, and customer satisfaction in construction technology from Teknaf to Tetulia.</p>
                           </div>
                        </div>
                        <div class="difference-two__content-single" id="excellence">
                           <ul>
                              <li><i class='bx bx-check-square'></i>A fast, easy, and reliable process for all our clients.</li>
                              <li><i class='bx bx-check-square'></i>Complete control over policy and project execution.</li>
                              <li><i class='bx bx-check-square'></i>Save your time and money with our efficient solutions.</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--Why Choose-->
<section class="ff-service">
   <div class="container">
      <div class="text-center section__header aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
         <span class="sub-title-main text-success-2">The IEET Advantage</span>
         <h2 class="text-white title-animation">Why Choose IEET Ltd.?</h2>
      </div>
      <div class="row gutter-30">
         <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
            <div class="ff-service__single">
               <div class="thumb">
                  <i class="fa-solid fa-helmet-safety fa-3x" style="color: #198754;"></i>
               </div>
               <div class="content mt-15">
                  <p class="txt-lg fw-7">Expert Workmanship</p>
                  <p class="mt-20">Our seasoned professionals provide top-quality application and finishing for every project.</p>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
            <div class="ff-service__single">
               <div class="thumb">
                  <i class="fa-solid fa-cogs fa-3x" style="color: #198754;"></i>
               </div>
               <div class="content mt-15">
                  <p class="txt-lg fw-7">Innovative Technology</p>
                  <p class="mt-20">We use the latest technology and high-performance materials for long-lasting results.</p>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
            <div class="ff-service__single">
               <div class="thumb">
                  <i class="fa-solid fa-clipboard-check fa-3x" style="color: #ffc107;"></i>
               </div>
               <div class="content mt-15">
                  <p class="txt-lg fw-7">Reliable Process</p>
                  <p class="mt-20">We handle every step with precision, ensuring a smooth and stress-free experience for you.</p>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
            <div class="ff-service__single">
               <div class="thumb">
                  <i class="fa-solid fa-award fa-3x" style="color: #e74c3c;"></i>
               </div>
               <div class="content mt-15">
                  <p class="txt-lg fw-7">Proven Success</p>
                  <p class="mt-20">With 400+ completed projects, our track record speaks for our commitment to quality.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="th-t">
      <img src="assets/images/aviation-banner-2.jpg" alt="Image">
   </div>
</section>
<!--Why Choose-->
<!-- Client Testimonials Start -->
<section class="testimonial-section pt-120 pb-120">
    <div class="container">
        <div class="text-center section__header" data-aos="fade-up" data-aos-duration="1000">
            <span class="sub-title-main">Client Feedback</span>
            <h2 class="title-animation">What Our Clients Say</h2>
        </div>
        <div class="mt-5 swiper testimonial-slider">
            <div class="swiper-wrapper">
                <!-- Testimonial 1 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <img src="https://placehold.co/80x80/E89F71/FFFFFF?text=AA" alt="Client Avatar">
                        <p>"The durability of the floor hardener from IEET Ltd. is unmatched. Our factory floor has withstood heavy traffic without any issues. Highly recommended for any industrial setup."</p>
                        <h5 class="mt-3">Anwar Ahmed</h5>
                        <span>Production Manager, ACI Limited</span>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <img src="https://placehold.co/80x80/6E6E6E/FFFFFF?text=MH" alt="Client Avatar">
                        <p>"Professionalism and timely completion are what define IEET Ltd. Their team was efficient, knowledgeable, and delivered the project exactly as promised. A truly reliable partner."</p>
                        <h5 class="mt-3">Mahmud Hasan</h5>
                        <span>CEO, Pran-RFL Group</span>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <img src="https://placehold.co/80x80/2E8B57/FFFFFF?text=SR" alt="Client Avatar">
                        <p>"Their technical expertise in waterproofing is commendable. They solved a persistent leakage problem in our facility that others couldn't. We are extremely satisfied with their work."</p>
                        <h5 class="mt-3">Salma Rahman</h5>
                        <span>Chief Engineer, Beximco Pharma</span>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- Client Testimonials End -->

<!-- Current Committee -->
<section class="team ff-team pb-120" id="teamSection">
   <div class="container">
      <div class="text-center section__header" data-aos="fade-up" data-aos-duration="1000">
         <span class="sub-title-main"><i class="fa-solid fa-users"></i>Meet Our Experienced Team</span>
         <h2 class="mt-0 title-animation"><span>Managing </span>Body</h2>
      </div>
      <div class="row">
               <div class="col-xl-12">
                  <div class="overflow-hidden team-eight-slide position-relative" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                     <div class="team-eight-active swiper-container">
                        <div class="swiper-wrapper team-eight-titming">
                           @forelse ($managements as $management)
                              @php
                                 $imagePath = $management->image ? asset('storage/' . $management->image) : 'https://placehold.co/600x600/dee2e6/495057?text=No+Image';
                              @endphp
                              <div class="team-eight-wrapper swiper-slide">
                                 <div class="team-eight-thumb position-relative z-1">
                                    <a href="{{ route('member.details.page', $management->id) }}"><img src="{{ $imagePath }}" alt="{{ $management->name }}"></a>
                                    <div class="team-eight-social">
                                       <span><i class="fas fa-share-alt"></i></span>
                                       <div class="team-eight-social-icon">
                                          <ul>
                                             @if($management->facebook)
                                             <li><a href="{{ $management->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                             @endif
                                             @if($management->linkedin)
                                             <li><a href="{{ $management->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                             @endif
                                             @if($management->whatsapp)
                                             <li><a href="https://wa.me/{{ preg_replace('/\\D+/', '', $management->whatsapp) }}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                             @endif
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="text-center team-eight-content">
                                    <h4 class="team-eight-title">
                                       <a href="{{ route('member.details.page', $management->id) }}">{{ $management->name }}</a>
                                    </h4>
                                    <p class="team-eight-paragraph">{{ $management->designation }}</p>
                                 </div>
                              </div>
                           @empty
                              <div class="col-12 text-center">
                                 <p class="text-muted">No members found.</p>
                              </div>
                           @endforelse
                        </div>
                     </div>
                  </div>
               </div>

            </div>
            <div class="row justify-content-between align-items-center">
               <div class="col-xl-3 col-lg-3 col-md-4">
                  <div class="team-eight-dot"></div>
               </div>
               <div class="col-xl-6 col-lg-7 col-md-7">
                  <div class="team-eight-scrollbar position-relative z-1">
                     <div class="swiper-scrollbar one"></div>
                  </div>
               </div>
            </div>
   </div>
</section>
<!-- Current Committee -->


@endsection

@push('script')

<script>
   $(document).ready(function() {
      $('.openClientModal').on('click', function() {
         let name = $(this).data('name');
         let memberId = $(this).data('memberid');
         let phone = $(this).data('phone');
         let email = $(this).data('email');
         let whatsapp = $(this).data('whatsapp');
         let about = $(this).data('about');
         let image = $(this).data('image');


         $('#modalClientNameDisplay').text(name);
         $('#modalClientName').text(name);
         $('#modalClientMemberId').text(memberId);
         $('#modalClientPhone').attr('href', 'tel:' + phone).text(phone);
         $('#modalClientWhatsapp').attr('href', 'https://wa.me/' + whatsapp).text(whatsapp);
         $('#modalClientEmail').attr('href', 'mailto:' + email).text(email);
         $('#modalClientAbout').text(about);
         $('#modalClientImage').attr('src', image);
      });
   });





   $(document).on('click', '.btn-close', function() {
      $('#clientDetailsModal').modal('hide');
   });
</script>



<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
   var swiper = new Swiper(".testimonial-slider", {
      spaceBetween: 30,
      pagination: {
         el: ".swiper-pagination",
         clickable: true,
      },
      breakpoints: {
         640: {
            slidesPerView: 1,
         },
         768: {
            slidesPerView: 2,
         },
         1024: {
            slidesPerView: 3,
         },
      },
   });
</script>

@endpush
