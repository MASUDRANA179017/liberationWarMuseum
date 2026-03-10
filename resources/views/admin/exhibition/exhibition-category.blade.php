@extends('layouts.admin')
@section('title','Product-Category')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header exhibition-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="exhibition-details-card-header-title"><i class='bx bx-carousel bx-tada'></i> Product Category
                            </h4>
                            <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal"
                                data-bs-target="#create-exhibition-category-modal"><i class='bx bx-message-square-add bx-tada'></i>
                                Add New Category</a>
                        </div>
                    </div>
                    <!--create exhibition-category modal-->
                    @include('admin.exhibition.partial.create-exhibition-category-modal')
                    <!--create exhibition-category modal-->
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
                                                    <th>Sl</th>
                                                    <th>Category Name</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categories as $category)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">0{{ $loop->iteration }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td class="w-25">{{ $category->description }}</td>

                                                    <td>
                                                        @if($category->status)
                                                        <a href="{{ route('exhibition-category.toggle-status', $category->id) }}"
                                                            class="badge badge-success">Active</a>
                                                        @else
                                                        <a href="{{ route('exhibition-category.toggle-status', $category->id) }}"
                                                            class="badge badge-danger">Inactive</a>
                                                        @endif
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="#"
                                                                class="btn btn-link btn-success btn-lg edit-exhibition-category-btn"
                                                                data-id="{{ $category->id }}"
                                                                data-name="{{ $category->name }}"
                                                                data-description="{{ $category->description }}">
                                                                <i class='bx bxs-edit'></i>
                                                            </a>

                                                            <a href="#" id="delete-exhibition-category-link"
                                                                data-exhibition-category-id="{{ $category->id }}" title="delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-original-title="Remove">
                                                                <i class='bx bx-trash-alt'></i> </a>
                                                            <form id="delete-exhibition-category-form-{{ $category->id }}"
                                                                action="{{ route('exhibition-category.destroy', $category->id) }}"
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

@include('admin.exhibition.partial.edit-exhibition-category-modal')

@endsection


@push('script')
<script>
    $(document).on("click", ".edit-exhibition-category-btn", function(e) {
        e.preventDefault();

        let id = $(this).data("id");
        let name = $(this).data("name");

        // form action update
        $("#editExhibitionCategoryForm").attr("action", "/dashboard/exhibition-category/update/" + id);

        // input fields এ ডাটা বসানো
        $("#edit_name").val(name);

        // modal show করানো
        $("#editExhibitionCategoryModal").modal("show");
    });




    // Use event delegation to handle click events for all delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        const deleteLinks = document.querySelectorAll('[id^="delete-exhibition-category-link"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const categoryId = this.getAttribute('data-exhibition-category-id');
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
                        document.getElementById('delete-exhibition-category-form-' + categoryId).submit();
                    }
                });
            });
        });
    });
</script>
@endpush
