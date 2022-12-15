@extends('admin.adminsemerta.layout')

@section('content')
    <h2>Form Edit Daftar Informasi Serta Merta</h2>
    <div class="container" style="padding: 24px; background-color:white">
        <form method="post" action="{{ route('adminsemerta-admin.update', $adminSemerta->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col mb-0">
                        <label class="font-weight-bold">Judul Informasi</label>
                        <input type="text" name="title" value="{{ $adminSemerta->title }}" class="form-control" placeholder="Inputkan Judul Informasi Serta Merta"/>
                    </div>
                    <div class="col mb-0">
                        <label for="image" class="form-label">Jenis Media Yang Memuat Informasi</label>
                        <input type="text" name="url" value="{{ $adminSemerta->url }}" class="form-control" placeholder="Inputkan Link Informasi Serta Merta"/>
                    </div>
                    <div class="col mb-0">
                        <div class="form-check mt-3">
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox" value="1" class="form-check-input" id="scales"
                                name="status"
                                {{ isset($adminSemerta->status) && $adminSemerta->status == true ? 'checked' : '' }}>
                            <label class="form-check-label" for="defaultCheck1"> Status </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/adminsemerta-admin" class="btn btn-outline-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
