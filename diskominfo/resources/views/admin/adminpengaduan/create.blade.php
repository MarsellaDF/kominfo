@extends('admin.adminpengaduan.layout')

@section('content')
    <h2>Form Tambah Data Pengaduan</h2>
    <div class="container" style="padding: 24px; background-color:white">
        <form method="post" action="{{ url('adminpengaduan-admin')}}" enctype="multipart/form-data">
            @csrf
            <div class="body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Uraian</label>
                        <input type="text" name="uraian" class="form-control" placeholder="Inputkan Uraian Pengaduan"/>
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Link</label>
                            <input type="text" name="link" class="form-control" placeholder="Inputkan Link Pengaduan"/>
                                </div>
                            </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="image" class="form-label">Status Pengaduan</label>
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
                <a href="/adminpengaduan-admin" class="btn btn-outline-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
