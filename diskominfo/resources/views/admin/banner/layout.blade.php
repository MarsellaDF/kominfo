@extends('admin.layout')

@section('content-admin')
    <div class="container">
        <div class="row" style="padding: 16px; background-color:rgb(213, 228, 247)">
            <div class="col">
                <h4><a href="/admin">Dashboard</a> / <a style="color: grey">Banner</a>
                </h4>
            </div>
            <div class="col text-right">
                <a href="{{ URL::to('/banner-admin/create') }}">++ Tambah Data</a>
            </div>
        </div>
        {{--  <div class="main-title" style="display:inline-flex">
        </div>  --}}
        <div class="row">
            <div class="col-lg-12" style="padding: 16px; background-color:rgb(245, 251, 253)">
                @yield('content')
                {{--  <div class="users-table table-wrapper" style="padding: 16px; background-color:white">
                </div>  --}}
            </div>
        </div>
    </div>
@endsection
