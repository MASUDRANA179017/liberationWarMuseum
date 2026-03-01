
<!-- Edit Slider Modal -->
<div class="modal fade" id="editSliderModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4><i class="bx bx-edit bx-tada"></i> Edit Slider</h4>
          <button type="button" class="btn-close me-1" data-bs-dismiss="modal"></button>
      </div>
      <form id="editSliderForm"  method="POST" enctype="multipart/form-data">
          @csrf
          @method("PUT")
          <div class="modal-body">
              <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Title<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="title" id="edit_title" required>
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Sub Title</label>
                          <input type="text" class="form-control" name="sub_title" id="edit_sub_title" required>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Button Text</label>
                          <input type="text" class="form-control" name="button_text" id="edit_button_text">
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Button Url</label>
                          <input type="url" class="form-control" name="button_url" id="edit_button_url">
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Image</label>
                          <input type="file" class="form-control mb-3" name="image" id="edit_image">
                          <img id="edit_image_preview" src="" width="96" height="72" class="mt-2 d-none"/>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer border-0">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
    </div>
  </div>
</div>
