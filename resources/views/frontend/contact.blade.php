@extends('layouts.frontend')
@section('title','Contact Us')
@section('content')

<!--banner section start -->
<section class="common-banner">
   <div class="container">
      <div class="row">
         <div class="common-banner__content text-center">
            <span class="sub-title-main"><i class="icon-donation"></i>{{ $setting->company_name }}</span>
            <h2 class="title-animation">Contuct US</h2>
         </div>
      </div>
   </div>
   <div class="banner-bg">
        @php
        $coverPhoto = $allCoverImages->where('page_name', 'contact')->first();
    @endphp

    @if ($coverPhoto)
        <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="Image">
    @else
        <img src="assets/images/page-bg.jpg" alt="Image">
    @endif
   </div>
</section>
<!-- banner section end -->

<section class="contact-section-modern">
   <div class="container">
      <div class="contact-info-bar">

         <div class="info-block">
            <div class="info-icon"><i class='bx bxs-phone-call'></i></div>
            <div class="info-text">
               <span>Call Us Anytime</span>
               <a href="tel:{{ $setting->contact_number }}">{{ $setting->contact_number }}</a>
            </div>
         </div>

         <div class="info-block">
            <div class="info-icon"><i class='bx bxl-whatsapp'></i></div>
            <div class="info-text">
               <span>Chat on WhatsApp</span>
               <a href="https://wa.me/{{ ltrim($setting->whatsapp_number, '+') }}" target="_blank">
                  {{ $setting->whatsapp_number }}
               </a>
            </div>
         </div>
         <div class="info-block">
            <div class="info-icon"><i class='bx bxs-envelope'></i></div>
            <div class="info-text">
               <span>Send an Email</span>
               <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
            </div>
         </div>
         <div class="info-block">
            <div class="info-icon"><i class='bx bxs-map-pin'></i></div>
            <div class="info-text">
               <span>Our Location</span>
               <p> {{ $setting->address }}</p>
            </div>
         </div>
      </div>
      <div class="contact-main-content">
         <div class="row align-items-center">
            <div class="col-lg-6">
               <div class="contact-illustration">
                  <img src="assets/image/contact-us2.jpg" alt="A person contacting support team">
               </div>
            </div>
            <div class="col-lg-6">
               <div class="contact-form-wrapper-modern">
                  <div class="sec-title-four text-left">
                     <h6 class="sec-title-three__tagline"><span class="sec-title-three__tagline__left-border"></span>Send Us a Message</h6>
                     <h3 class="sec-title-two__title fs-30"><span>Let's Talk!</span></h3>
                  </div>
                  <form id="contactForm" method="POST" class="contact-form-modern">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <textarea name="message" id="message" class="form-control" rows="5" placeholder="How can we help you with your project?" required></textarea>
                           </div>
                        </div>
                        <div class="col-12">
                           <button type="submit" class="btn btn-submit-modern w-100 mt-4">Send Message</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="google-map">


   <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.11657193746!2d90.42071320000001!3d23.7432221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b998ed9235f1%3A0xedb5992f595ad41f!2sQbit%20Tech!5e0!3m2!1sen!2sbd!4v1749412262500!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
</div>










@endsection

@push('style')

<link rel="stylesheet" href="{{asset('/')}}assets/css/custom_for_contact.css">

@endpush

@push('script')
<script>
$(document).ready(function () {
    $('#contactForm').on('submit', function (e) {
        e.preventDefault();

        // Collect form data
        let formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            subject: $('#subject').val(),
            message: $('#message').val(),
        };

        $.ajax({
            url: '/contact-messege/send',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
            },
            success: function (response) {
                Swal.fire({
                  icon: 'success',
                  title: 'Message Sent!',
                  text: response.message,
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK'
               });

                $('#contactForm')[0].reset(); // Reset the form
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    for (let field in errors) {
                        errorMessages += errors[field].join('\n') + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: '<pre style="text-align:left;white-space:pre-wrap;">' + errorMessages + '</pre>',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'An error occurred. Please try again.',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK'
                    });

                }
            }
        });
    });
});
</script>


@endpush
