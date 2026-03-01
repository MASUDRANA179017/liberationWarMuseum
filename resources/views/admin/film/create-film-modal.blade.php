<div id="create-film-modal" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class=" modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>
                    Create Film</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="film_name">Film Name <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control custom-input" id="film_name" name="film_name"
                                        placeholder="Film Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="director_name">Venue Name</label>
                                    <input type="text" class="form-control custom-input" id="director_name" name="director_name"
                                        placeholder="Venue Name">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="synopsis">Synopsis <span class="text-danger">
                                            *</span></label>
                                    <textarea type="text" class="form-control summernote" id="synopsis"
                                        name="synopsis" cols="5" rows="5" placeholder="Write Here"></textarea>
                                    @error('synopsis') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 file">
                                <div class="form-group">
                                    <label for="images">Images <span class="text-danger">*</span></label>
                                    <input type="file"
                                        class="form-control mb-2"
                                        id="images"
                                        name="images[]"
                                        multiple
                                        accept="image/*">
                                    @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    <div id="image-preview" class="d-flex flex-wrap gap-2 mt-2"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 file">
                                <div class="form-group">
                                    <label for="video">Video Upload</label>
                                    <input type="file" class="form-control mb-2" id="video" name="video" accept="video/*">
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
                            <i class='bx bx-upload bx-flashing'></i> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
