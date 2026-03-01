@extends('layouts.admin')
@section('title','About Us')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="project-details-card-header-title"><i class='bx bx-edit bx-tada'></i>Edit About
                                Us</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('about-us.update', $about->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="title">Title<span class="text-danger">
                                                                *</span></label>
                                                        <input type="text" class="form-control custom-input"
                                                            name="title" value="{{ old('title', $about->title) }}"
                                                            placeholder="Enter title" required />
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="description">Description<span
                                                                class=" text-danger">*</span></label>
                                                        <textarea type="text"
                                                            class="form-control custom-input summernote"
                                                            id="description" name="description"
                                                            value="{{ old('description', $about->description) }}"
                                                            placeholder="Write Here"
                                                            required>{{$about->description}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="video_link">video_link</label>
                                                        <input type="text" class="form-control custom-input"
                                                            name="video_link" value="{{ old('video_link', $about->video_link) }}"
                                                            placeholder="Enter video link" />
                                                    </div>
                                                </div>

                                               
                                                 <div class="col-sm-6 image ">
                                                    <div class="form-group">
                                                        <label for="video_thumb">video thumb<span
                                                                class="text-danger">*</span></label>
                                                        <input type="file"
                                                            class="form-control custom-input mb-3 edit_image"
                                                            name="video_thumb" accept="image/*">
                                                        @if($about->video_thumb)
                                                        <img class="edit_image_preview mt-2" id="edit_video_thumb_preview"
                                                            src="{{ asset('storage/' . $about->video_thumb) }}"
                                                            alt="Old Image" width="96" height="72">
                                                        @else
                                                        <img class="edit_image_preview mt-2"
                                                            src="{{ asset('admin/assets/gallery.jpg') }}"
                                                            alt="Preview Image" width="96" height="72">

                                                        @endif
                                                    </div>
                                                </div>

                                                
                                                
                                                <div class="col-sm-6 image ">
                                                    <div class="form-group">
                                                        <label for="image">Image<span
                                                                class="text-danger">*</span></label>
                                                        <input type="file"
                                                            class="form-control custom-input mb-3 edit_image"
                                                            name="image" accept="image/*">
                                                        @if($about->image)
                                                        <img class="edit_image_preview mt-2" id="edit_image_preview"
                                                            src="{{ asset('storage/' . $about->image) }}"
                                                            alt="Old Image" width="96" height="72">
                                                        @else
                                                        <img class="edit_image_preview mt-2"
                                                            src="{{ asset('admin/assets/gallery.jpg') }}"
                                                            alt="Preview Image" width="96" height="72">

                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            @php
                                                $lists = json_decode($about->about_points, true);
                                            @endphp

                                            <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="description">Description Points<span
                                                                class=" text-danger">*</span></label>

                                                        <div id="item-wrapper">
                                                            @if($lists)
                                                                @foreach($lists as $index => $list)
                                                                <div class="form-group item-input d-flex gap-2 mb-2" data-index="{{ $index }}">
                                                                    <input type="text" name="about_points[]" value="{{ $list }}" class="form-control custom-input" required>
                                                                    <button type="button" class="btn btn-danger btn-sm remove-btn-db" data-index="{{ $index }}">Remove</button>
                                                                </div>
                                                                @endforeach

                                                            @endif
                                                        </div>

                                                        <button type="button" class="btn btn-secondary mt-2" id="add-item">Add a new item</button>

                                                    </div>
                                            </div>
                                        
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-0">
                                <div class="modal-button-box">
                                    <button type="button" class="cancel-button-1" data-bs-dismiss="modal">
                                        <i class='bx bx-x bx-flashing'></i> Cancel
                                    </button>
                                    <button type="submit" class="submit-button-1">
                                        <i class='bx bx-upload bx-flashing'></i> Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
    $(document).on('click', '#add-item', function () {
        let newItem = `
            <div class="item-input d-flex gap-2 mb-2">
                <input type="text" name="about_points[]"  class="form-control custom-input" placeholder="Enter item" required>
                <button type="button" class="btn btn-danger btn-sm remove-btn">Remove</button>
            </div>
        `;
        $('#item-wrapper').append(newItem);
    });

    $(document).on('click', '.remove-btn', function () {
        $(this).closest('.item-input').remove();
    });


    // remove from database
    $(document).on('click', '.remove-btn-db', function () {
        const index = $(this).data('index');
        const wrapper = $(this).closest('.item-input');

        Swal.fire({
            title: 'Are you sure?',
            text: "This will remove the item from the database.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('about-us.remove-point', $about->id) }}",
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        index: index
                    },
                    success: function (response) {
                        if (response.success) {
                            wrapper.remove();
                            Swal.fire('Deleted!', 'Item has been removed.', 'success');
                        } else {
                            Swal.fire('Error', 'Failed to delete item.', 'error');
                        }
                    },
                    error: function () {
                        Swal.fire('Error', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });


    
    // Preview new image upload
    function previewNewImage(input, id) {
        const preview = document.getElementById(`new_image_preview_${id}`);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


  
</script>

@endpush
