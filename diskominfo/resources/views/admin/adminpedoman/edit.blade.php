@extends('admin.adminpedoman.layout')

@section('content')
    <h2>Form Edit Organisasi dan Tata Kerja</h2>
    <div class="container" style="padding: 24px; background-color:white">
        <form method="post" action="{{ route('adminpedoman-admin.update', $adminPedoman->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col mb-0">
                        <label class="font-weight-bold">Organisasi dan Tata Kerja</label>
                        <input type="text" name="title" value="{{ $adminPedoman->title }}" class="form-control" placeholder="Inputkan Organisasi dan Tata Kerja"/>
                    </div>
                    <div class="col mb-0">
                        <label for="image" class="form-label">File Organisasi dan Tata Kerja</label>
                        <input type='file' name="image" id="imgInp" class="form-control" />
                    </div>
                    <div class="col mb-0">
                        <div class="form-check mt-3">
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox" value="1" class="form-check-input" id="scales"
                                name="status"
                                {{ isset($adminPedoman->status) && $adminPedoman->status == true ? 'checked' : '' }}>
                            <label class="form-check-label" for="defaultCheck1"> Status </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/adminpedoman-admin" class="btn btn-outline-secondary">Close</a>
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
