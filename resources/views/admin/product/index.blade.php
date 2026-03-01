@extends('layouts.admin')
@section('title','Products')
@section('content')
<style>
    .dynamic-field-block {
    padding: 1rem;
    background-color: #f8f9fa;
    border: 1px dashed #ced4da;
    border-radius: 0.375rem;
}
</style>

<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="product-details-card-header-title">
                                <i class='bx bx-carousel bx-tada'></i> Products
                            </h4>
                            <a href="javascript:void(0)" class="purchase-button ms-auto" data-bs-toggle="modal"
                               data-bs-target="#productFormModal" id="addProductBtn">
                                <i class='bx bx-message-square-add bx-tada'></i> Add New Product
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="productTable" class="table table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Subtitle/Short Description</th>
                                        <th>Status</th>
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

    <!-- Product Add/Edit Modal -->
    <div class="modal fade" id="productFormModal" tabindex="-1" aria-labelledby="productFormModalLabel" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productFormModalLabel">Add/Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="productForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="productId">

                        <h6 class="form-section-title">General Information</h6>
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" id="productName" placeholder="e.g. Floor Hardener">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subtitle/Short Description</label>
                            <input type="text" name="subtitle" class="form-control" id="productSubtitle" placeholder="e.g., Dry Shake Non-Metallic Surface Hardener">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Image</label>
                            <input type="file" name="image" class="form-control" id="productImage">
                            <div id="previewImage" class="mt-2"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="text_before_price">Text Before Price</label>
                                    <input type="text" name="text_before_price" id="text_before_price" class="form-control" value="{{ old('text_before_price') }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price') }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="text_after_price">Text After Price</label>
                                    <input type="text" name="text_after_price" id="text_after_price" class="form-control" value="{{ old('text_after_price') }}">
                                </div>
                            </div>
                        </div>



                        <h6 class="form-section-title">Detailed Information</h6>
                        <div class="mb-3">
                            <label class="form-label">Full Description</label>
                            <textarea name="description" placeholder="Enter detailed product description..." class="form-control summernote" id="productDescription" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Recommended Applications</label>
                            <textarea name="applications" placeholder="e.g., Factories, warehouses, parking decks..." class="form-control summernote" id="productApplications" rows="2"></textarea>
                        </div>

                        <h6 class="form-section-title">Key Benefits</h6>
                        <div id="keyBenefitsContainer"></div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addBenefit()">+ Add Benefit</button>

                        <h6 class="form-section-title mt-4">Core Features</h6>
                        <div id="coreFeaturesContainer"></div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addFeature()">+ Add Feature</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="cancel-button-1 border-0" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveProductBtn" class="submit-button-1 border-0">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

<script>
console.log('Product page JS loaded');

// CSRF setup for AJAX
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

// DataTable
let table = $('#productTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('products.index') }}",
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
        {
            data: 'image',
            name: 'image',
            orderable: false,
            searchable: false,
            render: function(data) {
                return data ? `<img src="/storage/${data}" width="50" class="img-thumbnail">` : '<img src="https://via.placeholder.com/50" class="img-thumbnail">';
            }
        },
        { data: 'name', name: 'name' },
        { data: 'subtitle', name: 'subtitle' },
        { data: 'status', name: 'status', orderable: false, searchable: false },
        { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
});

// Add New Product - clear modal
$(document).on('click', '#addProductBtn', function() {
    $('#productForm')[0].reset();
    $('#productId').val('');
    $('#keyBenefitsContainer').empty();
    $('#coreFeaturesContainer').empty();
    $('#previewImage').html('');
    $('#productFormModalLabel').text('Add New Product');
});

// Image preview
$(document).on('change', '#productImage', function() {
    const file = this.files[0];
    if (!file) { $('#previewImage').html(''); return; }
    const reader = new FileReader();
    reader.onload = function(e) { $('#previewImage').html('<img src="'+e.target.result+'" width="100" class="img-thumbnail">'); }
    reader.readAsDataURL(file);
});

