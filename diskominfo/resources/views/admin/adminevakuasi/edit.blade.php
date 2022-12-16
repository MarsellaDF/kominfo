@extends('admin.adminevakuasi.layout')

@section('content')
    <h2>Form Edit Prosedur Evakuasi Darurat</h2>
    <div class="container" style="padding: 24px; background-color:white">
        <form method="post" action="{{ route('adminevakuasi-admin.update', $adminEvakuasi->id) }}" enctype="multipart/form-data">
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
                            <input type="checkbox" value="1" class="form-check-input" id="scales"
                                name="status"
                                {{ isset($adminEvakuasi->status) && $adminEvakuasi->status == true ? 'checked' : '' }}>
                            <label class="form-check-label" for="defaultCheck1"> Status </label>
                        </div>
                    </div>
                </div>
                <div class="row g-2" style="margin-top: 16px">
                    <div class="col mb-0">
                        @if (isset($adminEvakuasi->filename_admin_evakuasis))
                            <img width="200px" id="blah" src="{{ '/upload/adminevakuasi/' . $adminEvakuasi->filename_admin_evakuasis }}"
                                alt="your image" />
                        @else
                            <span style="color: red">Tidak ada gambar</span>
                        @endif

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/adminevakuasi-admin" class="btn btn-outline-secondary">Close</a>
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
