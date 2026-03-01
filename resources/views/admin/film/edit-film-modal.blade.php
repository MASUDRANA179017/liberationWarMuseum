<div id="edit-film-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title">
                    <i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i> Edit Film
                </h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editFilmForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="film_id" id="edit_film_id">

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="edit_film_name">Film Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control custom-input" id="edit_film_name" name="film_name" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="edit_director_name">Director Name</label>
                                    <input type="text" class="form-control custom-input" id="edit_director_name" name="director_name">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="edit_synopsis">Synopsis<span class="text-danger">*</span></label>
                                    <textarea class="form-control summernote" id="edit_synopsis" name="synopsis" cols="5" rows="5"></textarea>
                                </div>
                            </div>

                            <!-- Video Upload -->
                            <div class="col-sm-12 file mt-2">
                                <div class="form-group">
                                    <label for="edit_video">Video</label>
                                    <input type="file" class="form-control mb-2" id="edit_video" name="video" accept="video/*">
                                    <div id="edit_video_preview" class="mt-2"></div>
                                </div>
                            </div>

                            <!-- Existing Images Preview -->
                            <div class="col-sm-12 file">
                                <div class="form-group">
                                    <label>Existing Images</label>
                                    <div id="edit_image_preview" class="d-flex flex-wrap gap-2"></div>
                                </div>
                            </div>

                            <!-- Add New Images -->
                            <div class="col-sm-12 file mt-2">
                                <div class="form-group">
                                    <label for="edit_images">Add New Images</label>
                                    <input type="file" class="form-control mb-2" id="edit_images" name="images[]" multiple accept="image/*">
                                    <div id="edit_new_image_preview" class="d-flex flex-wrap gap-2 mt-2"></div>
                                </div>
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
    </div>
</div>
