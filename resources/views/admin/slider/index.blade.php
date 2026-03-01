@extends('layouts.admin')
@section('title','Slider')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-carousel bx-tada'></i> Slider
                            </h4>
                            <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal"
                                data-bs-target="#create-slider-modal"><i class='bx bx-message-square-add bx-tada'></i>
                                Add New Slider</a>
                        </div>
                    </div>
                    <!--create slider modal-->
                    @include('admin.slider.partial.create-slider-modal')
                    <!--create slider modal-->
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
                                                    <th>Title</th>
                                                    <th>Sub Title</th>
                                                    <th>Button</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sliders as $slider)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">0{{ $loop->iteration }}</td>
                                                    <td>{{ $slider->title }}</td>
                                                    <td class="w-25">{{ $slider->sub_title }}</td>
                                                    <td>
                                                        @if ($slider->button_text)
                                                        <a href="{{ $slider->button_url }}" class="btn btn-success m-2"
                                                            target="_blank">{{ $slider->button_text }}</a>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if($slider->image)
                                                        <img src="{{ asset('storage/' . $slider->image) }}" width="96px"
                                                            height="72px" alt="image">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($slider->status)
                                                        <a href="{{ route('slider.toggle-status', $slider->id) }}"
                                                            class="badge badge-success">Active</a>
                                                        @else
                                                        <a href="{{ route('slider.toggle-status', $slider->id) }}"
                                                            class="badge badge-danger">Inactive</a>
                                                        @endif
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="#" 
                                                                class="btn btn-link btn-success btn-lg edit-slider-btn"
                                                                data-id="{{ $slider->id }}"
                                                                data-title="{{ $slider->title }}"
                                                                data-sub_title="{{ $slider->sub_title }}"
                                                                data-button_text="{{ $slider->button_text }}"
                                                                data-button_url="{{ $slider->button_url }}"
                                                                data-image="{{ asset('storage/'.$slider->image) }}">
                                                                <i class='bx bxs-edit'></i>
                                                            </a>

                                                            <a href="#" id="delete-slider-link"
                                                                data-slider-id="{{ $slider->id }}" title="delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-original-title="Remove">
                                                                <i class='bx bx-trash-alt'></i> </a>
                                                            <form id="delete-slider-form-{{ $slider->id }}"
                                                                action="{{ route('slider.destroy', $slider->id) }}"
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

@include('admin.slider.partial.edit-slider-modal')

@endsection



@push('script')
<script>
    $(document).on("click", ".edit-slider-btn", function(e) {
        e.preventDefault();

        let id = $(this).data("id");
        let title = $(this).data("title");
        let sub_title = $(this).data("sub_title");
        let button_text = $(this).data("button_text");
        let button_url = $(this).data("button_url");
        let image = $(this).data("image");

        // form action update
        $("#editSliderForm").attr("action", "/dashboard/slider/update/" + id);

        // input fields এ ডাটা বসানো
        $("#edit_title").val(title);
        $("#edit_sub_title").val(sub_title);
        $("#edit_button_text").val(button_text);
        $("#edit_button_url").val(button_url);

        // image preview
        if(image){
            $("#edit_image_preview").attr("src", image).removeClass("d-none");
        } else {
            $("#edit_image_preview").addClass("d-none");
        }

        // modal show করানো
        $("#editSliderModal").modal("show");
    });


    // Image preview on file select
    $("#edit_image").on("change", function () {
        let input = this;

        if (input.files && input.files[0]) {
            let reader = new FileReader();

            reader.onload = function (e) {
                $("#edit_image_preview")
                    .attr("src", e.target.result)
                    .removeClass("d-none"); // preview দেখাও
            };

            reader.readAsDataURL(input.files[0]); // ফাইলকে base64 তে রূপান্তর
        }
    });


    // Use event delegation to handle click events for all delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        const deleteLinks = document.querySelectorAll('[id^="delete-slider-link"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const sliderId = this.getAttribute('data-slider-id');
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
                        document.getElementById('delete-slider-form-' + sliderId).submit();
                    }
                });
            });
        });
    });
</script>
@endpush
