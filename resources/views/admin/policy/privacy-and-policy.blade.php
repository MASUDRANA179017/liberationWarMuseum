

@extends('layouts.admin')
@section('title','Privacy and Policy')
@push('styles')
<style>
    .note-editor.note-frame .note-editable {
        height: 60vh !important; /* or 100% if the parent allows it */
    }
    .note-editable {
        height: 100% !important;
    }

</style>
@endpush
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                 <div class="card card-round">
                    <div class="card-header project-details-card-header p-3">
                        <div class="d-flex align-items-center pb-2">
                            <h4 class="project-details-card-header-title mb-0"><i class='bx bx-shield'></i>Manage Privacy and Policy</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('policy.update') }}" method="GET">
                            @csrf
                            <input type="text" name="type" value="privacy_and_policy" hidden>
                            <div class="form-group">
                                <textarea name="description" id="description" style="height: 70vh;" class="form-control rte-modern">{{ old('description', $policy->description) }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">Update Privacy and Policy</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

    $('#description').summernote({
    placeholder: '',
    fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Times New Roman'],
    tabsize: 2,
    minHeight: null,  // no minimum
    height: null,     // let CSS control
    lineHeights: ['0.5', '1', '1.5', '2', '2.5', '3'],
});

    // $(document).ready(function() {
    //     var editor1 = new RichTextEditor("#description", { editorResizeMode: "height" });
    // });
</script>

@endpush

