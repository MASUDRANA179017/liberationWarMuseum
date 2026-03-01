<div id="edit_faq_main_{{ $action->id }}" class="modal fade"  tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h4 class="project-details-card-header-title"><i class="bx bx-edit bx-tada"></i>Edit FAQ Main</h4>
             <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('faq_main.update', $action->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
          <div class="modal-body">
             <div class="card-body">
                   <div class="row">
                     <div class="col-sm-12">
                        <div class="form-group">
                           <label for="title">Title<span class="text-danger"> *</span></label>
                           <input type="text" class="form-control" name="title" value="{{ old('title', $action->title) }}" placeholder="Enter title" required/>
                        </div>
                     </div>
                     <div class="col-sm-12">
                        <div class="form-group">
                            <label for="description">Description<span class="text-danger"> *</span></label>
                            <textarea class="form-control summernote" name="description" rows="4" placeholder="Enter sub-title">{{ old('description', $action->description) }}</textarea>
                        </div>
                    </div>

                     {{--
                     <div class="col-sm-12">
                        <div class="form-group">
                           <label for="description">Description<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="description" value="{{ old('description', $action->description) }}" placeholder="Enter sub-title"/>
                        </div>
                     </div>
                        --}}
                     <div class="col-sm-6">
                        <div class="form-group">
                            <label for="button_text">Button Text</label>
                            <input type="text" class="form-control" name="button_text"
                                value="{{ old('button_text', $action->button_text) }}"
                                placeholder="Enter button text" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="button_url">Button Url</label>
                            <input type="url" class="form-control" name="button_url"
                                value="{{ old('button_url', $action->button_url) }}"
                                placeholder="Enter button url" />
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
       <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
 </div>
