@extends('layouts.admin')
@section('title','Counter')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header project-details-card-header">
                        <div class="d-flex align-items-center">
                            <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal"
                                data-bs-target="#create-counter"><i class='bx bx-money bx-tada'></i> Add
                                New Counter</a>
                        </div>
                    </div>
                    <!--create counter modal-->
                    @include('admin.counter.partial.create-counter')
                    <!--create counter modal-->

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
                                                    <th>SL</th>
                                                    <th>Counter</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($counters as $counter)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">0{{ $loop->iteration }}</td>
                                                    <td>
                                                        <div style="font-size: 20px; font-weight: bold; ">
                                                            {{$counter->data_count}}{{$counter->counter_symbol}}
                                                        </div>
                                                        <div style="font-size: 16px; color: margin-top: 8px;">
                                                            {{$counter->counter_title}}
                                                        </div>

                                                        @if($counter->counter_icon)
                                                        <div style="margin-top: 15px;">
                                                            <img src="{{ asset('storage/' . $counter->counter_icon) }}"
                                                                width="60" height="60" alt="icon"
                                                                style="border-radius: 8px;">
                                                        </div>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if($counter->status)
                                                        <a href="{{ route('counter.toggle-status', $counter->id) }}"
                                                            class="badge badge-success">Active</a>
                                                        @else
                                                        <a href="{{ route('counter.toggle-status', $counter->id) }}"
                                                            class="badge badge-danger">Inactive</a>
                                                        @endif
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="javascript:void(0)" 
                                                                class="btn btn-link btn-success btn-lg edit-counter-btn"
                                                                data-id="{{ $counter->id }}"
                                                                data-title="{{ $counter->counter_title }}"
                                                                data-data-count="{{ $counter->data_count }}"
                                                                data-counter-symbol="{{ $counter->counter_symbol }}"
                                                                data-icon="{{ $counter->counter_icon ? asset('storage/' . $counter->counter_icon) : '' }}">
                                                                <i class='bx bxs-edit'></i>
                                                            </a>

                                                            <a href="#" id="delete-counter-link"
                                                                data-counter-id="{{ $counter->id }}" title="delete"
                                                                class="btn btn-link btn-danger btn-lg"
                                                                data-original-title="Remove">
                                                                <i class='bx bx-trash-alt'></i> </a>
                                                            <form id="delete-counter-form-{{ $counter->id }}"
                                                                action="{{ route('counter.destroy', $counter->id) }}"
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
@include('admin.counter.partial.edit-counter')

@endsection
@push('script')
<script>
    $(document).ready(function() {
        // Edit button click
        $('.edit-counter-btn').on('click', function() {
            var counterId = $(this).data('id');
            var title = $(this).data('title');
            var dataCount = $(this).data('data-count');
            var counterSymbol = $(this).data('counter-symbol');
            var icon = $(this).data('icon'); // URL of old icon

            // Populate modal fields
            $('#edit_counter_title').val(title);
            $('#edit_data_count').val(dataCount);
            $('#edit_counter_symbol').val(counterSymbol);
            if(icon) {
                $('#edit_counter_icon_preview').attr('src', icon).removeClass('d-none');
            } else {
                $('#edit_counter_icon_preview').attr('src', '').addClass('d-none');
            }

            // Update form action
            $('#editCounterForm').attr('action', '/dashboard/counter/update/' + counterId);

            // Show modal
            $('#editCounterModal').modal('show');
        });

        // Image preview on change
        $('#edit_counter_icon').on('change', function() {
            const [file] = this.files;
            if(file) {
                $('#edit_counter_icon_preview').attr('src', URL.createObjectURL(file)).removeClass('d-none');
            }
        });
    });



    // Use event delegation to handle click events for all delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        const deleteLinks = document.querySelectorAll('[id^="delete-counter-link"]');

        deleteLinks.forEach(function(deleteLink) {
            deleteLink.addEventListener('click', function(e) {
                e.preventDefault();
                const counterId = this.getAttribute('data-counter-id');
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
                        document.getElementById('delete-counter-form-' + counterId).submit();
                    }
                });
            });
        });
    });
</script>
@endpush
