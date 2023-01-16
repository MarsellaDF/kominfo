@extends('layout')

@section('content')

    <!--Page Title-->
    {{-- <section class="page-title text-center" style="background-image:url(/frontend/images/background/3.jpg); color: rgb(218, 167, 2) !important">
        <div class="container">
            <div class="title-text">
                <h1>Detail Berita</h1>
                <ul class="title-menu clearfix">
                    <li>
                        <a href="/" >home &nbsp;/</a>
                    </li>
                    <li style="color: rgb(238, 255, 0) !important">Detail Berita</li>
                </ul>
            </div>
        </div>
    </section> --}}
    <!--End Page Title-->

    <!-- Contact Section -->
    <section class="blog-section section style-four style-five" style=" background-image: url('/assets/bg/bg6-new.jpg');  background-size: cover; background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="left-side">
                        <div class="item-holder">
                            <div class="image-box">
                                <figure>
                                    <img src="/upload/adminBerita/{{ $data->image }}" style="width: 500px"></a>
                                </figure>
                            </div>
                        {{-- @if (!$adminBerita->isEmpty())
                            @foreach ($adminBerita as $data)
                                <div class="item-holder">
                                    <div class="image-box">
                                        <figure>
                                        <img src="/upload/adminBerita/{{ $data->image }}" style="width: 600px"  alt="">
                                        </figure>
                                    </div> --}}
                            <div class="content-text">
                                <h6>{{ $data->judul }}</h6>
                                {{-- <span>By Admin / {{ Carbon\Carbon::parse($$data->created_at)->format('Y-m-d') }}</span> --}}
                            <span>By Admin / {{ $data->created_at->format('d - m - Y') }}</span>

                            <p>{!! $data->deskripsi !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="right-side">
                        <div class="text-title">
                            <h6>Search</h6>
                        </div>
                        <div class="search-box">
                            <form method="get" action="">
                                <input type="search" name="cari"
                                    value="{{ isset($_GET['cari']) ? $_GET['cari'] : '' }}" placeholder="Enter to Search"
                                    required="">
                            </form>
                        </div> --}}
                        {{-- <div class="categorise-menu">
                            <div class="text-title">
                                <h6>Categories</h6>
                            </div>
                            <ul class="categorise-list">
                                @foreach ($category_articles as $data)
                                    <li><a href="/user/berita/{{$data->name_category}}">{{ $data->name_category }}
                                            <span>({{ $data->total }})</span></a></li>
                                @endforeach
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->

@stop
