@extends('admin.adminsesaat.layout')

@section('content')
    <h2>Form Tambah Data Daftar Informasi Setiap Saat</h2>
    <div class="container" style="padding: 24px; background-color:white">
        <form method="post" action="{{ url('adminsesaat-admin')}}" enctype="multipart/form-data">
            @csrf
            <div class="body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Ringkasan Informasi</label>
                        <input type="text" name="ringkasan" class="form-control" placeholder="Inputkan Ringkasan Informasi"/>
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Penguasa Informasi</label>
                            <input type="text" name="penguasa" class="form-control" placeholder="Inputkan Penguasa Informasi"/>
                                </div>
                            </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Penanggung Jawab</label>
                             <input type="text" name="penanggungjawab" class="form-control" placeholder="Inputkan Penanggung Jawab Informasi"/>
                                </div>
                          </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Tempat dan Waktu</label>
                          <input type="text" name="waktu" class="form-control" placeholder="Inputkan Tempat dan Waktu"/>
                                </div>
                        </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Retensi Arsip</label>
                       <input type="text" name="arsip" class="form-control" placeholder="Inputkan Retensi Arsip"/>
                                </div>
                        </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Bentuk Informasi</label>
                           <input type="text" name="link" class="form-control" placeholder="Inputkan Bentuk Informasi"/>
                                </div>
                        </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="image" class="form-label">Status Informasi Setiap Saat</label>
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
                <a href="/adminsesaat-admin" class="btn btn-outline-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
