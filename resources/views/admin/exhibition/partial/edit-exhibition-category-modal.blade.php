
<!-- Edit exhibition-category Modal -->
<div class="modal fade" id="editExhibitionCategoryModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h4><i class="bx bx-edit bx-tada"></i> Edit Category</h4>
          <button type="button" class="btn-close me-1" data-bs-dismiss="modal"></button>
      </div>
      <form id="editExhibitionCategoryForm"  method="POST" enctype="multipart/form-data">
          @csrf
          @method("PUT")
          <div class="modal-body">
              <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <label>Category Name<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="name" id="edit_name" required>
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
