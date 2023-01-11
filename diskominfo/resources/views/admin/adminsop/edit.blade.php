@extends('admin.adminsop.layout')

@section('content')
    <h2>Form Edit Standar Operasional Prosedur (SOP)</h2>
    <div class="container" style="padding: 24px; background-color:white">
        <form method="post" action="{{ route('adminsop-admin.update', $adminSop->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col mb-0">
                        <label class="font-weight-bold">Standar Operasional Prosedur (SOP)</label>
                        <input type="text" name="title" value="{{ $adminSop->title }}" class="form-control" placeholder="Inputkan Standar Operasional Prosedur (SOP)"/>
                    </div>
                    <div class="col mb-0">
                        <label for="image" class="form-label">File Standar Operasional Prosedur (SOP)</label>
                        <input type='file' name="image" id="imgInp" class="form-control" />
                    </div>
                    <div class="col mb-0">
                        <div class="form-check mt-3">
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox" value="1" class="form-check-input" id="scales"
                                name="status"
                                {{ isset($adminSop->status) && $adminSop->status == true ? 'checked' : '' }}>
                            <label class="form-check-label" for="defaultCheck1"> Status </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/adminsop-admin" class="btn btn-outline-secondary">Close</a>
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
