
<!-- Single Edit Modal -->
<div class="modal fade" id="editApplicationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="bx bx-edit bx-tada"></i> Edit Application</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal"></button>
            </div>
            <form id="editApplicationForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Application Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="edit_title" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Website URL</label>
                                <input type="text" class="form-control" name="url" id="edit_url">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Icon</label>
                                <input type="file" class="form-control mb-3" name="icon" id="edit_icon" accept="image/*">
                                <img id="edit_icon_preview" src="" width="96" height="72" class="mt-2"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
