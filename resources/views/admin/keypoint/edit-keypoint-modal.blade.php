<div id="edit-keypoint-modal" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog-centered modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="project-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>
                    Create Keypoint</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateKeypointForm"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="id" id="edit_id">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="title">Title<span class="text-danger">
                                            *</span></label>
                                    <input type="text" class="form-control custom-input" id="edit_title" name="title"
                                        placeholder="Keypoint Title" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                   <label for="description">Description<span class="text-danger"> *</span></label>
                                   <textarea type="text" class="form-control summernote" id="edit_description" name="description" cols="5" rows="5" placeholder="Write Here" required></textarea>
                                </div>
                             </div>
                            <div class="col-sm-12 image">
                                <div class="form-group">
                                    <label for="icon">Icon<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control mb-5" id="edit_icon" name="icon">
                                    @error('icon') <span class="text-danger">{{ $message }}</span> @enderror
                                    <br><img class="border" id="edit_logo_preview"
                                        src="{{ asset('admin/assets/gallery.jpg') }}" width="96px" height="72px"
                                        alt="icon">
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
document.getElementById('edit_icon').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('edit_logo_preview').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(file);
    }
});
</script>
