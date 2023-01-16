<!-- memanggil badan -> file layout.blade.php -->
@extends('layout')

<!-- mengisi badan content dengan isi di bawah section-->
@section('content')

<div class="container-xxl py-5">
    <div class="text-center mx-auto mb-5">
        <h3>Daftar Informasi Berkala</h3><br>
        {{-- <form action="{{ route('berkala.filter') }}" method="GET" class="form-group" id="formFilter">
            {{ csrf_field() }}
            <select style="cursor:pointer;" class="form-control" id="tag_select" name="year">
            <option value="0" selected disabled> Pilih Tahun</option>
                <?php
                $year = date('Y');
                $min = $year - 60;
                $max = $year;
                for( $i=$max; $i>=$min; $i-- ) {
                echo '<option value='.$i.'>'.$i.'</option>';
                }?>
        </select>
        <select style="cursor:pointer;margin-top:1.5em;margin-bottom:1.5em;" class="form-control" id="tag_select" name="month">
            <option value="0" selected disabled> Pilih Bulan</option>
            <option value="01"> Januari</option>
            <option value="02"> Februari</option>
            <option value="03"> Maret</option>
            <option value="04"> April</option>
            <option value="05"> Mei</option>
            <option value="06"> Juni</option>
            <option value="07"> Juli</option>
            <option value="08"> Agustus</option>
            <option value="09"> September</option>
            <option value="10"> Oktober</option>
            <option value="11"> November</option>
            <option value="12"> Desember</option>
        </select>
        </form>
        <button class="btn btn-default btn-block" type="submit" form="formFilter" value="Submit">Cari Data</button> --}}

        <table class="table table-striped table-bordered table-hover" id="table">
            <thead>
                <tr class="users-table-info">
                    <th>No</th>
                    <th>Judul Informasi</th>
                    <th>Jenis Media Yang Memuat Informasi</th>
                </tr>
            </thead>
        <tbody>
        @foreach ($adminBerkala as $data)
    </div>
    <tr>
    <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $data->title }}</td>
            <td>
                @if ($data['url'] != null || $data['url'] != '')
                <a href={{ $data->url }} target="_blank" class="btn btn-link">Lihat Disini</a>
                @else
                    <span style="color: red">Tidak ada URL</span>
                @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@stop
