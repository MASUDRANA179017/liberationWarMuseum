@extends('layouts.frontend')
@section('title','About Us')
@section('content')


<!--banner section start -->
<section class="common-banner">
   <div class="container">
      <div class="row">
         <div class="common-banner__content text-center">
            <span class="sub-title-main"><i class="icon-donation"></i> {{$setting->company_name??''}}</span>
            <h2 class="title-animation">Site Engineer Team</h2>
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
<!-- / Team section Start -->
<section id="teamSection" class="team ff-team">
   <div class="container">
      <div class="section__header text-center" data-aos="fade-up" data-aos-duration="1000">
               <span class="sub-title-main"><i class="fa-solid fa-user-graduate"></i>Meet Our Experienced Team</span>
               <h2 class="title-animation mt-0"><span>Site Engineer</span> Team</h2>
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
</section>
<!-- ==== / Team section end ==== -->
 {{--  
<div class="modal fade" id="clientDetailsModal" tabindex="-1" aria-labelledby="clientDetailsModalLabel" style="display: none;" aria-modal="true" role="dialog">
   <div class="modal-dialog modal modal-md modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header p-3">
            <h5 class="title-lg fs-20 fw-600" id="clientDetailsModalLabel">Client Details: <span id="modalClientNameDisplay"></span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body p-0">
            <div class="m-0 ">
               <div class="card-body p-3 ">
                  <div class="row">
                     <div class="col-md-4">
                        <img src="assets/images/team/four.png" id="modalClientImage" class="rounded border team__single-thumb me-2" alt="img">
                     </div>
                     <div class="col-md-8 ps-1">
                        <p class="member-title-lg pb-1 lh-1" id="modalClientName">Md. Riyazul Islam</p>
                        <div class="d-flex align-items-center justify-content-between pt-3 client-details-inner">
                           <span class="link-sm d-inline-flex align-items-center">
                           <i class="bx bx-calendar-check me-1"></i>
                           Membert ID
                           </span>
                           <p class="w-60 link-xs text-dark" id="modalClientMemberId">QCL-0025</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-2">
                           <span class="link-sm d-inline-flex align-items-center">
                           <i class="bx bx-calendar-check me-1"></i>
                           Phone Number
                           </span>
                           <a href="tel:9200368090" class="w-60 link-xs text-dark" id="modalClientPhone">+8801844674502</a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-2">
                           <span class="link-sm d-inline-flex align-items-center">
                           <i class="bx bx-calendar-check me-1"></i>
                           WhatsApp
                           </span>
                           <a href="tel:9200368090" class="w-60 link-xs text-dark" id="modalClientWhatsapp">+8801844674502</a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-2">
                           <span class="link-sm d-inline-flex align-items-center">
                           <i class="bx bx-calendar-check me-1"></i>
                           Email
                           </span>
                           <a href="needhelp@company.com" class="w-60 link-sm text-dark" id="modalClientEmail">www.akhalequefoundation.com</a>
                        </div>
                     </div>
                  </div>
                  <div class="cm-group pt-4">
                     <h2 class="pb-1 fs-16 lh-1 sidebar-title text-start border-bottom events-six-content-top">About Me</h2>
                     <p class="sub-title-lg fs-13  pt-2 pb-3" id="modalClientAbout">Charity and Donation is a categorys that involves giving financial category that involves
                        giving financial or material support various causes organizations. It allows individuals
                        towards the a addressing social category that involves giving financial or material support
                        various causes of organizations. It allows individuals towards addressing social
                     </p>

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
