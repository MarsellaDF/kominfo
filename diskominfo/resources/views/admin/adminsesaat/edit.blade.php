@extends('admin.adminsesaat.layout')

@section('content')
    <h2>Form Edit Daftar Informasi Setiap Saat</h2>
    <div class="container" style="padding: 24px; background-color:white">
        <form method="post" action="{{ route('adminsesaat-admin.update', $adminSesaat->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col mb-0">
                        <label class="font-weight-bold">Ringkasan Informasi</label>
                        <input type="text" name="ringkasan" value="{{ $adminSesaat->ringkasan }}" class="form-control" placeholder="Inputkan Ringkasan Informasi"/>
                    </div>
                    <div class="col mb-0">
                        <label class="font-weight-bold">Penguasa Informasi</label>
                        <input type="text" name="penguasa" value="{{ $adminSesaat->penguasa }}" class="form-control" placeholder="Inputkan Penguasa Informasi"/>
                    </div>
                    <div class="col mb-0">
                        <label class="font-weight-bold">Penanggung Jawab</label>
                        <input type="text" name="penanggungjawab" value="{{ $adminSesaat->penanggungjawab }}" class="form-control" placeholder="Inputkan Penanggung Jawab"/>
                    </div>
                    {{-- <div class="col mb-0">
                        <label class="font-weight-bold">Tempat dan Waktu</label>
                        <input type="text" name="waktu" value="{{ $adminSesaat->waktu }}" class="form-control" placeholder="Inputkan Tempat dan Waktu"/>
                    </div> --}}
                    <div class="col mb-0">
                        <label class="font-weight-bold">Retensi Arsip</label>
                        <input type="text" name="arsip" value="{{ $adminSesaat->arsip }}" class="form-control" placeholder="Inputkan Retensi Arsip"/>
                    </div>
                    <div class="col mb-0">
                        <label for="image" class="form-label">Bentuk Informasi</label>
                        <input type="text" name="link" value="{{ $adminSesaat->link }}" class="form-control" placeholder="Inputkan Bentuk Informasi"/>
                    </div>
                    <div class="col mb-0">
                        <div class="form-check mt-3">
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox" value="1" class="form-check-input" id="scales"
                                name="status"
                                {{ isset($adminSesaat->status) && $adminSesaat->status == true ? 'checked' : '' }}>
                            <label class="form-check-label" for="defaultCheck1"> Status </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/adminsesaat-admin" class="btn btn-outline-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
