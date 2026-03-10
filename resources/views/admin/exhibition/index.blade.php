@extends('layouts.admin')
@section('title','Product')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header exhibition-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="exhibition-details-card-header-title"><i class='bx bx-carousel bx-tada'></i> Products
                            </h4>
                            <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal"
                                data-bs-target="#create-exhibition-modal"><i class='bx bx-message-square-add bx-tada'></i>
                                Add New Product</a>
                        </div>
                    </div>
                    <!--create exhibition modal-->
                    @include('admin.exhibition.partial.create-exhibition')
                    <!--create exhibition modal-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="add-row"
                                            class="display table table-striped table-hover basic-datatables" role="grid"
                                            aria-describedby="add-row_info">
                                            <thead class="">
                                                <tr role="row">
                                                    <th>Product Title</th>
                                                    <th>Image</th>
                                                    <th>Venue Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($exhibitions as $exhibition)
                                                <tr role="row" class="odd">
                                                    <!-- <td class="sorting_1">0{{ $loop->iteration }}</td> -->
                                                    <td>{{ $exhibition->exhibition_title }}</td>
                                                    <td>
                                                        <!-- @if($exhibition->images->isNotEmpty() && $exhibition->images[0]->image)
                                                        <img src="{{ asset('storage/' . $exhibition->images[0]->image) }}" width="96px"
                                                            height="72px" alt="image">
                                                        @endif -->
                                                        @if($exhibition->images->isNotEmpty() && $exhibition->images[0]->image)
                                                        <img src="{{ asset('storage/' . $exhibition->images[0]->image) }}" width="96px" height="72px" alt="image">
                                                        @else
                                                        <span class="text-muted">No Image</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $exhibition->director_name }}</td>
                                                    <td>
                                                        @if($exhibition->status)
                                                        <a href="{{ route('exhibition.toggle-status', $exhibition->id) }}"
                                                            class="badge badge-success">Active</a>
                                                        @else
                                                        <a href="{{ route('exhibition.toggle-status', $exhibition->id) }}"
                                                            class="badge badge-danger">Inactive</a>
                                                        @endif
                                                    <td>
                                                        <div class="form-button-action">
                                                            <!--<a href="#"-->
                                                            <!--    class="btn btn-link btn-success btn-lg edit-exhibition-btn"-->
                                                            <!--    data-id="{{ $exhibition->id }}"-->
                                                            <!--    data-exhibition_category_id="{{ $exhibition->exhibition_category_id }}"-->
                                                            <!--    data-title="{{ $exhibition->title }}"-->
                                                            <!--    data-description="{{ $exhibition->description }}"-->
                                                            <!--    data-exhibition_date="{{ $exhibition->exhibition_date }}"-->
                                                            <!--    data-exhibition_end_date="{{ $exhibition->exhibition_end_date }}"-->
                                                            <!--    data-location="{{ $exhibition->location }}"-->
                                                            <!--    data-image="{{ asset('storage/'.$exhibition->image) }}">-->
                                                            <!--    <i class='bx bxs-edit'></i>-->
                                                            <!--</a>-->


                                                            <a href="#"
                                                                class="btn btn-link btn-success btn-lg edit-exhibition-btn"
                                                                data-id="{{ $exhibition->id }}"
                                                                data-exhibition_title="{{ $exhibition->exhibition_title }}"
                                                                data-director_name="{{ $exhibition->director_name }}"
                                                                data-synopsis="{{ $exhibition->synopsis }}"
                                                                data-image="{{ asset('storage/'.$exhibition->image) }}">
                                                                <i class='bx bxs-edit'></i>
                                                            </a>

                                                            <a href="#" id="delete-exhibition-link"
                                                                data-exhibition-id="{{ $exhibition->id }}" title="delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-original-title="Remove">
                                                                <i class='bx bx-trash-alt'></i> </a>
                                                            <form id="delete-exhibition-form-{{ $exhibition->id }}"
                                                                action="{{ route('exhibition.destroy', $exhibition->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>

                                                    </td>
                                                </tr>


                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.exhibition.partial.edit-exhibition')

@endsection



@push('script')

