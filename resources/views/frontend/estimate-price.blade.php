@extends('layouts.frontend')
@section('title','All Services')
@section('content')

<style>
    /* Fixed-height images with object-fit cover */
    .award .award__single .thumb img {
        width: 100%;
        max-height: 600px;
        /* fixed height for desktop */
        object-fit: cover;
        /* border: 1px solid #ddd;
        border-radius: 5px; */
        transition: transform 0.3s;
    }

    .award .award__single .thumb a {
        border: 1px solid #ddd;
    }

    /* Hover zoom effect */
    .award .award__single .thumb img:hover {
        transform: scale(1.05);
    }

    /* Tablet */
    @media (max-width: 992px) {
        .award .award__single .thumb img {
            height: 350px;
        }
    }

    /* Mobile */
    @media (max-width: 768px) {
        .award .award__single .thumb img {
            height: 250px;
        }
    }

    /* Flex content alignment */
    .award__single {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .award__single .content {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-align: center;
        padding: 15px;
        flex-grow: 1;
    }

    .award__single .award__content h3 {
        font-size: 1rem;
        margin: 10px 0;
    }

    /* Button styling */
    .section__cta .btn--primary {
        margin-top: 20px;
    }
</style>

<!-- Banner Section -->
<section class="common-banner">
    <div class="container">
        <div class="row">
            <div class="common-banner__content text-center">
                <span class="sub-title-main"><i class="icon-donation"></i> {{$setting->company_name}}</span>
                <h2 class="title-animation">Estimation Price</h2>
            </div>
        </div>
    </div>
    <div class="banner-bg">
        @php
        $coverPhoto = $allCoverImages->where('page_name', 'estimate')->first();
        @endphp

        @if ($coverPhoto)
        <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="Image">
        @else
        <img src="assets/images/page-bg.jpg" alt="Image">
        @endif
    </div>
</section>
<section class="estimate ff-estimate mb-2" id="estimateSection">
    <style>
        :root {
            --base: #07891e;
            /* close to "#7891e" which is invalid hex */
            --base-600: #056c18;
            --base-50: #e9f6ee;
        }

        .estimate-card {
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, .06)
        }

        .estimate-head {
            border-bottom: 1px dashed #e5e7eb;
            padding: .75rem 1rem
        }

        .estimate-head .title {
            font-weight: 700;
            margin: 0
        }

        .pill {
            display: inline-block;
            background: var(--base-50);
            color: var(--base-600);
            padding: .2rem .6rem;
            border-radius: 999px;
            font-size: .8rem
        }

        .btn-estimate {
            background: var(--base);
            color: #fff;
            border: 0
        }

        .btn-estimate:hover {
            background: var(--base-600);
            color: #fff
        }

        .rate-box {
            background: var(--base-50);
            border: 1px dashed var(--base-600);
            border-radius: 12px
        }

        .stat {
            font-weight: 700
        }

        .total-box {
            background: var(--base-50);
            border: 2px solid var(--base);
            border-radius: 16px
        }

        .total-box .amount {
            font-weight: 800;
            font-size: clamp(28px, 4vw, 48px);
            color: var(--base)
        }
    </style>

    <div class="container pt-2">
        <div class="section__header text-center" data-aos="fade-up" data-aos-duration="1000">
            <span class="sub-title-main"><i class="fa-solid fa-calculator"></i>Estimate Price</span>
            <h2 class="title-animation mt-0">Get Your Project Cost by Area (sft)</h2>
        </div>

        <div class="row align-items-center g-4 product-tab p-0 bg-white">
            <!-- Left: Image (4 columns) -->
            <div class="col-lg-4" data-aos="fade-right" data-aos-duration="800">
                <div class="ratio ratio-4x3 rounded-4 overflow-hidden">
                    <img src="{{ asset('assets/image/estimate-calculation.png') }}" alt="Estimate preview" class="w-100 h-100 object-fit-cover">
                </div>
            </div>

            <!-- Right: Form (8 columns) -->
            <div class="col-lg-8" data-aos="fade-left" data-aos-duration="800">
                <div class="estimate-card">
                    <div class="estimate-head d-flex align-items-center justify-content-between">
                        <h5 class="title"><i class="bx bx-slider-alt"></i> Configure</h5>
                        <span class="pill"><i class="bx bx-track"></i> Per sft pricing</span>
                    </div>
                    <div class="p-3 p-md-4">
                        <form id="priceEstimatorForm" class="row g-3">
                            @csrf
                            <!--<div class="col-md-6">-->
                            <!--    <label class="form-label">Product</label>-->
                            <!--    <select id="estProduct" class="form-select estProduct" onchange="productChanged(this.value)">-->
                            <!--        <option value=""disabled selected>---Please Select---</option>-->


                            <!--     @foreach ($products as $product)-->
                            <!--        <option value="{{$product->id}}">{{$product->name}}</option>-->

                            <!--     @endforeach-->
                            <!--    </select>-->
                            <!--</div>-->

                            <div class="col-md-6">
                                <label class="form-label">Film</label>
                                <select id="estFilm" class="form-select">
                                    <option value="" disabled selected>---Please Select---</option>

                                    @foreach ($films as $film)
                                    <option value="{{$film->id}}">{{$film->film_name}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="col-md-6">-->
                            <!--   <label class="form-label">Color</label>-->
                            <!--   <select id="colorSelect" class="form-control">-->
                            <!--         <option value="" disabled selected>---Select Product First---</option>-->
                            <!--   </select>-->
                            <!--</div>-->

                            <div class="col-md-6">
                                <label class="form-label">Film Type</label>
                                <select id="serviceTypeSelect" class="form-select">
                                    <option value="" disabled selected>---Select Film First---</option>
                                </select>
                            </div>



                            <div class="col-md-6">
                                <label class="form-label">Estimated Area (sft)</label>
                                <input type="number" id="estSft" class="form-control" inputmode="decimal" min="0" step="0.01" placeholder="e.g., 12500">
                            </div>
                            <div class="col-md-6 d-flex align-items-end">
                                <button type="button" id="btnCalc" class="btn btn-estimate w-100">
                                    <i class="bx bx-calculator"></i> Calculate
                                </button>
                            </div>

                            <div class="col-12">
                                <div class="total-box p-4 text-center">
                                    <div class="amount" id="totalText">৳ 0.00</div>
                                    <div id="estError" class="text-danger mt-2" style="display:none"></div>
                                </div>
                            </div>
                        </form>

                        <div class="mt-3 d-flex gap-2">
                            <button type="button" id="btnResetEst" class="btn btn-outline-secondary">
                                <i class="bx bx-refresh"></i> Reset
                            </button>

                        </div>
                    </div>
                </div>
            </div><!-- /Right -->
        </div>
    </div>
    <div style="height: 100px;"></div>
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

@push('scripts')
<script>
    $(document).ready(function() {
        $('#viewAll').on('click', function(e) {
            e.preventDefault();
            $('.product-item').removeClass('d-none');
            $(this).parent().hide();
        });
    });
</script>



<script>
    const SERVICE_TYPE_URL_TEMPLATE = "{{ url('/films/__ID__/types') }}"; // AJAX URL
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
            $sel.html(`<option value="" disabled selected>---Select Film First---</option>`);
            return;
        }
        $sel.html(`<option value="">Loading...</option>`);

        const url = SERVICE_TYPE_URL_TEMPLATE.replace('__ID__', serviceId);

        $.get(url)
            .done(res => {
                const types = res.types || [];
                $sel.empty().append(`<option value="">Select film type</option>`);
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
        const film_id = $('#estFilm').val();
        const service_type_value = $('#serviceTypeSelect').val();
        const sft = parseFloat($('#estSft').val());

        if (!film_id) {
            setResult({
                error: 'Select a film.'
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
                film_id,
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
        $('#estFilm').on('change', function() {
            loadServiceTypes($(this).val());
            if ($('#estSft').val()) calc(); // recalc if area entered
        });

        $('#serviceTypeSelect, #estSft').on('change input', function() {
            if ($('#estSft').val() && $('#estFilm').val()) calc();
        });

        $('#btnCalc').on('click', calc);

        $('#btnResetEst').on('click', () => {
            $('#priceEstimatorForm')[0].reset();
            $('#serviceTypeSelect').html(`<option value="" disabled selected>---Select Film First---</option>`);
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
@endpush