// Save Product
$(document).on('click', '#saveProductBtn', function(e) {
    e.preventDefault();
    const formData = new FormData($('#productForm')[0]);

    $.ajax({
        url: "{{ route('products.store') }}",
        method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(res) {
            $('#productForm')[0].reset();
            $('#previewImage').html('');
            $('#keyBenefitsContainer').empty();
            $('#coreFeaturesContainer').empty();
            var modalEl = document.getElementById('productFormModal');
            var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.hide();

            table.ajax.reload(null,false);
            Swal.fire('Saved', res.message || 'Product saved', 'success');
            // $('.modal-backdrop').remove();
        },
        error: function(xhr) {
            console.error(xhr);
            if (xhr.status === 422 && xhr.responseJSON.errors) {
                const errs = Object.values(xhr.responseJSON.errors).flat().join('<br>');
                Swal.fire({ icon: 'error', title: 'Validation Error', html: errs });
            } else {
                Swal.fire('Error', 'Could not save product.', 'error');
            }
        }
    });
});

// Toggle status
$(document).on('click', '.status-badge', function() {
    const id = $(this).data('id');
    if(!id) return;
    $.post("/dashboard/products/"+id+"/toggle-status", {}, function(res) {
        if(res.success) table.ajax.reload(null,false);
        else Swal.fire('Error','Could not toggle status','error');
    }).fail(function() { Swal.fire('Error','Toggle failed','error'); });
});

// Delete
$(document).on('click', '.delete-btn', function() {
    const id = $(this).data('id');
    if(!id) return;
    Swal.fire({
        title:'Are you sure?', text:'This product will be permanently deleted!', icon:'warning',
        showCancelButton:true, confirmButtonText:'Yes, delete it!'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                url:'/dashboard/products/'+id,
                type:'DELETE',
                success:function(res){
                    if(res.success){ Swal.fire('Deleted', res.message || 'Product deleted','success'); table.ajax.reload(null,false); }
                    else Swal.fire('Error','Delete failed','error');
                },
                error:function(){ Swal.fire('Error','Delete failed','error'); }
            });
        }
    });
});

// Edit
$(document).on('click', '.edit-btn', function() {
    const id = $(this).data('id');
    if(!id) return;

    $.get("/dashboard/products/"+id+"/edit", function(res){
        $('#productId').val(res.id || '');
        $('#productName').val(res.name || '');
        $('#productSubtitle').val(res.subtitle || '');
        $('#productDescription').val(res.description || '');
        $('#productApplications').val(res.applications || '');
        $('#keyBenefitsContainer').empty();
        $('#coreFeaturesContainer').empty();

        $('#text_before_price').val(res.text_before_price || '');
        $('#price').val(res.price || '');
        $('#text_after_price').val(res.text_after_price || '');

        if(res.benefits) res.benefits.forEach(b => addBenefit(b));
        if(res.features) res.features.forEach(f => addFeature(f));
        if(res.image) $('#previewImage').html('<img src="/storage/'+res.image+'" width="100" class="img-thumbnail">');
        else $('#previewImage').html('');

        $('#productFormModalLabel').text('Edit Product');
        $('#productFormModal').modal('show');
    }).fail(function(){ Swal.fire('Error','Could not load product','error'); });
});

// Helpers
function addBenefit(value=''){ $('#keyBenefitsContainer').append(`<div class="input-group mb-2"><input type="text" name="benefits[]" class="form-control" value="${value}" placeholder="Benefit description"><button class="btn btn-outline-danger" type="button" onclick="$(this).parent().remove()">Remove</button></div>`);}
function addFeature(f={}){ $('#coreFeaturesContainer').append(`<div class="dynamic-field-block mb-3 border p-2 rounded"><div class="d-flex justify-content-end"><button class="btn btn-sm btn-outline-danger mb-2" type="button" onclick="$(this).closest('.dynamic-field-block').remove()">Remove</button></div><div class="mb-2"><input type="text" name="features[title][]" class="form-control" value="${f.title||''}" placeholder="Feature Title"></div><div class="mb-2"><input type="text" name="features[icon][]" class="form-control" value="${f.icon||''}" placeholder="Boxicons  Class From https://v2.boxicons.com/ "></div><div><textarea name="features[description][]" class="form-control" rows="2" placeholder="Feature Description">${f.description||''}</textarea></div></div>`);}
</script>
@endpush