<script>
    $(document).on("click", ".edit-exhibition-btn", function(e) {
        e.preventDefault();

        let id = $(this).data("id");
        let exhibition_title = $(this).data("exhibition_title");
        let director_name = $(this).data("director_name");
        let synopsis = $(this).data("synopsis");
        let image = $(this).data("image");

        // form action update
        $("#editExhibitionForm").attr("action", "/dashboard/exhibition/update/" + id);

        // input fields এ ডাটা বসানো
        $("#edit_exhibition_title").val(exhibition_title);
        $("#edit_director_name").val(director_name);
        $("#edit_synopsis").val(synopsis);

        // image preview
        if (image) {
            $("#edit_image_preview").attr("src", image).removeClass("d-none");
        } else {
            $("#edit_image_preview").addClass("d-none");
        }

        // ---- images load ----
        $.get('/dashboard/exhibition/' + id + '/images', function(images) {
            let container = $("#edit_image_preview_container");
            container.empty();
            images.forEach(function(img) {
                container.append(`
                    <div class="position-relative d-inline-block">
                    <img src="/storage/${img.image}" 
                            width="120" height="90"
                            class="rounded border"/>
                    <button type="button" 
                            class="btn btn-sm btn-danger position-absolute top-0 end-0 delete-db-image"
                            data-id="${img.id}"
                            style="padding:2px 6px;">×</button>
                    </div>
                `);
            });
        });



        // modal show 
        $("#editExhibitionModal").modal("show");
    });


    // // (unnecessary ) Image preview on file select
    // $("#edit_image").on("change", function () {
    //     let input = this;

    //     if (input.files && input.files[0]) {
    //         let reader = new FileReader();

    //         reader.onload = function (e) {
    //             $("#edit_image_preview")
    //                 .attr("src", e.target.result)
    //                 .removeClass("d-none"); // preview দেখাও
    //         };

    //         reader.readAsDataURL(input.files[0]); // ফাইলকে base64 তে রূপান্তর
    //     }
    // });








    // ----  image delete (from DB ) ----
    $(document).on('click', '.delete-db-image', function() {
        let imgId = $(this).data('id'); // The database id of the image
        let parent = $(this).parent(); // The container of the image preview

        Swal.fire({
            title: 'Are you sure?',
            text: "This image will be permanently deleted from the database!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/dashboard/exhibition/image/' + imgId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        if (res.success) {
                            parent.remove(); // remove image preview from DOM
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'The image has been deleted successfully.',
                                timer: 1500,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'The image could not be deleted.'
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went wrong with the AJAX request.'
                        });
                    }
                });
            }
        });
    });


    // // ----  remove image fromnew selected image preview  ----
    // $(document).on('click','.remove-new-image',function(){
    //     $(this).parent().remove();

    // });




    // newly selected image preview and remove 
    $(document).ready(function() {

        let selectedFiles = [];

        // When new images are selected in edit modal
        $('#edit_image').on('change', function(e) {
            for (let file of e.target.files) {
                selectedFiles.push(file);
            }
            renderNewImagePreview();
        });

        // Render new image previews
        function renderNewImagePreview() {
            let container = $('#new_image_preview');
            container.html('');

            selectedFiles.forEach((file, index) => {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let html = `
                    <div class="position-relative d-inline-block me-2 mb-2">
                        <span class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-new-image" 
                                data-index="${index}" style="padding:2px 6px;">&times;</span>
                        <img src="${e.target.result}" width="120" height="90" class="rounded border"/>
                    </div>
                    `;
                    container.append(html);
                };
                reader.readAsDataURL(file);
            });

            updateEditInputFiles();
        }

        // Remove new image from preview AND input
        $(document).on('click', '.remove-new-image', function() {
            let index = $(this).data('index');
            selectedFiles.splice(index, 1);
            renderNewImagePreview();
        });

        // Update file input with current selectedFiles
        function updateEditInputFiles() {
            const dt = new DataTransfer();
            selectedFiles.forEach(file => dt.items.add(file));
            document.getElementById('edit_image').files = dt.files;
        }

    });













    // Use event delegation to handle click events for all delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        const deleteLinks = document.querySelectorAll('[id^="delete-exhibition-link"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const exhibitionId = this.getAttribute('data-exhibition-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this action!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    customClass: {
                        confirmButton: 'btn btn-danger',
                        cancelButton: 'btn btn-secondary'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If confirmed, find the form and submit it
                        document.getElementById('delete-exhibition-form-' + exhibitionId).submit();
                    }
                });
            });
        });
    });
</script>
@endpush
