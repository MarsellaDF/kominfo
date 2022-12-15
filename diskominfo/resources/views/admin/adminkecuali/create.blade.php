@extends('admin.adminkecuali.layout')

@section('content')
    <h2>Form Tambah Data Daftar Informasi Berkala</h2>
    <div class="container" style="padding: 24px; background-color:white">
        <form method="post" action="{{ url('adminkecuali-admin')}}" enctype="multipart/form-data">
            @csrf
            <div class="body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Judul Informasi</label>
                        <input type="text" name="title" class="form-control" placeholder="Inputkan Judul Informasi Dikecualikan"/>
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Jenis Media Yang Memuat Informasi</label>
                            <input type="text" name="url" class="form-control" placeholder="Inputkan Link Informasi Dikecualikan"/>
                                </div>
                            </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="image" class="form-label">Status Informasi Dikecualikan</label>
                            <div class="form-check">
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" value="1" class="form-check-input" id="scales" name="status">
                                <label class="form-check-label" for="defaultCheck1"> Aktif </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/adminkecuali-admin" class="btn btn-outline-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
