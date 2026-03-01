






<div class="modal fade" id="editBlogModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Edit Blog</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form id="editBlogForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="blog_id" id="edit_blog_id">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" id="edit_title" name="title">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Category</label>
                <select id="edit_category" name="blog_category_id" class="form-control">
                  <option value="">Select Category</option>
                  @foreach($blogCategories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Author</label>
                <input type="text" class="form-control" id="edit_author" name="author">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" id="edit_date" name="date">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Blog URL</label>
                <input type="url" class="form-control" id="edit_url" name="blog_url">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Tags</label>
                <input type="text" class="form-control" id="edit_tags" name="tags">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control summernote" id="edit_description" name="description"></textarea>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" id="edit_image_input" name="image" accept="image/*">
                <img id="edit_image_preview" src="" width="96" height="72" class="mt-2 d-none" style="object-fit: cover;">

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
