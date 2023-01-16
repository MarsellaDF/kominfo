@extends('layout')

@section('content')

<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
        <h1>Berita</h1>
</div>
    <div class="hero-slider">
        @if (!$adminBerita->isEmpty())
            @foreach ($adminBerita as $no => $data)
                <div class="slider-item slide{{ $no }}"
                    style="background-image:url(/upload/adminberita/{{ $data->image }})">
                </div>
            @endforeach
        @endif
        <div class="slider-item" style="background-image:url(upload/adminberita/default-adminberita.png)">
        </div>
    </div>
    {{-- END Banner --}}
    <!--team section-->
    <!-- Contact Section -->
    <section class="blog-section style-four section" style=" background-image: url('/assets/bg/bg4.jpg');  background-size: cover; background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="left-side">
                        @if (!$adminBerita->isEmpty())
                            @foreach ($adminBerita as $data)
                                <div class="item-holder">
                                    <div class="image-box">
                                        <figure>
                                        <img src="/upload/adminBerita/{{ $data->image }}" style="width: 600px"  alt="">
                                        </figure>
                                    </div>
                                    <div class="content-text">
                                            <h6>{{ $data->judul }}</h6>
                                        <span>By Admin / {{ $data->created_at->format('d - m - Y') }}</span>
                                        {{-- <p>
                                            {!! strip_tags(Str::limit($data->deskripsi, 300, $end = ' ...')) !!}
                                        </p> --}}
                                        <div class="mb-3">
                                           <a href="/detail-berita/{{ $data->id }}"  class="btn btn-outline-primary py-md-3 px-md-2 animated slideInRight">Baca Berita >>></a> <br></br>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
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
                                @foreach ($category_adminBerita as $data)
                                    <li><a href="/user/berita/{{$data->name_category}}">{{ $data->name_category }}
                                            <span>({{ $data->total }})</span></a></li>
                                @endforeach
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="styled-pagination">
                <!-- End Contact Section -->
                {{--  {{ $adminBerita->links() }}  --}}
                <center style="margin-bottom: 24px">
                </center>
            </div>
        </div>
    </section>

    <!--End team section-->

@stop
