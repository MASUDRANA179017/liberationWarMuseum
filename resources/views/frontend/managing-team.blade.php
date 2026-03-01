@extends('layouts.frontend')
@section('title','Our Team')

@section('content')
<!-- ==== banner section start ==== -->
<section class="common-banner">
   <div class="container">
      <div class="row">
         <div class="common-banner__content text-center">
            <span class="sub-title-main"><i class="fa-solid fa-users"></i>Our Team</span>
            <h2 class="title-animation">Our <span>Experienced</span> Team</h2>
         </div>
      </div>
   </div>
   <div class="banner-bg">
      @php
        $coverPhoto = $allCoverImages->where('page_name', 'team')->first();
    @endphp

    @if ($coverPhoto)
        <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="Image">
    @else
        <img src="assets/images/page-bg.jpg" alt="Image">
    @endif
   </div>
</section>
<!-- ==== / banner section end ==== -->

      <!-- Team area Start -->
      <section class="team-eight-area position-relative z-1">
         <div class="container">
            <div class="section__header text-center" data-aos="fade-up" data-aos-duration="1000">
               <span class="sub-title-main"><i class="fa-solid fa-user-graduate"></i>Meet Our Experienced Team</span>
               <h2 class="title-animation mt-0"><span>Managing</span> Body</h2>
            </div>
            <div class="row">
               <div class="col-xl-12">
                  <div class="team-eight-slide overflow-hidden position-relative" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                     <div class="team-eight-active swiper-container">
                        <div class="swiper-wrapper team-eight-titming">

                           @foreach ($managements as $management)
                           <div class="team-eight-wrapper swiper-slide">
                              <div class="team-eight-thumb position-relative z-1">
                                 <a href="{{route('member.details.page',$management->id)}}"><img src="{{ asset('storage/'.$management->image)}}" alt="thumb"></a>
                                 <div class="team-eight-social">
                                    <span><i class="fas fa-share-alt"></i></span>
                                    <div class="team-eight-social-icon">
                                       <ul>
                                          @if($management->facebook)
                                             <li><a href="{{ $management->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                          @endif
                                          @if($management->whatsapp)
                                             <li><a href="{{ $management->whatsapp }}"><i class="fab fa-whatsapp"></i></a></li>
                                          @endif
                                          @if($management->linkdin)
                                             <li><a href="{{ $management->linkdin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                          @endif
                                          @if($management->github)
                                             <li><a href="{{ $management->github }}"><i class="fab fa-github"></i></a></li>
                                          @endif
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="team-eight-content text-center">
                                 <h4 class="team-eight-title"><a href="{{route('member.details.page',$management->id)}}" >{{ $management->name }}</a></h4>
                                 <!-- <h4 class="team-eight-title">
                                    <a  href="javascript:void(0)"
                                       class="openClientModal"
                                       data-name="{{ $management->name }}"
                                       data-memberid="{{ $management->member_code ?? '' }}"
                                       data-phone="{{ $management->phone ?? '' }}"
                                       data-email="{{ $management->email ?? '' }}"
                                       data-whatsapp="{{ $management->whatsapp ?? '' }}"
                                       data-about="{{ $management->about ?? '' }}"
                                       data-image="/storage/{{ $management->image }}"
                                       data-bs-toggle="modal"
                                       data-bs-target="#clientDetailsModal">
                                       {{ $management->name }}
                                    </a>
                                 </h4> -->


                                 <span class="team-eight-paragraph">{{ $management->designation }}</span>

                                 <div>
                                    <span >ID: {{ $management->member_code??'' }}</span>
                                 </div>
                                             
                                          
                              </div>
                           </div>
                           @endforeach




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
         <div class="team-eight-bg-shape">
            <img class="team-eight-bg-shape-1" src="assets/images/team/team-eight-shape1.png" alt="shape">
            <img class="team-eight-bg-shape-2" src="assets/images/team/team-eight-shape2.png" alt="shape">
         </div>
         
         @if ($siteEngineers->count())
        <div class="container">
            <div class="section__header text-center" data-aos="fade-up" data-aos-duration="1000">
                     <h2 class="title-animation mt-0"><span>IEET Officials</span> Team</h2>
                  </div>
            <div class="row">
               <!-- Team Member 1 -->
               @foreach ($siteEngineers as $siteEngineer)
               <div class="col-xl-3 col-lg-6 col-md-6">
                  <div class="team-six-wrapper" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                     <div class="team-six-thumb">
                        <a href="{{route('member.details.page',$siteEngineer->id)}}"><img src="{{ asset('storage/'.$siteEngineer->image)}}" alt="thumb"></a>
                     </div>
                     <div class="team-six-content">
                        
                        <h4 class="team-six-title"><a href="{{route('member.details.page',$siteEngineer->id)}}"  title="View">{{$siteEngineer->name}}</a></h4>
                        <h6 class="team-six-subtitle">{{$siteEngineer->designation}}</h6>
                        <div>
                           <span >ID: {{ $siteEngineer->member_code??'' }}</span>
                        </div>
                        
                                       <!-- <h4 class="team-eight-title">
                                          <a  href="javascript:void(0)"
                                             class="openClientModal"
                                             data-name="{{ $siteEngineer->name }}"
                                             data-memberid="{{ $siteEngineer->member_code ?? '' }}"
                                             data-phone="{{ $siteEngineer->phone ?? '' }}"
                                             data-email="{{ $siteEngineer->email ?? '' }}"
                                             data-whatsapp="{{ $siteEngineer->whatsapp ?? '' }}"
                                             data-about="{{ $siteEngineer->about ?? '' }}"
                                             data-image="/storage/{{ $siteEngineer->image }}"
                                             data-bs-toggle="modal"
                                             data-bs-target="#clientDetailsModal">
                                             {{ $siteEngineer->name }}
                                          </a>
                                       </h4> -->

                        <div class="team-six-socail">
                           <ul class="d-flex justify-content-center">
                              @if($siteEngineer->facebook)
                                 <li><a href="{{ $siteEngineer->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                              @endif
                              @if($siteEngineer->whatsapp)
                                 <li><a href="{{ $siteEngineer->whatsapp }}"><i class="fab fa-whatsapp"></i></a></li>
                              @endif
                              @if($siteEngineer->linkdin)
                                 <li><a href="{{ $siteEngineer->linkdin }}"><i class="fab fa-linkedin-in"></i></a></li>
                              @endif
                              @if($siteEngineer->github)
                                 <li><a href="{{ $siteEngineer->github }}"><i class="fab fa-github"></i></a></li>
                              @endif
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>

               @endforeach




            </div>

         </div>
         @endif
         
         
            @if ($marketingEngineers->count())
            <div class="container">
               <div class="section__header text-center" data-aos="fade-up" data-aos-duration="1000">
                  <h2 class="title-animation mt-0"> <span>IEET</span> Engineers</h2>
                  </h2>
               </div>
               <div class="row">
                  @foreach ($marketingEngineers as $marketingEngineer)
                  <div class="col-12 col-sm-6 col-xl-3">
                     <div class="team-six-wrapper ribbon-box right" data-aos="fade-up" data-aos-duration="1000">
                        <div class="team__single van-tilt">
                           <div class="team__single-thumb">
                              <a href="{{route('member.details.page',$marketingEngineer->id)}}">
                              <img src="{{ asset('storage/'.$marketingEngineer->image)}}" alt="Image">
                              </a>
                           </div>
                           <div class="team__single-content">
                              <a href="{{route('member.details.page',$marketingEngineer->id)}}" class="member-title-lg"  title="View">{{$marketingEngineer->name}}</a>
                                             <!-- <a  href="javascript:void(0)"
                                                class="openClientModal member-title-lg"
                                                data-name="{{ $marketingEngineer->name }}"
                                                data-memberid="{{ $marketingEngineer->member_code ?? '' }}"
                                                data-phone="{{ $marketingEngineer->phone ?? '' }}"
                                                data-email="{{ $marketingEngineer->email ?? '' }}"
                                                data-whatsapp="{{ $marketingEngineer->whatsapp ?? '' }}"
                                                data-about="{{ $marketingEngineer->about ?? '' }}"
                                                data-image="/storage/{{ $marketingEngineer->image }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#clientDetailsModal">
                                                {{ $marketingEngineer->name }}
                                             </a> -->
                              <span class="link-lg p-0 m-0">{{$marketingEngineer->designation}}</span>
                              <div>
                                 <span >ID: {{ $marketingEngineer->member_code??'' }}</span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach

               </div>

            </div>
            @endif
      </section>
      <!-- Team area end -->


