<div id="create-exhibition-modal" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class=" modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="exhibition-details-card-header-title"><i class="bx bx-user-pin bx-tada bx-flip-horizontal"></i>
                    Create Exhibition</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('exhibition.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exhibition_title">Exhibition Title<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control custom-input" id="exhibition_title" name="exhibition_title"
                                        placeholder="Exhibition Title" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="director_name">Venue Name<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control custom-input" id="director_name" name="director_name"
                                        placeholder="Venue Name" required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="synopsis">Synopsis</label>
                                    <textarea class="form-control custom-input summernote" id="synopsis" name="synopsis" rows="4" placeholder="Synopsis"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 image ">
                                <div class="form-group">
                                    <label for="video">Video</label>
                                    <input type="file" class="form-control mb-2" id="video" name="video" accept="video/*">
                                </div>
                                <div class="form-group">
                                    <label for="image">Images<span class="text-danger">*</span></label>
                                    <!-- <input type="file" class="form-control mb-2" id="image" name="image" required> -->
                                    <input type="file" class="form-control mb-2" id="images" name="images[]" multiple>
                                    @error('images') <span class="text-danger">{{ $message }}</span> @enderror
                                    <br>
                                    <!-- <img class="border" id="image_preview"
                                        src="{{ asset('admin/assets/gallery.jpg') }}" width="96px" height="80px"
                                        alt="image"> -->
                                    <div id="image_preview_container" class="mt-2 d-flex flex-wrap gap-2">
                                    </div>
                                </div>
                            </div>
                            <div></div>
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@push('scripts')

<script>
    $(document).ready(function() {

        let selectedFiles = [];

        $('#images').on('change', function(e) {
            for (let file of e.target.files) {
                selectedFiles.push(file);
            }
            previewImages();
        });

        // Preview 
        function previewImages() {
            $('#image_preview_container').html('');
            selectedFiles.forEach(function(file, index) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let html = `
                  <div class="preview-box me-2 mb-2">
                      <span class="remove-image" data-index="${index}">&times;</span>
                      <img src="${e.target.result}" width="96" height="80">
                  </div>
                `;
                    $('#image_preview_container').append(html);
                };
                reader.readAsDataURL(file);
            });
            updateInputFiles();
        }

        // Cross - remove
        $(document).on('click', '.remove-image', function() {
            let index = $(this).data('index');
            selectedFiles.splice(index, 1);
            previewImages();
        });

        // updated FileList input 
        function updateInputFiles() {
            const dt = new DataTransfer();
            selectedFiles.forEach(file => dt.items.add(file));
            document.getElementById('images').files = dt.files;
        }

    });
</script>

@endpush



@push('styles')
<style>
    .preview-box {
        position: relative;
        display: inline-block;
    }

    .preview-box img {
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .remove-image {
        position: absolute;
        top: -6px;
        right: -6px;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        width: 20px;
        height: 20px;
        text-align: center;
        line-height: 20px;
        border-radius: 50%;
        cursor: pointer;
        font-weight: bold;
    }
</style>

@endpush