@extends('layouts.admin')
@section('title','Film')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-message-alt-edit bx-tada'></i> Film</h4>
                            <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#create-film-modal"><i class='bx bx-message-square-add bx-tada'></i> Add New Film</a>
                        </div>
                    </div>
                    <!--create film modal-->
                    @include('admin.film.create-film-modal')
                    <!--create film modal-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                            <thead class="">
                                                <tr role="row">
                                                    <th>Sl</th>
                                                    <th>Film</th>
                                                    <!-- <th>Details</th>
                                        <th>Key Features</th> -->
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($films as $film)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">0{{ $loop->iteration }}</td>
                                                    <td>{{$film->film_name}}</td>
                                                    <td>
                                                        @if($film->status == 1)
                                                        <a href="{{ route('film.toggle-status', $film->id) }}"
                                                            class="badge badge-success">Active</a>
                                                        @elseif($film->status == 0)
                                                        <a href="{{ route('film.toggle-status', $film->id) }}"
                                                            class="badge badge-danger">Inactive</a>
                                                        @endif
                                                    </td> <!-- make sure the td closes here -->

                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="#"
                                                                class="btn btn-link btn-success btn-lg edit-film-btn"
                                                                data-id="{{ $film->id }}"
                                                                data-film_name="{{ $film->film_name }}"
                                                                data-director_name="{{ $film->director_name }}"
                                                                data-video="{{ $film->video }}"

                                                                data-synopsis="{{ $film->synopsis }}"
                                                                data-images='@json($film->images)'>
                                                                <i class="bx bxs-edit"></i>
                                                            </a>

                                                            <a href="#" id="delete-film-link"
                                                                data-film-id="{{ $film->id }}" title="delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-original-title="Remove">
                                                                <i class='bx bx-trash-alt'></i>
                                                            </a>
                                                            <form id="delete-film-form-{{ $film->id }}"
                                                                action="{{ route('film.destroy', $film->id) }}"
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

@include('admin.film.edit-film-modal')
@endsection






@push('script')

<script>
    // Delete image via AJAX
    $(document).on('click', '.remove-existing-image', function() {
        let imageId = $(this).data('id');
        let $parentDiv = $(this).closest('div.position-relative');

        if (confirm('Are you sure to delete this image?')) {
            $.ajax({
                url: '/dashboard/film/image/' + imageId,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status === 'success') {
                        $parentDiv.remove();
                        alert(response.message);
                    } else {
                        alert('Something went wrong');
                    }
                }
            });
        }
    });
</script>


<script>
    $(document).on("click", ".edit-film-btn", function(e) {
        e.preventDefault();

        let id = $(this).data("id");
        let film_name = $(this).data("film_name");
        let director_name = $(this).data("director_name");
        let video = $(this).data("video");

        let synopsis = $(this).data("synopsis");
        let images = $(this).data("images"); // assume array of image URLs

        // form action
        $("#editFilmForm").attr("action", "/dashboard/film/update/" + id);
        $("#edit_film_id").val(id);

        // input fields
        $("#edit_film_name").val(film_name);
        $("#edit_director_name").val(director_name);


        // existing images
        $("#edit_image_preview").html('');
        if (images && images.length > 0) {
            images.forEach(function(img) {
                let imageHtml = `
            <div class="position-relative">
                <img src="/storage/${img.image}" style="width:100px;height:100px;object-fit:cover;border:1px solid #ddd;padding:2px;margin:2px;">
                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 remove-existing-image" data-id="${img.id}" style="border-radius:50%;">&times;</button>
            </div>`;
                $("#edit_image_preview").append(imageHtml);
            });
        }

        // modal show
        $("#edit-film-modal").modal("show");

        // Summernote initialize & set synopsis
        $('#edit_synopsis').summernote({
            height: 200
        });
        $('#edit_synopsis').summernote('code', synopsis);
    });

    // preview new images before upload
    $('#edit_images').on('change', function() {
        $('#edit_new_image_preview').html('');
        let files = this.files;

        if (files) {
            $.each(files, function(index, file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let img = `<div class="preview-img" style="position:relative;">
                                <img src="${e.target.result}" style="width:100px;height:100px;object-fit:cover;border:1px solid #ddd;padding:2px;">
                           </div>`;
                    $('#edit_new_image_preview').append(img);
                }
                reader.readAsDataURL(file);
            });
        }
    });
</script>


<script>
    // Use event delegation to handle click events for all delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        const deleteLinks = document.querySelectorAll('[id^="delete-film-link"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const filmId = this.getAttribute('data-film-id');
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
                        document.getElementById('delete-film-form-' + filmId).submit();
                    }
                });
            });
        });
    });
</script>

@endpush
