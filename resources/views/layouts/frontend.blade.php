<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <!-- #title -->
   <title> Liberation War Museum </title>
   <!-- #description -->
   <meta name="author" content="qbit-tech.com">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- #favicon -->
   <link rel="shortcut icon" href="{{ asset('storage/'.$setting->logo_dark) }}" type="image/x-icon">
   <link rel="icon" href="{{ asset('storage/'.$setting->logo_dark) }}" type="image/x-icon">
   <!-- google fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com/">
   <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
   <link
      href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&amp;family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&amp;family=Nunito:ital,wght@0,200..1000;1,200..1000&amp;family=Outfit:wght@100..900&amp;display=swap"
      rel="stylesheet">
   <!--Icon CSS-->
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <!-- main css -->
   <link rel="stylesheet" href="{{asset('/')}}assets/css/main.css">
   <!-- responsive css -->
   <link rel="stylesheet" href="{{asset('/')}}assets/css/responsive.css">
   <!-- update responsive css -->
   <link rel="stylesheet" href="{{asset('/')}}assets/css/update-responsive.css">
   <!-- color themes -->
   <link rel="stylesheet" href="{{asset('/')}}assets/css/default-theme.css" id="switch-color">
   <!-- want sticky header -->
   <link rel="stylesheet" href="{{asset('/')}}assets/css/sticky-header.css">
   <!-- box layout css -->
   <link rel="stylesheet" href="{{asset('/')}}assets/css/box-layout.css">
   <!-- dark mode css -->
   <link rel="stylesheet" href="{{asset('/')}}assets/css/dark-mode.css">
   <!-- rtl css -->
   <link rel="stylesheet" href="{{asset('/')}}assets/css/rtl.css">
   <link rel="stylesheet" href="{{asset('/')}}assets/css/custom.css">
   <link rel="stylesheet" href="{{asset('/')}}assets/css/aos.css">
   <link rel="stylesheet" href="{{asset('/')}}assets/css/odometer.css">
   <link rel="stylesheet" href="{{asset('/')}}assets/css/nice-select.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />

   <link rel="stylesheet" href="{{asset('/')}}assets/css/responsive_ahasan.css">

   <style>
      :root {
         --apece-primary-rgb: 4, 150, 255;
         --qbit-success: 10, 185, 100;
         --qbit-warning: 249, 193, 35;
      }

      .tab-contents {
         display: none
      }

      .tab-contents.current-tab {
         display: block
      }

      .vertical-tabs h5 {
         font-size: calc(16px + 2 * (100vw - 300px) / 1620);
         color: rgba(var(--dark), .8);
         font-weight: 500
      }

      .vertical-tabs span {
         color: rgba(var(--dark), .8)
      }

      .vertical-tabs .tab .step {
         width: 55px;
         height: 55px;
         text-align: center;
         font-size: 24px;
         border-radius: 5px;
         background-color: rgba(var(--secondary), .1);
         border: 1px solid rgba(var(--secondary), .2);
         color: rgba(var(--secondary), 1);
         padding: 10px
      }

      .vertical-tabs .tab.current-tab .step {
         background-color: rgba(var(--primary), 1);
         color: rgba(var(--white), 1)
      }

      .vertical-tabs .tab.current-tab h5 {
         color: rgba(var(--primary), 1)
      }

      .completed-contents {
         line-height: 250px;
         text-align: center
      }

      .tabs-steps {
         padding: 8px 14px;
         text-align: center;
         font-size: 22px;
         border-radius: 5px;
         background-color: rgba(var(--dark), .1);
         border: 1px dashed rgba(var(--dark), .6) cursor: pointer;
      }

      .tabs-step {
         display: flex;
         align-items: center;
         background-color: rgba(var(--secondary), .05);
         padding: 15px 20px;
         border-radius: var(--bs-border-radius);
      }

      .tabs-contents {
         display: none;
         background-color: rgba(var(--light), .05);
         padding: .5rem
      }

      .tabs-step {
         padding: 15px 20px
      }

      .tabs-area .tab {
         width: 33%;
      }

      .tabs-step .tab .step {
         padding: 8px 14px;
         text-align: center;
         font-size: 22px;
         border-radius: 5px;
         background-color: rgba(var(--secondary), .1);
      }

      .tab-contents.current {
         display: block;
      }

      .tabs-step .tab.current .step {
         background-color: rgba(var(--primary), 1);
         color: #fff;
      }

      .tab-icon-box {
         height: 40px;
         width: 40px;
         text-align: center;
         font-size: 22px;
         border-radius: 5px;
         display: inline-flex;
         justify-content: center;
         align-items: center;
         background-color: rgba(var(--apece-primary-rgb));
         color: #fff;
      }

      .tab-area {
         display: flex;
         align-items: center;
         background-color: rgba(var(--qbit-success), .1);
         padding: 7px;
         border-radius: var(--bs-border-radius);
      }

      .tab-box {
         width: 33%;
      }

      .vertical-tabs {
         display: flex;
         flex-direction: column;
         height: 100%;
         background-color: rgba(var(--apece-primary-rgb), 0.05);
         padding: 0px;
         border-radius: var(--bs-border-radius);
         cursor: pointer
      }

      .vertical-tabs .tab {
         padding: 7px;
         border-radius: 7px;
      }

      .vertical-tabs .tab.current-tab h5 {
         background: rgba(var(--apece-primary-rgb), 0.1);
      }

      .tab-contents-list {
         /*background-color: rgba(var(--secondary),.05);*/
         padding: 0px;
         border-radius: var(--bs-border-radius);
         height: 100%
      }

      @keyframes fadeIn {
         from {
            opacity: 0;
         }

         to {
            opacity: 1;
         }
      }

      .qbit-btn {
         display: inline-block;
         font-weight: 400;
         line-height: 1;
         text-align: center;
         vertical-align: middle;
         cursor: pointer;
         user-select: none;
         border: 1px solid transparent;
         border-radius: 5px;
         transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
      }

      .btn-md {
         padding: 5px 22px;
         font-size: 12px;
         line-height: 14px;
      }

      .btn-lg {
         padding: 7px 25px;
         font-size: 13px;
         line-height: 15px;
      }

      .qbit-btn-light-danger {
         background-color: rgba(var(--qbit-danger), 0.5);
         color: #640D5F;
      }

      .qbit-btn-light-danger:hover {
         background-color: rgba(var(--qbit-danger), 0.8);
         border-color: rgba(var(--qbit-danger), 0.2);
         color: #fff;
      }

      .qbit-btn-light-success {
         background-color: rgba(var(--qbit-success), 0.5);
         color: #640D5F;
      }

      .qbit-btn-light-success:hover {
         background-color: rgba(var(--qbit-success), 0.8);
         border-color: rgba(var(--qbit-success), 0.2);
         color: #fff;
      }

      .qbit-btn-light-warning {
         background-color: rgba(var(--qbit-warning), 0.5);
         color: #640D5F;
      }

      .qbit-btn-light-warning:hover {
         background-color: rgba(var(--qbit-warning), 0.8);
         border-color: rgba(var(--qbit-warning), 0.2);
         color: #fff;
      }


      /* Main menu item active */
      .navbar__item.current>a {
         color: #dc3741;
         /* Change text color */
         font-weight: bold;
         /* Make it bold */
         border-radius: 5px;
         /* Rounded corners if needed */
      }

      /* Sub-menu active item */
      .navbar__sub-menu li.current>a {
         color: #dc3741;
         /* Highlight sub-menu text */
         font-weight: bold;
         /* Make it bold */
      }

      /* Optional: Hover effect */
      .navbar__item>a:hover,
      .navbar__sub-menu li>a:hover {
         color: #dc3741;
      }
   </style>

   @stack('style')
