<div id="edit_testimonial_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i class="bx bx-edit bx-tada"></i> Edit Testimonial</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal"></button>
            </div>
            <form id="editTestimonialForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Client Name<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control custom-input" name="client_name" id="edit_client_name" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Client Designation</label>
                                    <input type="text" class="form-control custom-input" name="designation" id="edit_designation">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Organization</label>
                                    <input type="text" class="form-control custom-input" name="organization" id="edit_organization">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Review<span class="text-danger"> *</span></label>
                                    <textarea class="form-control summernote" name="review" id="edit_review" cols="5" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Image<span class="text-danger"> *</span></label>
                                    <input type="file" class="form-control mb-3" name="image" id="edit_image" accept="image/*">
                                    <img id="edit_image_preview" src="" width="96" height="72" class="mt-2 d-none"/>
                                </div>
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
