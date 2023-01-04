@extends('admin.adminpejabat.layout')

@section('content')
    <h2>Form Edit Pejabat Struktural dan LHKPN</h2>
    <div class="container" style="padding: 24px; background-color:white">
        <form method="post" action="{{ route('adminpejabat-admin.update', $adminPejabat->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col mb-0">
                        <label class="font-weight-bold">Jabatan</label>
                        <input type="text" name="jabatan" value="{{ $adminPejabat->jabatan }}" class="form-control" placeholder="Inputkan Jabatan"/>
                    </div>
                    <div class="col mb-0">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text" name="nama" value="{{ $adminPejabat->nama }}" class="form-control" placeholder="Inputkan Nama"/>
                    </div>
                    <div class="col mb-0">
                        <label class="font-weight-bold">NIP</label>
                        <input type="text" name="nip" value="{{ $adminPejabat->nip }}" class="form-control" placeholder="Inputkan NIP"/>
                    </div>
                    <div class="col mb-0">
                        <label class="font-weight-bold">Pangkat/Golongan Ruang</label>
                        <input type="text" name="pangkat" value="{{ $adminPejabat->pangkat }}" class="form-control" placeholder="Inputkan Pangkat/Golongan Ruang"/>
                    </div>
                    <div class="col mb-0">
                        <label class="font-weight-bold">Pendidikan Terakhir</label>
                        <input type="text" name="pendidikan" value="{{ $adminPejabat->pendidikan }}" class="form-control" placeholder="Inputkan Pendidikan Terakhir"/>
                    </div>
                    <div class="col mb-0">
                        <label class="font-weight-bold">Jenis Kelamin</label>
                        <input type="text" name="kelamin" value="{{ $adminPejabat->kelamin }}" class="form-control" placeholder="Inputkan Jenis Kelamin"/>
                    </div>
                    <div class="col mb-0">
                        <label class="font-weight-bold">Agama</label>
                        <input type="text" name="agama" value="{{ $adminPejabat->agama }}" class="form-control" placeholder="Inputkan Agama"/>
                    </div>
                    <div class="col mb-0">
                        <label class="font-weight-bold">Status Perkawinan</label>
                        <input type="text" name="kawin" value="{{ $adminPejabat->kawin }}" class="form-control" placeholder="Inputkan Status Perkawinan"/>
                    </div>
                    <div class="col mb-0">
                        <label for="image" class="form-label">LHKPN</label>
                        <input type="text" name="lhkpn" value="{{ $adminPejabat->lhkpn }}" class="form-control" placeholder="Inputkan LHKPN"/>
                    </div>
                    <div class="col mb-0">
                        <div class="form-check mt-3">
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox" value="1" class="form-check-input" id="scales"
                                name="status"
                                {{ isset($adminPejabat->status) && $adminPejabat->status == true ? 'checked' : '' }}>
                            <label class="form-check-label" for="defaultCheck1"> Status </label>
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
