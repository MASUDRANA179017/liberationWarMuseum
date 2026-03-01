@extends('layouts.admin')
@section('title','Testimonial')
@section('content')
<div class="container">
    <div class="page-inner">
       <div class="row">
          <div class="col-md-12">
             <div class="card card-round">
                <div class="card-header project-details-card-header">
                   <div class="d-flex align-items-center">
                      <h4 class="project-details-card-header-title"><i class='bx bx-message-alt-edit bx-tada' ></i> Testimonial</h4>
                      <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#create-testimonial-modal"><i class='bx bx-message-square-add bx-tada' ></i> Add New Testimonial</a>
                   </div>
                </div>
                <!--create testimonial modal-->
                @include('admin.testimonial.create-testimonial-modal')
                <!--create testimonial modal-->
                <div class="card-body">
                   <div class="table-responsive">
                      <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                         <div class="row">
                            <div class="col-sm-12">
                               <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                  <thead class="">
                                     <tr role="row">
                                        <th>Sl</th>
                                        <th>Client Details</th>
                                        <th>Details Review</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($testimonials as $testimonial)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">0{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($testimonial->image)
                                                    <img src="{{ asset('storage/' . $testimonial->image) }}"
                                                         alt="Client Image"
                                                         class="rounded-circle me-3"
                                                         width="72" height="72">
                                                @endif
                                                <div>
                                                    <div class="fw-bold">{{ $testimonial->client_name }}</div>
                                                    <div class="text-muted">{{ $testimonial->designation }}</div>
                                                    <div class="text-secondary small">{{ $testimonial->organization }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="w-25">{!! $testimonial->review !!}</td>
                                        <td>
                                            @if($testimonial->status)
                                            <a href="{{ route('testimonial.toggle-status', $testimonial->id) }}"
                                                class="badge badge-success">Active</a>
                                            @else
                                            <a href="{{ route('testimonial.toggle-status', $testimonial->id) }}"
                                                class="badge badge-danger">Inactive</a>
                                            @endif
                                        <td>
                                            <div class="form-button-action">
<a href="#" class="edit-testimonial-btn btn btn-link btn-success btn-lg"
   data-id="{{ $testimonial->id }}"
   data-client_name="{{ $testimonial->client_name }}"
   data-designation="{{ $testimonial->designation }}"
   data-organization="{{ $testimonial->organization }}"
   data-review="{{ $testimonial->review }}"
   data-image="{{ $testimonial->image ? asset('storage/' . $testimonial->image) : '' }}">
    <i class='bx bxs-edit'></i>
</a>

                                                <a href="#" id="delete-testimonial-link"
                                                    data-testimonial-id="{{ $testimonial->id }}" title="delete"
                                                    class="btn btn-link btn-danger btn-lg"
                                                    data-original-title="Remove">
                                                    <i class='bx bx-trash-alt'></i> </a>
                                                <form id="delete-testimonial-form-{{ $testimonial->id }}"
                                                    action="{{ route('testimonial.destroy', $testimonial->id) }}"
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
 @include('admin.testimonial.edit-testimonial-modal')

@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('.edit-testimonial-btn').on('click', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var client_name = $(this).data('client_name');
            var designation = $(this).data('designation');
            var organization = $(this).data('organization');
            var review = $(this).data('review');
            var image = $(this).data('image');

            $('#edit_client_name').val(client_name);
            $('#edit_designation').val(designation);
            $('#edit_organization').val(organization);
            $('#edit_review').val(review);

            if(image) {
                $('#edit_image_preview').attr('src', image).removeClass('d-none');
            } else {
                $('#edit_image_preview').addClass('d-none').attr('src', '');
            }

            // Update form action
            $('#editTestimonialForm').attr('action', '/dashboard/testimonial/update/' + id);

            // Show modal
            $('#edit_testimonial_modal').modal('show');
        });

        // Image preview on select
        $('#edit_image').on('change', function(e) {
            var file = e.target.files[0];
            if(file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#edit_image_preview').attr('src', e.target.result).removeClass('d-none');
                }
                reader.readAsDataURL(file);
            }
        });
    });



    // Use event delegation to handle click events for all delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        const deleteLinks = document.querySelectorAll('[id^="delete-testimonial-link"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const testimonialId = this.getAttribute('data-testimonial-id');
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
                        document.getElementById('delete-testimonial-form-' + testimonialId).submit();
                    }
                });
            });
        });
    });
</script>
@endpush
