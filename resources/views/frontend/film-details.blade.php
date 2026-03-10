@extends('layouts.frontend')
@section('title','Service Details')
@section('content')
<style>
    .project-card {
        background-color: #ffffff;
        border: 1px solid #e9ecef;
    }

    .nav-tabs .nav-link {
        border: none;
        border-bottom: 3px solid transparent;
        color: #f6881d;
        font-weight: 600;
    }

    .nav-tabs .nav-link.active {
        border-bottom-color: #f6881d;
        color: #f6881d;
        background-color: transparent;
    }

    .features-icon-color {
        color: #f6881d;
    }

    .feature-icon {
        font-size: 1.5rem;
        width: 60px;
        height: 50px;
        line-height: 50px;
        text-align: center;
    }



    /* Estimate Modal Styles */
    .estimate-btn {
        background: linear-gradient(135deg, #f6881d 0%, #e67300 100%);
        color: white;
        border: none;
        padding: 12px 35px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(246, 136, 29, 0.3);
        transition: all 0.3s ease;
    }

    .estimate-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(246, 136, 29, 0.4);
        color: white;
    }

    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
        z-index: 1050;
        animation: fadeIn 0.3s ease;
    }

    .modal-overlay.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .estimate-modal {
        background: white;
        border-radius: 20px;
        width: 90%;
        max-width: 500px;
        padding: 0;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        animation: slideUp 0.3s ease;
        max-height: 90vh;
        overflow-y: auto;
    }

    .estimate-modal-header {
        background: linear-gradient(135deg, #f6881d 0%, #e67300 100%);
        color: white;
        padding: 25px 30px;
        border-radius: 20px 20px 0 0;
        position: relative;
    }

    .estimate-modal-header h2 {
        font-size: 24px;
        margin: 0;
    }

    .close-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        font-size: 24px;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .close-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg);
    }

    .estimate-modal-body {
        padding: 30px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
        font-size: 14px;
    }

    .form-group select,
    .form-group input {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .form-group input:focus {
        outline: none;
        border-color: #f6881d;
        box-shadow: 0 0 0 3px rgba(246, 136, 29, 0.1);
    }

    /* .select2-container--default .select2-selection--multiple {
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        min-height: 120px;
        padding: 5px;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #f6881d;
        box-shadow: 0 0 0 3px rgba(246, 136, 29, 0.1);
    } */

    .select2-container--default .select2-selection--multiple {
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        min-height: 120px;
        padding: 10px;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #f6881d;
        box-shadow: 0 0 0 3px rgba(246, 136, 29, 0.1);
    }

    /* Adjust Select2 search input inside the selection
.select2-container--default .select2-search--inline .select2-search__field {
    margin-top: 5px;
    min-height: 30px;
}

/* Style selected items */
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #f6881d;
        border: none;
        color: white;
        padding: 5px 10px;
        border-radius: 6px;
        margin: 5px 5px 0 0;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: white;
        margin-right: 5px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
        color: #fff;
        background-color: rgba(0, 0, 0, 0.2);
        border-radius: 3px;
    }

    */

    /* Fix Select2 dropdown z-index and positioning */
    .select2-container {
        z-index: 1060 !important;
    }

    .select2-dropdown {
        z-index: 1060 !important;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }


    .calculate-btn {

        display: block;
        margin: 0 auto;
        width: auto;
        min-width: 200px;
        background: linear-gradient(135deg, #f6881d 0%, #e67300 100%);
        color: white;
        border: none;
        padding: 22px 40px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .calculate-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(246, 136, 29, 0.4);
    }

    .popup-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        z-index: 2000;
        animation: fadeIn 0.3s ease;
    }

    .popup-overlay.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .popup {
        background: white;
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        animation: popIn 0.3s ease;
        max-width: 400px;
        width: 90%;
    }

    .popup-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #f6881d 0%, #e67300 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 35px;
        color: white;
    }

    .popup h3 {
        font-size: 24px;
        color: #333;
        margin-bottom: 15px;
    }

    .popup-cost {
        font-size: 42px;
        font-weight: 700;
        color: #f6881d;
        margin: 20px 0;
    }

    .popup-details {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 10px;
        margin: 20px 0;
        text-align: left;
    }

    .popup-details p {
        margin: 8px 0;
        color: #666;
        font-size: 14px;
    }

    .popup-btn {
        background: linear-gradient(135deg, #f6881d 0%, #e67300 100%);
        color: white;
        border: none;
        padding: 12px 30px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .popup-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(246, 136, 29, 0.4);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes popIn {
        0% {
            transform: scale(0.8);
            opacity: 0;
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Banner Section -->
<section class="common-banner">
    <div class="container">
        <div class="row">
            <div class="common-banner__content text-center">
                <span class="sub-title-main"><i class="icon-donation"></i> {{$setting->company_name}}</span>
                <h2 class="title-animation">{{$film->film_name}}</h2>
            </div>
        </div>
    </div>
    <div class="banner-bg">
        @php
        $coverPhoto = $allCoverImages->where('page_name', 'film')->first();
        @endphp

        @if ($coverPhoto)
        <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="Image">
        @else
        <img src="assets/images/page-bg.jpg" alt="Image">
        @endif
    </div>
</section>

<!-- project Section -->
<section class="award" id="eventSection">
    <div class="container">
        <!-- <div class="row mb-3">
        </div> -->



        <div class="row g-4">
            <!-- Left Column: Image -->
            <div class="col-lg-5">
                @if($film->images->isNotEmpty())
                <div id="filmCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-inner rounded-4 shadow-sm">
                        @foreach($film->images as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $image->image) }}"
                                class="d-block w-100 img-fluid"
                                alt="film Image {{ $key+1 }}"
                                style="aspect-ratio: 1 / 1; object-fit: cover;">
                        </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#filmCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#filmCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                @else
                <img src="https://placehold.co/600x600/dee2e6/495057?text=No+Image"
                    alt="No Image Available"
                    class="img-fluid rounded-4 shadow-sm w-100"
                    style="aspect-ratio: 1 / 1; object-fit: cover;"
                    onerror="this.onerror=null;this.src='https://placehold.co/600x600/dee2e6/495057?text=Image+Not+Available';">
                @endif
            </div>

            <!-- Right Column: Details -->
            <div class="col-lg-7">
                <div class="project-card p-4 rounded-4 shadow-sm h-100">
                    <h2 class="title-animation mb-2">{{$film->film_name ?? ''}}</h2>
                    <p>{{$film->text_before_price ?? ''}} <span class="sub-title-main fw-800">{{$film->price ?? ''}}</span> {{$film->text_after_price ?? ''}} </p>


                    <h4 class="fw-bold fs-19 mb-3">Synopsis</h4>
                    <p class="text-muted fs-19">{!! $film->synopsis ?? '' !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Estimate Modal -->
<div class="modal-overlay" id="estimateModalOverlay">
    <div class="estimate-modal">
        <div class="estimate-modal-header">
            <h2 id="modalFilmName">{{$film->film_name ?? 'Service'}}</h2>
            <button class="close-btn" onclick="closeEstimateModal()">&times;</button>
        </div>
        <div class="estimate-modal-body">
            <form id="estimateForm">
                <div class="form-group">
                    <label for="products">Select Products</label>
                    <select id="EST_products" class="form-select">
                        <option value="">Select products</option>
                        @foreach ($products as $products)
                        <option value={{$products->id}}>
                            {{$products->name}}
                        </option>

                        @endforeach


                    </select>
                </div>
                <div class="form-group">
                    <label for="squareFeet">Square Feet</label>
                    <input type="number" id="squareFeet" placeholder="Enter square feet" min="0" required>
                </div>
                <div class="form-group mt-3">
                    <label for="totalEstimate">Estimated Price</label>
                    <input type="text" id="totalEstimate" class="form-control" readonly placeholder="Your estimate will appear here">
                </div>
                <button type="submit" class="calculate-btn">Calculate Estimate</button>
            </form>
        </div>
    </div>
</div>



@endsection

@push('style')
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush


@push('scripts')
<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#estimateForm').on('submit', function(e) {
            e.preventDefault();

            let productId = $('#EST_products').val();
            let squareFeet = parseFloat($('#squareFeet').val());
            let filmId = "{{ $film->id ?? '' }}"; // Current film ID

            if (!productId || !squareFeet || squareFeet <= 0) {
                Swal.fire('Warning', 'Please select a product and enter a valid square feet value.', 'warning');
                return;
            }

            $.ajax({
                url: `/get-estimate-price/${filmId}/${productId}`,
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    if (res.success) {
                        let total = res.price_per_sft * squareFeet;
                        $('#totalEstimate').val(total.toFixed(2) + ' TK');
                    } else {
                        Swal.fire('Info', 'No price found!', 'info');
                        $('#totalEstimate').val('');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Something went wrong while fetching estimate price.', 'error');
                }
            });
        });
    });
</script>

<script>
    function openEstimateModal() {
        // Clear all fields before showing the modal
        document.getElementById('EST_products').value = '';
        document.getElementById('squareFeet').value = '';
        document.getElementById('totalEstimate').value = '';

        // Show modal
        document.getElementById('estimateModalOverlay').classList.add('active');
    }

    function closeEstimateModal() {
        // Clear all fields before closing the modal
        document.getElementById('EST_products').value = '';
        document.getElementById('squareFeet').value = '';
        document.getElementById('totalEstimate').value = '';

        // Hide modal
        document.getElementById('estimateModalOverlay').classList.remove('active');
    }

    // Close modal when clicking outside
    document.getElementById('estimateModalOverlay').addEventListener('click', function(e) {
        if (e.target === this) {
            closeEstimateModal();
        }
    });
</script>
@endpush
