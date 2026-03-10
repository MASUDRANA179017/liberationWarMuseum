@extends('layouts.frontend')
@section('title','Product Estimator')
@section('content')
<!-- Banner Section -->
<section class="common-banner">
   <div class="container">
      <div class="row">
         <div class="common-banner__content text-center">
            <span class="sub-title-main"><i class="icon-donation"></i> {{$setting->company_name}}</span>
            <h2 class="title-animation">Our Products</h2>
         </div>
      </div>
   </div>
   <div class="banner-bg">
      @php
        $coverPhoto = $allCoverImages->where('page_name', 'product')->first();
    @endphp

    @if ($coverPhoto)
        <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="Image">
    @else
        <img src="assets/images/page-bg.jpg" alt="Image">
    @endif
   </div>
</section>

<!-- Exhibition Estimator Section -->
<div class="container container-custom">
    <div class="row g-0 align-items-stretch">
        <div class="col-md-5 d-flex">
            <div class="image-card-container flex-grow-1">
                <div class="image-frame h-100">
                    <img src="/assets/image/gallery-5.jpg" alt="Flooring work in progress" class="img-fluid">
                </div>
            </div>
        </div>
        
        <div class="col-md-7 d-flex">
            <div class="form-container flex-grow-1">
                <h2 class="project-title">PRODUCT ESTIMATOR</h2>
                
                <div class="button-group">
                    <a href="tel:+8801700000000" class="contact-btn call-btn">
                        <i class="fas fa-phone"></i> Call Us
                    </a>
                    <a href="https://wa.me/8801700000000" target="_blank" class="contact-btn whatsapp-btn">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                </div>
                
                <form>
                    <div class="form-group">
                        <label for="exhibition-size">Product Size</label>
                        <input type="text" class="form-control" id="exhibition-size" placeholder="ENTER YOUR PRODUCT SIZE (IN SQ. FT)">
                    </div>
                    
                    <div class="form-group">
                        <label for="film">Service</label>
                        <select class="form-select" id="film">
                            <option selected disabled>SELECT YOUR REQUIRED SERVICE</option>
                            @foreach($films as $film)
                                <option value="{{ $film->id }}">{{ $film->film_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="product">Product</label>
                        <select class="form-select" id="product">
                            <option selected>SELECT YOUR REQUIRED PRODUCT</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="cost-per-sq-ft">Product Cost Per Sq. Ft.</label>
                        <input type="text" class="form-control" id="cost-per-sq-ft" placeholder="SELECT SERVICE AND PRODUCT FIRST, COST WILL GENERATE AUTOMATICALLY" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label for="total-cost">Total Product Cost</label>
                        <input type="text" class="form-control" id="total-cost" placeholder="ENTER YOUR PRODUCT SIZE (IN SQ. FT)" disabled>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>

</script>
@endpush

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            
            justify-content: center;
            align-items: center;
            
        }
        .container-custom {
            /* max-width: 900px; */
            margin: auto;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 15px;
            margin-bottom: 100px;
            margin-top: 100px;
        }
        .image-card-container {
            padding: 10px;
        }
        .image-frame {
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            padding: 0px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            border: 0px solid #ddd;
            border-top-left-radius: 60px;
            border-bottom-right-radius: 60px;
        }
        .image-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: 5px;
        }
        .form-container {
            padding: 20px;
        }
        .form-control, .form-select {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px 15px;
            font-size: 16px;
            height: 50px;
        }
        .form-control::placeholder {
            color: #aaa;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            text-transform: uppercase;
        }
        h2.project-title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px; /* Reduced margin to bring buttons closer */
            text-transform: uppercase;
        }
        /* New styles for the buttons */
        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
        }
        .contact-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-weight: bold;
        }
        .call-btn {
            background-color: #007bff; /* Blue for call */
        }
        .whatsapp-btn {
            background-color: #25d366; /* Green for WhatsApp */
        }
        .contact-btn i {
            font-size: 20px;
        }
        @media (max-width: 767.98px) {
            .image-card-container {
                margin-bottom: 20px;
            }
        }
    </style>

    
@endpush
