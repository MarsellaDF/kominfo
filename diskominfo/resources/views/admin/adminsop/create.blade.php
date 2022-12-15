@extends('admin.adminsop.layout')

@section('content')
    <h2>Form Tambah Data AdminSop</h2>
    <div class="container" style="padding: 24px; background-color:white">
        <form method="post" action="{{ url('adminsop-admin')}}" enctype="multipart/form-data">
            @csrf
            <div class="body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="image" class="form-label">Image AdminSop</label>
                            <input type='file' name="image" id="imgInp" class="form-control" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="image" class="form-label">Status AdminSop</label>
                            <div class="form-check">
                                <input type="hidden" name="status" value="0">
                                <input type="checkbox" value="1" class="form-check-input" id="scales" name="status">
                                <label class="form-check-label" for="defaultCheck1"> Aktif </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="result-img" class="row g-2" style="margin: 16px; display:none">
                    <div class="col mb-0">
                        <img width="200px" id="blah" src="http://placehold.it/180" alt="your image" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/adminsop-admin" class="btn btn-outline-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                document.getElementById("result-img").style.display = "block";
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
