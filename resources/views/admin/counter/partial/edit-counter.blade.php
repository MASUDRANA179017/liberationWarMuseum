<!-- Single Edit Counter Modal -->
<div id="editCounterModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header project-details-card-header">
                <h4 class="project-details-card-header-title"><i class="bx bx-edit bx-tada"></i> Edit Counter</h4>
                <button type="button" class="btn-close me-1" data-bs-dismiss="modal"></button>
            </div>
            <form id="editCounterForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Counter Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="counter_title" id="edit_counter_title" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Data Count<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="data_count" id="edit_data_count" min="0" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Counter Symbol</label>
                                    <input type="text" class="form-control" name="counter_symbol" id="edit_counter_symbol">
                                </div>
                            </div>
                            <div class="col-sm-12 image">
                                <div class="form-group">
                                    <label>Icon</label>
                                    <input type="file" class="form-control mb-3" name="counter_icon" id="edit_counter_icon" accept="image/*">
                                    <img id="edit_counter_icon_preview" src="" width="96" height="72" class="mt-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <div class="modal-button-box">
                        <button type="button" class="cancel-button-1 border-0" data-bs-dismiss="modal"><i class='bx bx-x bx-flashing '></i> Cancel</button>
                        <button type="submit" class="submit-button-1 border-0"><i class='bx bx-upload bx-flashing '></i> Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
