@extends('admin.adminaset.layout')

@section('content')
    <h2>Form Edit Aset</h2>
    <div class="container" style="padding: 24px; background-color:white">
        <form method="post" action="{{ route('adminaset-admin.update', $adminAset->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col mb-0">
                        <label class="font-weight-bold">Uraian</label>
                        <input type="text" name="uraian" value="{{ $adminAset->uraian }}" class="form-control" placeholder="Inputkan Uraian Aset"/>
                    </div>
                    <div class="col mb-0">
                        <label for="image" class="form-label">Link</label>
                        <input type="text" name="link" value="{{ $adminAset->link }}" class="form-control" placeholder="Inputkan Link Aset"/>
                    </div>
                    <div class="col mb-0">
                        <div class="form-check mt-3">
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox" value="1" class="form-check-input" id="scales"
                                name="status"
                                {{ isset($adminAset->status) && $adminAset->status == true ? 'checked' : '' }}>
                            <label class="form-check-label" for="defaultCheck1"> Status </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/adminaset-admin" class="btn btn-outline-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
