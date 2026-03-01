@extends('layouts.admin')
@section('title','FAQ main section')
@section('content')
<div class="container">
    <div class="page-inner">
       <div class="row">
          <div class="col-md-12">
             <div class="card card-round">
                <div class="card-header project-details-card-header">
                   <div class="d-flex align-items-center">
                      <h4 class="project-details-card-header-title"><i class='bx bxl-telegram bx-tada' ></i>FAQ Main</h4>
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
                                        <th>Button Text</th>
                                        <th>Button URL</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                    @if($action)
                                     <tr role="row" class="odd">
                                        <td class="sorting_1">01</td>
                                        <td>{{ $action->title }}</td>
                                        <td>{{ $action->description }}</td>
                                        <td>
                                            <a href="{{$action->button_url}}">{{$action->button_text}}</a>
                                        </td>
                                        <td>
                                          {{$action->button_url}}
                                          
                                        </td>
                                        <td>
                                            @if($action->status)
                                            <a href="{{ route('faq_main.toggle-status', $action->id) }}"
                                                class="badge badge-success">Active</a>
                                            @else
                                            <a href="{{ route('faq_main.toggle-status', $action->id) }}"
                                                class="badge badge-danger">Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                           <div class="form-button-action">
                                            <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit_faq_main_{{ $action->id }}"
                                            title="edit" class="btn btn-link btn-success btn-lg">
                                            <i class='bx bxs-edit'></i>

                                           </div>
                                        </td>
                                        <!--edit action modal-->
                                        @include('admin.faq_main.edit-modal')
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
@endsection