{{--
<div class="modal fade" id="clientDetailsModal" tabindex="-1" aria-labelledby="clientDetailsModalLabel" style="display: none;" aria-modal="true" role="dialog">
   <div class="modal-dialog modal modal-md modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header p-3">
            <h5 class="title-lg fs-20 fw-600" id="clientDetailsModalLabel">
               Client Details: </span>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body p-0">
            <div class="m-0 ">
               <div class="card-body p-3 ">
                  <div class="row">
                     <div class="col-md-4">
                        <img id="modalClientImage" src="assets/images/team/four.png" class="rounded border team__single-thumb me-2" alt="img">
                     </div>
                     <div class="col-md-8 ps-1">
                        <p class="member-title-lg pb-1 lh-1" id="modalClientName">Md. Riyazul Islam</p>
                        <div class="d-flex align-items-center justify-content-between pt-3 client-details-inner">
                           <span class="link-sm d-inline-flex align-items-center">
                              <i class="bx bx-calendar-check me-1"></i>
                              Member ID
                           </span>
                           <p class="w-60 link-xs text-dark" id="modalClientMemberId">QCL-0025</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-2">
                           <span class="link-sm d-inline-flex align-items-center">
                              <i class="bx bx-calendar-check me-1"></i>
                              Phone Number
                           </span>
                           <a href="#" class="w-60 link-xs text-dark" id="modalClientPhone">+8801844674502</a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-2">
                           <span class="link-sm d-inline-flex align-items-center">
                              <i class="bx bx-calendar-check me-1"></i>
                              WhatsApp
                           </span>
                           <a href="#" class="w-60 link-xs text-dark" id="modalClientWhatsapp">+8801844674502</a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-2">
                           <span class="link-sm d-inline-flex align-items-center">
                              <i class="bx bx-calendar-check me-1"></i>
                              Email
                           </span>
                           <a href="#" class="w-60 link-sm text-dark" id="modalClientEmail">needhelp@company.com</a>
                        </div>
                     </div>
                  </div>
                  <div class="cm-group pt-4">
                     <h2 class="pb-1 fs-16 lh-1 sidebar-title text-start border-bottom events-six-content-top">About Me</h2>
                     <p class="sub-title-lg fs-13  pt-2 pb-3" id="modalClientAbout">
                        Charity and Donation is a categorys that involves giving financial category that involves
                        giving financial or material support various causes organizations. It allows individuals
                        towards the a addressing social category that involves giving financial or material support
                        various causes of organizations. It allows individuals towards addressing social
                     </p>
                     <div class="about-six-list-wrap" id="modalClientPoints">

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
--}}





@endsection

@push('script')

<script>
$(document).ready(function () {
    $('.openClientModal').on('click', function () {
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



@endpush


@push('style')
<style>
   .team__single-content {
    
    text-align: center;
    
}
</style>
@endpush