</head>

<body>
   <div class="page-wrapper">
      <!-- preloader start -->
      <!--<div class="preloader">-->
      <!--   <i class="icon-donation"></i>-->
      <!--   <p>CHARIFUND</p>-->
      <!--</div>-->
      <!-- preloader end -->
      <header class="header header-eight-area">
         <div class="row">
            <div class="col-12">
               <div class="main-header__menu-box">
                  <nav class="p-0 navbar">
                     <div class="navbar-logo">
                        <a href="/">
                           <img src="{{ asset('storage/'.$setting->logo_dark) }}" alt="IEET BD Logo" height="50">
                        </a>
                     </div>
                     <div class="navbar__options">
                        <div class="header-eight-navbar-space d-flex justify-content-end">
                           <div class="navbar__menu d-none d-xl-block">
                              <ul class="navbar__list">
                                 <li class="navbar__item nav-fade current">
                                    <a href="{{route('home.page')}}">Home</a>
                                 </li>
                                 <li class="navbar__item nav-fade">
                                    <a href="{{route('about-us.page')}}">About Us</a>
                                 </li>
                                 <li class="navbar__item nav-fade">
                                    <a href="{{route('film.page')}}">Services</a>
                                 </li>
                                 {{-- <li class="navbar__item nav-fade">
                                    <a href="{{route('product.page')}}">Performances</a>
                                 </li> --}}
                                 <li class="navbar__item nav-fade">
                                    <a href="{{route('exhibition.page')}}">Products</a>
                                 </li>
                                 {{-- <li class="navbar__item nav-fade">
                                    <a href="{{route('gallery.page')}}">Archives</a>
                                 </li> --}}
                                 <li class="navbar__item nav-fade">
                                    <a href="{{route('news.page')}}">News</a>
                                 </li>

                                 <li class="navbar__item nav-fade">
                                    <a href="{{route('contact-us.page')}}">Contact</a>
                                 </li>
                              </ul>

                           </div>
                        </div>

                        <button class="open-offcanvas-nav d-flex d-xl-none" aria-label="toggle mobile menu"
                           title="open offcanvas menu">
                           <span class="icon-bar top-bar"></span>
                           <span class="icon-bar middle-bar"></span>
                           <span class="icon-bar bottom-bar"></span>
                        </button>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </header>
      <!-- mobile menu start -->
      <div class="mobile-menu d-block d-xxl-none">
         <nav class="mobile-menu__wrapper">
            <div class="mobile-menu__header nav-fade">
               <div class="logo">
                  <a href="{{ route('home.page') }}" aria-label="home page" title="logo">
                     <img src="{{ asset('storage/'.$setting->logo_dark) }}" alt="Image">
                  </a>
               </div>
               <button aria-label="close mobile menu" class="close-mobile-menu">
                  <i class="fa-solid fa-xmark"></i>
               </button>
            </div>
            <div class="mobile-menu__list"></div>
            <div class="mobile-menu__cta nav-fade d-block d-md-none">
               <a href="donate-us.html" class="btn--primary">Donate Now <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="mobile-menu__social social nav-fade">
               <a href="https://www.facebook.com/" target="_blank" aria-label="share us on facebook" title="facebook">
                  <i class="fa-brands fa-facebook-f"></i>
               </a>
               <a href="https://vimeo.com/" target="_blank" aria-label="share us on vimeo" title="vimeo">
                  <i class="fa-brands fa-vimeo-v"></i>
               </a>
               <a href="https://x.com/" target="_blank" aria-label="share us on twitter" title="twitter">
                  <i class="fa-brands fa-twitter"></i>
               </a>
               <a href="https://www.linkedin.com/" target="_blank" aria-label="share us on linkedin" title="linkedin">
                  <i class="fa-brands fa-linkedin-in"></i>
               </a>
            </div>
         </nav>
      </div>
      <div class="mobile-menu__backdrop"></div>
      <!-- mobile menu end -->
      <!-- search popup start -->
      <div class="search-popup">
         <button class="close-search" aria-label="close search box" title="close search box">
            <i class="fa-solid fa-xmark"></i>
         </button>
         <form action="#" method="post">
            <div class="search-popup__group">
               <input type="text" name="search-field" id="searchField" placeholder="Search...." required>
               <button type="submit" aria-label="search products" title="search products">
                  <i class="fa-solid fa-magnifying-glass"></i>
               </button>
            </div>
         </form>
      </div>
      <!-- search popup end -->
      <!-- off canvas start -->
      <div class="off-canvas d-none d-xl-block">
         <div class="off-canvas__inner">
            <div class="off-canvas__head">
               <a href="index.php">
                  <img src="{{asset('/')}}assets/images/logo.png" alt="Logo">
               </a>
               <button aria-label="close off canvas" class="off-canvas-close">
                  <i class="fa-solid fa-xmark"></i>
               </button>
            </div>
            <div class="offcanvas__search">
               <form action="#">
                  <input type="text" placeholder="What are you searching for?" required>
                  <button type="submit">
                     <i class="icon-search"></i>
                  </button>
               </form>
            </div>
            <div class="off-canvas__contact">
               <h5>Contact Info</h5>
               <div class="single">
                  <span>
                     <i class="fa-solid fa-phone-volume"></i>
                  </span>
                  <a href="tel:253-556-7777">(+1) 253 556-7777</a>
               </div>
               <div class="single">
                  <span>
                     <i class="fa-solid fa-envelope"></i>
                  </span>
                  <a href="mailto:example@support.com">example@support.com</a>
               </div>
               <div class="single">
                  <span>
                     <i class="fa-solid fa-location-dot"></i>
                  </span>
                  <a target="_blank"
                     href="https://www.google.com/maps/place/Narbethong+QLD+4725,+Australia/@-23.8173641,145.3223283,11z/data=!3m1!4b1!4m15!1m8!3m7!1s0x2b2bfd076787c5df:0x538267a1955b1352!2sAustralia!3b1!8m2!3d-25.274398!4d133.775136!16zL20vMGNoZ2h5!3m5!1s0x6bcacfb51d7e5257:0x400eef17f209750!8m2!3d-23.8656897!4d145.5354411!16s%2Fg%2F1wd3w6zw">
                     Narbethong
                     Queensland 4725
                     Australia
                  </a>
               </div>
            </div>
            <div class="social">
               <a href="https://www.facebook.com/" target="_blank" aria-label="share us on facebook" title="facebook">
                  <i class="fa-brands fa-facebook-f"></i>
               </a>
               <a href="https://vimeo.com/" target="_blank" aria-label="share us on vimeo" title="vimeo">
                  <i class="fa-brands fa-vimeo-v"></i>
               </a>
               <a href="https://x.com/" target="_blank" aria-label="share us on twitter" title="twitter">
                  <i class="fa-brands fa-twitter"></i>
               </a>
               <a href="https://www.linkedin.com/" target="_blank" aria-label="share us on linkedin" title="linkedin">
                  <i class="fa-brands fa-linkedin-in"></i>
               </a>
            </div>
         </div>
      </div>
      <div class="off-canvas-backdrop"></div>
      <!-- off canvas end -->
      <!-- sidebar cart start -->
      <div class="sidebar-cart">
         <div class="der">
            <button class="close-cart">
               <span class="close-icon">X</span>
            </button>
            <h2>
               Shopping Bag
               <span class="count">2</span>
            </h2>
            <div class="cart-items">
               <div class="cart-item-single">
                  <div class="cart-item-thumb">
                     <a href="service-details.html">
                        <img src="{{asset('/')}}assets/images/cart.jpg" alt="Image">
                     </a>
                  </div>
                  <div class="cart-item-content">
                     <h6 class="h6 title-anim">
                        <a href="service-details.html">Product One</a>
                     </h6>
                     <p class="price">
                        $
                        <span class="item-price">34.99</span>
                     </p>
                     <div class="measure">
                        <button aria-label="decrease item" class="quantity-decrease">
                           <i class="fa-solid fa-minus"></i>
                        </button>
                        <span class="item-quantity">0</span>
                        <button aria-label="add item" class="quantity-increase">
                           <i class="fa-solid fa-plus"></i>
                        </button>
                     </div>
                  </div>
                  <button aria-label="delete item" class="delete-item">
                     <i class="fa-solid fa-trash"></i>
                  </button>
               </div>
               <div class="cart-item-single">
                  <div class="cart-item-thumb">
                     <a href="service-details.html">
                        <img src="{{asset('/')}}assets/images/cart.jpg" alt="Image">
                     </a>
                  </div>
                  <div class="cart-item-content">
                     <h6 class="h6 title-anim">
                        <a href="service-details.html">Product Two</a>
                     </h6>
                     <p class="price">
                        $
                        <span class="item-price">34.99</span>
                     </p>
                     <div class="measure">
                        <button aria-label="decrease item" class="quantity-decrease">
                           <i class="fa-solid fa-minus"></i>
                        </button>
                        <span class="item-quantity">0</span>
                        <button aria-label="add item" class="quantity-increase">
                           <i class="fa-solid fa-plus"></i>
                        </button>
                     </div>
                  </div>
                  <button aria-label="delete item" class="delete-item">
                     <i class="fa-solid fa-trash"></i>
                  </button>
               </div>
            </div>
            <div class="totals">
               <div class="subtotal">
                  <span class="label">Subtotal:</span>
                  <span class="amount">
                     $
                     <span class="total-price">0.00</span>
                  </span>
               </div>
            </div>
            <div class="action-buttons">
               <a class="view-cart-button" href="cart.html" aria-label="go to cart">Cart</a>
               <a class="checkout-button" href="checkout.html" aria-label="go to checkout">
                  Checkout
                  <i class="fa-solid fa-arrow-right-long"></i>
               </a>
            </div>
         </div>
      </div>
      <div class="cart-backdrop"></div>
      <!-- sidebar cart end -->
      <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="title-lg fs-22 fw-600" id="paymentModalLabel">Online Payment</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="p-0 card-body">
                     <div class="tab-area">
                        <!--Company Setting TAB-->
                        <div class="tab-box current d-flex" data-tab="tab-1">
                           <div class="tab-icon-box"><i class='bx bx-transfer-alt'></i></div>
                           <div class="px-2">
                              <h6 class="mb-1 title-lg fs-18 lh-1">Membership Fee</h6>
                              <span class="sub-title-lg">Pay your membership fee</span>
                           </div>
                        </div>
                        <!--Main TAB (Policy Management)-->
                        <div class="tab-box d-flex" data-tab="tab-2">
                           <div class="tab-icon-box"><i class='bx bx-transfer-alt'></i></div>
                           <div class="px-2">
                              <h6 class="mb-1 title-lg fs-18 lh-1">Pay Zakat</h6>
                              <span class="sub-title-lg">Contribute your Zakat</span>
                           </div>
                        </div>
                        <!-- Main TAB-->
                        <div class="tab-box d-flex" data-tab="tab-3">
                           <div class="tab-icon-box"><i class='bx bx-transfer-alt'></i></div>
                           <div class="px-2">
                              <h6 class="mb-1 title-lg fs-18 lh-1">Donation</h6>
                              <span class="sub-title-lg">Support our causes</span>
                           </div>
                        </div>
                     </div>
                     <div class="mt-4 tab-contents-list main-tab-list">
                        <div id="tab-1" class="tab-contents current">
                           <div class="card">
                              <div class="p-3 pt-0 pb-0 bg-white border-0 card-header">
                                 <h2 class="m-0 text-center title-animation fs-20 w-600 border-bottom">Membership Fee Form</h2>
                              </div>
                              <div class="pt-0 pb-2 card-body">
                                 <form class="app-form" action="payment.php" method="POST">
                                    <input type="hidden" name="payment_type" value="Membership Fee">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Membership Type*</label>
                                             <select class="form-select custom-input" name="membership_plan" required>
                                                <option value="">Select Type</option>
                                                <option value="General Member|1000">General Member (Tk 1,000)</option>
                                                <option value="Life Member|10000">Life Member (Tk 10,000)</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Full Name*</label>
                                             <input type="text" class="form-control custom-input" name="full_name" placeholder="Enter Your Full Name" required>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Session (Batch)*</label>
                                             <input type="text" class="form-control custom-input" name="session" placeholder="e.g., 2005-06 or 15" required>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Email Address*</label>
                                             <input type="email" class="form-control custom-input" name="email" placeholder="Enter Your Email" required>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                          </div>
                                          <label>Mobile No*</label>
                                          <input type="tel" class="form-control custom-input" name="phone" placeholder="Enter Your Mobile Number" required>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Amount (Tk)*</label>
                                             <input type="number" class="form-control custom-input" name="amount" placeholder="Amount" readonly required>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="mt-3 common-fields"></div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div id="tab-2" class="tab-contents">
                           <div class="card">
                              <div class="p-3 pt-0 pb-0 bg-white border-0 card-header">
                                 <h2 class="m-0 text-center title-animation fs-20 w-600 border-bottom">Zakat Payment Form</h2>
                              </div>
                              <div class="pt-0 pb-2 card-body">
                                 <form class="app-form" action="payment.php" method="POST">
                                    <input type="hidden" name="payment_type" value="Zakat">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Full Name*</label>
                                             <input type="text" class="form-control custom-input" name="full_name" placeholder="Enter Your Full Name" required>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Email Address</label>
                                             <input type="email" class="form-control custom-input" name="email" placeholder="Enter Your Email">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Mobile No</label>
                                             <input type="tel" class="form-control custom-input" name="phone" placeholder="Optional">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Amount (Tk)*</label>
                                             <input type="number" class="form-control custom-input" name="amount" placeholder="Enter Zakat Amount" required>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="mt-3 common-fields"></div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div id="tab-3" class="tab-contents">
                           <div class="card">
                              <div class="p-3 pt-0 pb-0 bg-white border-0 card-header">
                                 <h2 class="m-0 text-center title-animation fs-20 w-600 border-bottom">Donation Form</h2>
                              </div>
                              <div class="pt-0 pb-2 card-body">
                                 <form class="app-form" action="payment.php" method="POST">
                                    <input type="hidden" name="payment_type" value="Donation">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Full Name*</label>
                                             <input type="text" class="form-control custom-input" name="full_name" placeholder="Enter Your Full Name" required>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Email Address</label>
                                             <input type="email" class="form-control custom-input" name="email" placeholder="Enter Your Email">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Mobile No</label>
                                             <input type="tel" class="form-control custom-input" name="phone" placeholder="Optional">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Amount (Tk)*</label>
                                             <input type="number" class="form-control custom-input" name="amount" placeholder="Enter Donation Amount" required>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="mt-3 common-fields"></div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>


      @yield('content')

      <!-- ==== footer start ==== -->
      <footer class="pt-0 footer-two ff-footer">

         <div class="mt-0 footer-two__copyright">
            <div class="container">
               <div class="row align-items-center gutter-12">
                  <div class="col-12 col-lg-6">
                     <div class="text-center footer-two__copyright-inner text-lg-start">
                        <p class="m-0">Copyright © <span id="copyrightYear">{{ date('Y') }}</span>
                           <a href="/">{{ $setting->company_name ?? '' }}</a>.
                           All Rights Reserved. Developed By <a href="https://qbit-tech.com/" target="_blank">QBit Tech</a>
                        </p>
                     </div>
                  </div>
                  <div class="col-12 col-lg-6">
                     <div class="footer__bottom-left">
                        <ul class="footer__bottom-list justify-content-center justify-content-lg-end">
                           <li><a href="tel:{{ $setting->contact_number }}"><i class="fa-solid fa-phone"></i>{{ $setting->contact_number }}</a></li>
                           <li><a href="mailto:{{ $setting->email }}"><i class="fa-regular fa-envelope"></i>{{ $setting->email }}</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- ==== footer end ==== -->
      <!-- ==== custom cursor start ==== -->
      <div class="mouseCursor cursor-outer"></div>
      <div class="mouseCursor cursor-inner"></div>
      <!-- ==== / custom cursor end ==== -->


      <!-- ==== scroll to top start ==== -->
      <button class="progress-wrap" aria-label="scroll indicator" title="back to top">
         <span></span>
         <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
         </svg>
      </button>
      <!-- ==== / scroll to top end ==== -->

      <!-- ==== WhatsApp Floating Button Start ==== -->
      <a href="https://wa.me/{{ $setting->whatsapp_number }}" class="whatsapp-float" target="_blank" title="Chat on WhatsApp">
         <i class="bx bxl-whatsapp"></i>
      </a>
      <!-- ==== WhatsApp Floating Button End ==== -->

      <style>
         /* Scroll to top button style (example) */
         .progress-wrap {
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 10000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
         }

         .progress-wrap.active {
            opacity: 1;
            visibility: visible;
         }

         /* WhatsApp button */
         .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 55px;
            height: 55px;
            background-color: #25D366;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            font-size: 34px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.4s ease;
         }

         /* Pulse animation */
         .whatsapp-float::before {
            content: '';
            position: absolute;
            width: 65px;
            height: 65px;
            background-color: rgba(37, 211, 102, 0.4);
            border-radius: 50%;
            z-index: -1;
            animation: pulse 1.5s infinite ease-out;
         }

         @keyframes pulse {
            0% {
               transform: scale(0.8);
               opacity: 1;
            }

            100% {
               transform: scale(1.8);
               opacity: 0;
            }
         }

         /* WhatsApp up when scroll button visible */
         .whatsapp-float.move-up {
            bottom: 100px;
            /* moves up */
         }
      </style>

      <script>
         // scroll detect
         window.addEventListener('scroll', function() {
            const scrollBtn = document.querySelector('.progress-wrap');
            const whatsappBtn = document.querySelector('.whatsapp-float');

            //  page scroll
            if (window.scrollY > 200) {
               scrollBtn.classList.add('active'); // scroll button visible
               whatsappBtn.classList.add('move-up'); // whatsapp up
            } else {
               scrollBtn.classList.remove('active'); // scroll button hide
               whatsappBtn.classList.remove('move-up'); // whatsapp back to bottom
            }
         });
      </script>


   </div>
   <!-- ==== js dependencies start ==== -->
   <!-- jquery -->
   <script src="{{asset('/')}}assets/js/jquery-3.7.1.min.js"></script>
   <!-- bootstrap five js -->
   <script src="{{asset('/')}}assets/js/bootstrap.bundle.min.js"></script>
   <!-- nice select js -->
   <script src="{{asset('/')}}assets/js/jquery.nice-select.min.js"></script>
   <!-- magnific popup js -->
   <script src="{{asset('/')}}assets/js/jquery.magnific-popup.min.js"></script>
   <!-- swiper slider js -->
   <script src="{{asset('/')}}assets/js/swiper-bundle.min.js"></script>
   <!-- viewport js -->
   <script src="{{asset('/')}}assets/js/viewport.jquery.js"></script>
   <!-- odometer js -->
   <script src="{{asset('/')}}assets/js/odometer.min.js"></script>
   <!-- vanilla tilt js -->
   <script src="{{asset('/')}}assets/js/vanilla-tilt.min.js"></script>
   <!-- aos js -->
   <script src="{{asset('/')}}assets/js/aos.js"></script>
   <!-- splittext js -->
   <script src="{{asset('/')}}assets/js/SplitText.min.js"></script>
   <!-- scrollto js -->
   <script src="{{asset('/')}}assets/js/ScrollToPlugin.min.js"></script>
   <!-- scrolltrigger js -->
   <script src="{{asset('/')}}assets/js/ScrollTrigger.min.js"></script>
   <!-- gsap js -->
   <script src="{{asset('/')}}assets/js/gsap.min.js"></script>
   <!-- ==== / js dependencies end ==== -->
   <!-- template settings js -->
   <script src="{{asset('/')}}assets/js/template-settings.js"></script>
   <!-- main js -->
   <script src="{{asset('/')}}assets/js/custom.js"></script>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


   @stack('script')
   <!-- GLightbox JS -->
   <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>

   <!-- Initialize GLightbox -->
   <script>
      const lightbox = GLightbox({
         touchNavigation: true,
         loop: true,
         autoplayVideos: true,
         zoomable: true
      });
   </script>

   @stack('scripts')
</body>

</html>
