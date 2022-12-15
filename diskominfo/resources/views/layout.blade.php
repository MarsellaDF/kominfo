<!DOCTYPE html>
<html lang="en">

<head>
    <!-- memanggil url asset untuk file css -->
    @include('layout.url_css')
</head>

<body>
    <!-- tampilan navbar untuk ditampilkan di body(badan) -->
    @include('layout.navbar')

    <!-- content atau isi yang ditampilkan dalam halaman -->
    @yield('content')

    <!-- memanggil footer -->
    @include('layout.footer')

    <!-- memanggil url asset untuk file js -->
    @include('layout.url_js')
</body>

</html>