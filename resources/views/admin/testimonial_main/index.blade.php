@extends('layouts.admin')
@section('title','Testimonial main section')
@section('content')
<div class="container">
    <div class="page-inner">
       <div class="row">
          <div class="col-md-12">
             <div class="card card-round">
                <div class="card-header project-details-card-header">
                   <div class="d-flex align-items-center">
                      <h4 class="project-details-card-header-title"><i class='bx bxl-telegram bx-tada' ></i>Testimonial Main</h4>
                         @if(!$action)
                         <a href="#" class="purchase-button ms-auto" data-bs-toggle="modal" data-bs-target="#create-testimonial-main-modal"><i class='bx bx-message-square-add bx-tada' ></i> Add Main Testimonial</a>
                         @endif
                   </div>
                </div>

                <div class="card-body">
                   <div class="table-responsive">
                      <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                         <div class="row">
                            <div class="col-sm-12">
                               <table id="add-row" class="display table table-striped table-hover basic-datatables" role="grid" aria-describedby="add-row_info">
                                  <thead class="">
                                     <tr role="row">
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>Sub Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                    @if($action)
                                     <tr role="row" class="odd">
                                        <td class="sorting_1">01</td>
                                        <td>{{ $action->title }}</td>
                                        <td>{{ $action->sub_title }}</td>
                                        <td>{{ $action->description }}</td>

                                        <td>
                                            @if($action->status)
                                            <a href="{{ route('testimonial_main.toggle-status', $action->id) }}"
                                                class="badge badge-success">Active</a>
                                            @else
                                            <a href="{{ route('testimonial_main.toggle-status', $action->id) }}"
                                                class="badge badge-danger">Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                           <div class="form-button-action">
                                            <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit_testimonial_main_{{ $action->id }}"
                                            title="edit" class="btn btn-link btn-success btn-lg">
                                            <i class='bx bxs-edit'></i>

                                           </div>
                                        </td>
                                        <!--edit action modal-->
                                        @include('admin.testimonial_main.edit-modal')
                                        <!--edit action modal-->
                                     </tr>
                                     @endif
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

@if(!$action)
<div id="create-testimonial-main-modal" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>Create Testimonial Main</h4>
             <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('testimonial_main.store') }}" method="POST">
            @csrf
          <div class="modal-body">
             <div class="card-body">
                   <div class="row">
                     <div class="col-sm-12">
                        <div class="form-group">
                           <label for="title">Title</label>
                           <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter title"/>
                        </div>
                     </div>
                     <div class="col-sm-12">
                        <div class="form-group">
                            <label for="sub_title">Sub Title</label>
                            <input type="text" class="form-control" name="sub_title" value="{{ old('sub_title') }}" placeholder="Enter sub title text" />
                        </div>
                    </div>
                     <div class="col-sm-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control summernote" name="description" rows="4" placeholder="Enter description">{{ old('description') }}</textarea>
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
                    <i class='bx bx-upload bx-flashing'></i> Save
                </button>
             </div>
          </div>
        </form>
       </div>
    </div>
 </div>
@endif
@endsection
