<!-- Single Edit Modal for WhyWork -->
<div id="editWhyWorkModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header project-details-card-header">
                <h4 class="project-details-card-header-title"><i class="bx bx-edit bx-tada"></i> Edit Why Work</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal"></button>
            </div>
            <form id="editWhyWorkForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="edit_whyWork_title" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Details<span class="text-danger">*</span></label>
                                    <textarea class="form-control summernote" name="details" id="edit_whyWork_details" cols="5" rows="5" placeholder="Write Here" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Icon<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="icon" id="edit_whyWork_icon" required>
                                    <small class="text-muted">Use Boxicons Class (Ex: bx bx-home)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <div class="modal-button-box">
                        <button type="button" class="cancel-button-1 border-0" data-bs-dismiss="modal">
                            <i class='bx bx-x bx-flashing'></i> Cancel
                        </button>
                        <button type="submit" class="submit-button-1 border-0">
                            <i class='bx bx-upload bx-flashing'></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
