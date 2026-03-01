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
                            <h4 class="project-details-card-header-title"><i class='bx bx-info-circle bx-tada'></i>
                                About Us</h4>
                        </div>
                    </div>
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
                                                    <th>Description</th>
                                                    <th>Video Link</th>
                                                    <th>Video Thumb</th>
                                                    <th>Image</th>
                                                    
                                                    <th>Points</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach($abouts as $about)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">0{{ $loop->iteration }}</td>
                                                    <td>{{ $about->title }} </td>
                                                    <td class="w-25">{!! $about->description !!}</td>
                                                    <td>
                                                        {{ $about->video_link }}
                                                    </td>
                                                    <td>
                                                        @if($about->video_thumb)
                                                        <img src="{{ asset('storage/' . $about->video_thumb) }}" width="96px"
                                                            height="72px" alt="video_thumb">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($about->image)
                                                        <img src="{{ asset('storage/' . $about->image) }}" width="96px"
                                                            height="72px" alt="image">
                                                        @endif
                                                    </td>
                                                    
                                                    <td>{{ $about->about_points }} </td>

                                                    
                                                    <td>
                                                        @if($about->status)
                                                        <a href="{{ route('about-us.toggle-status', $about->id) }}"
                                                            class="badge badge-success">Active</a>
                                                        @else
                                                        <a href="{{ route('about-us.toggle-status', $about->id) }}"
                                                            class="badge badge-danger">Inactive</a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="{{route('about-us.edit',$about->id)}}" title="edit"
                                                                class="btn btn-link btn-success btn-lg">
                                                                <i class='bx bxs-edit'></i>
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


@endsection
