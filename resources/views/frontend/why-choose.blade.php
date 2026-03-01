@extends('layouts.frontend')
@section('title','Why Choose')
@section('content')


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
   color: var(--white);;
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
   
   .ff-service {
   background-color: #285c86ff; 
}


.ff-service__single {
   height: 100%;
}
</style>
<!-- ==== banner section start ==== -->
<section class="common-banner">
   <div class="container">
      <div class="row">
         <div class="common-banner__content text-center">
            <span class="sub-title-main"><i class="icon-donation"></i>{{$setting->company_name}}</span>
            <h2 class="title-animation">Why Choose ?</h2>
         </div>
      </div>
   </div>
   <div class="banner-bg">
    @php
        $coverPhoto = $allCoverImages->where('page_name', 'why_choose')->first();
    @endphp

    @if ($coverPhoto)
        <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="Image">
    @else
        <img src="assets/images/page-bg.jpg" alt="Image">
    @endif

   </div>
</section>
<!-- ==== / banner section end ==== -->

<!--Why Choose-->
<section class="ff-service pb-5">
   <div class="container">
      <div class="section__header text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
         <span class="sub-title-main text-success-2 mt-5">The {{ $setting->company_name??'' }} Advantage</span>
         <h2 class="text-white title-animation">What Makes {{$setting->company_name??''}} the Right Choice?</h2>
      </div>
      <div class="row gutter-30 pb-10">
        @foreach ($whychooses as $whychoose)
        <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">
           <div class="ff-service__single">
              <div class="thumb">
                 <i class="{{$whychoose->icon??''}} fa-2x" style="color: #198754;"></i>
              </div>
              <div class="content mt-15">
                 <p class="txt-lg fw-7">{{$whychoose->title??''}}</p>
                 <p class="mt-20">{{$whychoose->details??''}}</p>
              </div>
           </div>
        </div>
        @endforeach
      </div>
   </div>
</section>
<!--Why Choose-->


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
