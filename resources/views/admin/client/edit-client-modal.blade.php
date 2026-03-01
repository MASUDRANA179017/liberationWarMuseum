<div id="edit_client_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i class="bx bx-edit bx-tada"></i> Edit Client</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal"></button>
            </div>
            <form id="editClientForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Client/Organization Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="edit_client_name" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Website URL</label>
                                    <input type="text" class="form-control" name="url" id="edit_client_url">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" class="form-control mb-3" name="logo" id="edit_client_logo" accept="image/*">
                                    <img id="edit_logo_preview" src="" width="96" height="72" class="mt-2 d-none">
                                </div>
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
