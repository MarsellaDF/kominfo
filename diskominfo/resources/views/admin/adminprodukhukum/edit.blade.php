@extends('admin.adminprodukhukum.layout')

@section('content')
    <h2>Form Edit Produk Hukum</h2>
    <div class="container" style="padding: 24px; background-color:white">
        <form method="post" action="{{ route('adminprodukhukum-admin.update', $adminProdukhukum->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col mb-0">
                        <label class="font-weight-bold">Uraian</label>
                        <input type="text" name="uraian" value="{{ $adminProdukhukum->uraian }}" class="form-control" placeholder="Inputkan Uraian Produk Hukum"/>
                    </div>
                    <div class="col mb-0">
                        <label for="image" class="form-label">Link</label>
                        <input type="text" name="link" value="{{ $adminProdukhukum->link }}" class="form-control" placeholder="Inputkan Link Produk Hukum"/>
                    </div>
                    <div class="col mb-0">
                        <div class="form-check mt-3">
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox" value="1" class="form-check-input" id="scales"
                                name="status"
                                {{ isset($adminProdukhukum->status) && $adminProdukhukum->status == true ? 'checked' : '' }}>
                            <label class="form-check-label" for="defaultCheck1"> Status </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/adminprodukhukum-admin" class="btn btn-outline-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
