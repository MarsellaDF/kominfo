@extends('admin.adminkeberatan.layout')

@section('content')
<h2>Form Edit Alur Permohonan Keberatan</h2>
<div class="container" style="padding: 24px; background-color:white">
    <form method="post" action="{{ route('adminkeberatan-admin.update', $admin_keberatans->id) }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="row g-2">
                <div class="col mb-0">
                    <label for="image" class="form-label">Image</label>
                    <input type='file' name="image" id="imgInp" class="form-control" />
                </div>
                <div class="col mb-0">
                    <div class="form-check mt-3">
                        <input type="hidden" name="status" value="0">
                        <input type="checkbox" value="1" class="form-check-input" id="scales" name="status"
                            {{ isset($admin_keberatans->status) && $admin_keberatans->status == true ? 'checked' : '' }}>
                        <label class="form-check-label" for="defaultCheck1"> Status </label>
                    </div>
                </div>
            </div>
            <div class="row g-2" style="margin-top: 16px">
                <div class="col mb-0">
                    @if (isset($admin_keberatans->filename_admin_keberatans))
                    <img width="200px" id="blah"
                        src="{{ '/upload/adminkeberatan/' . $admin_keberatans->filename_admin_keberatans }}"
                        alt="your image" />
                    @else
                    <span style="color: red">Tidak ada gambar</span>
                    @endif

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="/adminkeberatan-admin" class="btn btn-outline-secondary">Close</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
<script>
imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
        blah.src = URL.createObjectURL(file)
    }
}
</script>
@endsection