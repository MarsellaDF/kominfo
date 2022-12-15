@extends('admin.layout')

@section('content-admin')
    <div class="container">
        <div class="row" style="padding: 16px; background-color:rgb(213, 228, 247)">
            <div class="col">
                <h4><a href="/admin">Dashboard</a> / <a style="color: grey">Dasar Hukum Pembentukan</a>
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="padding: 16px; background-color:rgb(245, 251, 253)">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
