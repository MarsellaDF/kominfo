@extends('admin.adminpejabat.layout')

@section('content')
    <h2>Form Tambah Data Pejabat Struktural dan LHKPN</h2>
    <div class="container" style="padding: 24px; background-color:white">
        <form method="post" action="{{ url('adminpejabat-admin')}}" enctype="multipart/form-data">
            @csrf
            <div class="body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" placeholder="Inputkan Jabatan"/>
                            </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Inputkan Nama"/>
                                </div>
                     </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="font-weight-bold">NIP</label>
                            <input type="text" name="nip" class="form-control" placeholder="Inputkan NIP"/>
                               </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                             <label class="font-weight-bold">Pangkat/ Golongan Ruang</label>
                            <input type="text" name="pangkat" class="form-control" placeholder="Inputkan Pangkat/ Golongan Ruang"/>
                                </div>
                     </div>
                    <div class="col-lg-6">
                         <div class="form-group">
                          <label class="font-weight-bold">Pendidikan Terakhir</label>
                        <input type="text" name="pendidikan" class="form-control" placeholder="Inputkan Pendidikan Terakhir"/>
                                </div>
                    </div>
                     <div class="col-lg-6">
                          <div class="form-group">
                          <label class="font-weight-bold">Jenis Kelamin</label>
                          <input type="text" name="kelamin" class="form-control" placeholder="Inputkan Jenis Kelamin"/>
                                </div>
                    </div>
                    <div class="col-lg-6">
                           <div class="form-group">
                           <label class="font-weight-bold">Agama</label>
                            <input type="text" name="agama" class="form-control" placeholder="Inputkan Agama"/>
                                  </div>
                    </div>
                    <div class="col-lg-6">
                           <div class="form-group">
                            <label class="font-weight-bold">Status Perkawinan</label>
                             <input type="text" name="kawin" class="form-control" placeholder="Inputkan Status Perkawinan"/>
                                   </div>
                    <div class="col-lg-6">
                            <div class="form-group">
                           <label class="font-weight-bold">LHKPN</label>
                            <input type="link" name="lhkpn" class="form-control" placeholder="Inputkan LHKPN"/>
                                  </div>
                    </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="image" class="form-label">Status</label>
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
                <a href="/adminpejabat-admin" class="btn btn-outline-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
