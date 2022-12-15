@extends('admin.adminpedoman.layout')

@section('content')
    <h2>Form Edit Pedoman</h2>
    <div class="container" style="padding: 24px; background-color:white">
        <form method="post" action="{{ route('adminpedoman-admin.update', $adminPedoman->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row">
                    <label for="deskripsi" class="form-label">Konten : <span
                        style="font-size: 12px; color:red;">*</span></label><br>
                </div>
                <div class="row-lg-12">
                    <textarea id="konten" class="form-control" name="content" rows="10" cols="200">
                        {{ $adminPedoman->content }}
                    </textarea>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="file" class="form-label">Image</label>
                        <input type='file' name="file" id="imgInp" class="form-control" />
                    </div>
                    <div class="col mb-0">
                        <div class="form-check mt-3">
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox" value="1" class="form-check-input" id="scales"
                                name="status"
                                {{ isset($adminPedoman->status) && $adminPedoman->status == true ? 'checked' : '' }}>
                            <label class="form-check-label" for="defaultCheck1"> Status </label>
                        </div>
                    </div>
                </div>
                <div class="row g-2" style="margin-top: 16px">
                    <div class="col mb-0">
                        @if (isset($adminPedoman->file))
                            <img width="200px" id="blah" src="{{ '/upload/adminpedoman/' . $adminPedoman->file }}"
                                alt="your image" />
                        @else
                            <span style="color: red">Tidak ada gambar</span>
                        @endif

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/adminPedoman-admin" class="btn btn-outline-secondary">Close</a>
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
