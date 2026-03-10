<!-- Edit exhibition Modal -->
<div class="modal fade" id="editExhibitionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="bx bx-edit bx-tada"></i> Edit Product</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal"></button>
            </div>
            <form id="editExhibitionForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Product Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="exhibition_title" id="edit_exhibition_title" required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="director_name">Venue Name<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control custom-input" id="edit_director_name" name="director_name"
                                    placeholder="Venue Name" required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="synopsis">Synopsis</label>
                                <textarea class="form-control custom-input summernote" id="edit_synopsis" name="synopsis" rows="4" placeholder="Synopsis"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="video">Video</label>
                                <input type="file" class="form-control mb-2" id="edit_video" name="video" accept="video/*">
                                <!-- Optional: Display current video link or preview -->
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <!-- <div class="form-group">
                          <label>Image</label>
                          <input type="file" class="form-control mb-3" name="image" id="edit_image">
                          <img id="edit_image_preview" src="" width="96" height="72" class="mt-2 d-none"/>
                           <div id="edit_image_preview_container" class="mt-2 d-flex flex-wrap gap-2"></div>
                      </div> -->
                            <label>Images</label>

                            <input type="file" class="form-control mb-3"
                                name="new_images[]" id="edit_image"
                                multiple>
                            <div id="edit_image_preview_container"
                                class="mt-2 d-flex flex-wrap gap-2">

                            </div>
                            <div id="new_image_preview"
                                class="mt-2 d-flex flex-wrap gap-2"></div>
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
