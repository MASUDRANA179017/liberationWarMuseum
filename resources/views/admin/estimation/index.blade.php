@extends('layouts.admin')
@section('title','Estimations')
@section('content')
<style>
    .dynamic-field-block{padding:1rem;background:#f8f9fa;border:1px dashed #ced4da;border-radius:.375rem}
</style>

<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="product-details-card-header-title">
                                <i class='bx bx-calculator bx-tada'></i> Estimations
                            </h4>
                            <a href="javascript:void(0)" class="purchase-button ms-auto" data-bs-toggle="modal"
                               data-bs-target="#estimationFormModal" id="addEstimationBtn">
                                <i class='bx bx-message-square-add bx-tada'></i> Add New
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="estimationTable" class="table table-striped table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Type</th>
                                    <th>Item</th>
                                    <th>Price / sft</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Modal -->
    <div class="modal fade" id="estimationFormModal" tabindex="-1" aria-labelledby="estimationFormModalLabel" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="estimationFormModalLabel">Add/Edit Estimation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="estimationForm">
                        @csrf
                        <input type="hidden" name="id" id="estimationId">

                        <h6 class="form-section-title">Select Product & Service</h6>
                        <div class="row g-3">
                            <!-- <div class="col-md-6">
                                <label class="form-label">Product</label>
                                <select id="productSelect" class="form-select" data-placeholder="Select product"></select>
                            </div> -->
                            <div class="col-md-6">
                                <label class="form-label">Service</label>
                                <select id="serviceSelect" class="form-select" data-placeholder="Select service"></select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Service Type</label>
                                <select id="serviceTypeSelect" class="form-select" data-placeholder="Select service"></select>
                            </div>
                        </div>

                        <div class="row g-3">
                            <!-- <div class="col-md-6">
                                <label class="form-label">Color</label>
                                <select id="colorSelect" class="form-select" data-placeholder="Select product"></select>
                            </div> -->
                            <!-- <div class="col-md-6">
                                <label class="form-label">Service Type</label>
                                <select id="serviceTypeSelect" class="form-select" data-placeholder="Select service"></select>
                            </div> -->
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Price per sft</label>
                            <input type="number" step="0.01" min="0" name="price_per_sft" class="form-control" id="price_per_sft" placeholder="e.g., 18.50">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="cancel-button-1 border-0" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveEstimationBtn" class="submit-button-1 border-0">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>

// CSRF
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

// DataTable
let estTable = $('#estimationTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('admin.estimations.index') }}",
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
        {
            data: null,
            name: 'item_type',
            render: () => 'Service + Service Type'
        },
        {
            data: null,
            name: 'item_name',
            render: function(row){
                const parts = [];

                // // Product name
                // if(row.product?.name) parts.push(row.product.name);

                // // Color (if exists)
                // if(row.color) parts.push(row.color);

                // Service name
                if(row.service?.name) parts.push(row.service.name);

                // Service type (if exists)
                if(row.service_type) parts.push(row.service_type);

                return parts.length ? parts.join(' + ') : '—';
            }

            // render: function(row){
            //     // Prefer explicit names if backend provides them
            //     const pn = row.product_name || row.product?.name || '';
            //     const sn = row.service_name || row.service?.name || '';
            //     if (pn && sn) return pn + ' + ' + sn;
            //     // Fallback to any generic field
            //     return row.item_name || '—';
            // }
        },
        { 
        data: 'price_per_sft',
        name: 'price_per_sft',
        render: function (d) {
            if (!d) return '0.00';
            d = String(d).replace(/,/g, '');
            const num = parseFloat(d);
            return isNaN(num)
                ? '0.00'
                : num.toLocaleString('en-BD', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }
        },
        { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
});

// Modal: reset
$(document).on('click', '#addEstimationBtn', function(){
    $('#estimationForm')[0].reset();
    $('#estimationId').val('');
    loadProducts();
    loadServices();
    loadServiceTypes();
    $('#estimationFormModalLabel').text('Add New Estimation');
});



function loadProducts(selected = null, selectedColor = null, callback = null) {
    const $productSelect = $('#productSelect');
    const $colorSelect = $('#colorSelect');

    console.log('🟦 loadProducts() called with:', { selected, selectedColor });

    $productSelect.empty().append(`<option value="">Loading...</option>`);

    // প্রথম AJAX: simple-list
    $.get('/dashboard/products/simple-list', function (list) {
        console.log('✅ Product list loaded:', list);

        $productSelect.empty().append(`<option value="">Select product</option>`);
        (list || []).forEach(row => {
            $productSelect.append(`<option value="${row.id}">${row.name}</option>`);
        });

        if (selected) {
            console.log('🟩 Selected product found:', selected);
            $productSelect.val(String(selected));

            // দ্বিতীয় AJAX: colors
            console.log(`🔄 Fetching colors for product ID: ${selected}`);
            $.get(`/dashboard/products/${selected}/colors`, function (res) {
                console.log('✅ Color response:', res);

                const colors = res.colors || [];
                $colorSelect.empty();

                if (colors.length) {
                    console.log(`🎨 ${colors.length} colors found:`, colors);
                    $colorSelect.append(`<option value="">Select color</option>`);
                    colors.forEach(c => {
                        $colorSelect.append(`<option value="${c}">${c}</option>`);
                    });
                    if (selectedColor) {
                        console.log('🟨 Preselecting color:', selectedColor);
                        $colorSelect.val(selectedColor);
                    }
                } else {
                    console.warn('⚠️ No colors available for this product.');
                    $colorSelect.append(`<option value="">No colors available</option>`);
                }

                if (callback) {
                    console.log('📞 Running callback after color load');
                    callback();
                }
            }).fail((xhr) => {
                console.error('❌ Color load failed:', xhr.status, xhr.responseText);
                $colorSelect.empty().append(`<option value="">Error loading colors</option>`);
                if (callback) callback();
            });
        } else {
            console.warn('⚠️ No product selected, showing default color message.');
            $colorSelect.empty().append(`<option value="">Select product first</option>`);
            if (callback) callback();
        }
    }).fail(function (xhr) {
        console.error('❌ Product list load failed:', xhr.status, xhr.responseText);
        $productSelect.empty().append(`<option value="">No products</option>`);
        $colorSelect.empty().append(`<option value="">Select product first</option>`);
        if (callback) callback();
    });
}

loadProducts(); // modal open - list load -

// user select - color load 
$(document).on('change', '#productSelect', function() {
    const productId = $(this).val();
    const $colorSelect = $('#colorSelect');

    if (!productId) {
        $colorSelect.empty().append(`<option value="">Select product first</option>`);
        return;
    }

    $colorSelect.empty().append(`<option value="">Loading colors...</option>`);

    $.get(`/dashboard/products/${productId}/colors`, function(res){
        const colors = res.colors || [];
        $colorSelect.empty();

        if (colors.length) {
            $colorSelect.append(`<option value="">Select color</option>`);
            colors.forEach(c => $colorSelect.append(`<option value="${c}">${c}</option>`));
        } else {
            $colorSelect.append(`<option value="">No colors available</option>`);
        }
    }).fail(() => {
        $colorSelect.empty().append(`<option value="">Error loading colors</option>`);
    });
});




// Edit button
$(document).on('click', '.est-edit', function(){
    const id = $(this).data('id');
    if(!id) return;

    $.get(`/dashboard/estimations/${id}/edit`, function(res){
        $('#estimationId').val(res.id || '');
        $('#price_per_sft').val(res.price_per_sft ?? '');

        // Step 1: Load services,  select - service
        loadServices(res.service_id || null, function(){
            // Step 2:  service loaded ,  ID - service_type load 
            if(res.service_id){
                $.get(`/dashboard/services/${res.service_id}/types`, function(typeRes){
                    const types = typeRes.types || [];
                    const $serviceTypeSelect = $('#serviceTypeSelect');
                    $serviceTypeSelect.empty().append('<option value="">Select service type</option>');
                    types.forEach(type => $serviceTypeSelect.append(`<option value="${type}">${type}</option>`));

                    // Step 3: preselect the saved service_type
                    if(res.service_type) $serviceTypeSelect.val(res.service_type);
                });
            }
        });

        $('#estimationFormModalLabel').text('Edit Estimation');
        $('#estimationFormModal').modal('show');
    }).fail(function(){
        Swal.fire('Error','Could not load record','error');
    });
});







// Save
$(document).on('click', '#saveEstimationBtn', function(e){
    e.preventDefault();

    const estId = $('#estimationId').val();
    const payload = new FormData();
    payload.append('product_id', $('#productSelect').val() || '');
    payload.append('service_id', $('#serviceSelect').val() || '');
    payload.append('price_per_sft', $('#price_per_sft').val() || '');
    payload.append('color', $('#colorSelect').val() || '');
    payload.append('service_type', $('#serviceTypeSelect').val() || '');
    
    const url = estId
        ? `/dashboard/estimations/${estId}`
        : `{{ route('admin.estimations.store') }}`;

    $.ajax({
        url: url,
        method: 'POST', // use method spoof for PUT when editing
        data: payload,
        processData: false,
        contentType: false,
        beforeSend: function(xhr){
            if(estId){ xhr.setRequestHeader('X-HTTP-Method-Override', 'PUT'); }
        },
        success: function(res){
            $('#estimationForm')[0].reset();
            var modalEl = document.getElementById('estimationFormModal');
            var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.hide();
            estTable.ajax.reload(null,false);
            Swal.fire('Saved', res.message || 'Estimation saved', 'success');
        },
        error: function(xhr){
            if(xhr.status === 422 && (xhr.responseJSON?.message || xhr.responseJSON?.errors)){
                const msg = xhr.responseJSON?.message ||
                            Object.values(xhr.responseJSON.errors).flat().join('\n');
                Swal.fire({ icon:'error', title:'Validation Error', text: msg });
            } else {
                Swal.fire('Error','Could not save record','error');
            }
        }
    });
});

// Toggle status (kept if your backend supports it)
$(document).on('click', '.est-toggle', function(){
    const id = $(this).data('id');
    if(!id) return;
    $.ajax({
        url: `/dashboard/estimations/${id}/toggle`,
        method: 'PATCH',
        success: function(res){
            if(res.success){ estTable.ajax.reload(null,false); }
            else Swal.fire('Error','Toggle failed','error');
        },
        error: function(){ Swal.fire('Error','Toggle failed','error'); }
    });
});

// Delete
$(document).on('click', '.est-del', function(){
    const id = $(this).data('id');
    if(!id) return;
    Swal.fire({
        title:'Are you sure?', text:'This record will be permanently deleted!', icon:'warning',
        showCancelButton:true, confirmButtonText:'Yes, delete it'
    }).then((r)=>{
        if(r.isConfirmed){
            $.ajax({
                url:`/dashboard/estimations/${id}`,
                type:'DELETE',
                success:function(res){
                    if(res.success){ Swal.fire('Deleted', res.message || 'Record deleted','success'); estTable.ajax.reload(null,false); }
                    else Swal.fire('Error','Delete failed','error');
                },
                error:function(){ Swal.fire('Error','Delete failed','error'); }
            });
        }
    });
});












function loadServices(selected=null, callback=null){
    const $sel = $('#serviceSelect');
    $sel.empty().append(`<option value="">Loading...</option>`);

    $.get('/dashboard/services/simple-list', function(list){
        $sel.empty().append(`<option value="">Select service</option>`);
        (list || []).forEach(row=>{
            $sel.append(`<option value="${row.id}">${row.name}</option>`);
        });
        if(selected) $sel.val(String(selected));
        if(callback) callback(); // call callback after services loaded
    }).fail(function(){
        $sel.empty().append(`<option value="">No services</option>`);
        if(callback) callback();
    });
}






$(document).on('change', '#serviceSelect', function() {
    const serviceId = $(this).val();
    const $serviceTypeSelect = $('#serviceTypeSelect');

    if (!serviceId) {
        $serviceTypeSelect.empty().append(`<option value="">Select service first</option>`);
        return;
    }

    $serviceTypeSelect.empty().append(`<option value="">Loading...</option>`);

    $.get(`/dashboard/services/${serviceId}/types`, function(res) {
        const types = res.types || [];
        $serviceTypeSelect.empty().append(`<option value="">Select service type</option>`);
        if (types.length) {
            types.forEach(type => {
                $serviceTypeSelect.append(`<option value="${type}">${type}</option>`);
            });
        } else {
            $serviceTypeSelect.append(`<option value="">No types available</option>`);
        }
    }).fail(() => {
        $serviceTypeSelect.empty().append(`<option value="">Error loading types</option>`);
    });
});



</script>
@endpush
