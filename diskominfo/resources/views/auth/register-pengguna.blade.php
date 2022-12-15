<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPID DISKOMINFO KABUPATEN BANYUWANGI</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/template/img/logo.png" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="/assets/auth/css/style.min.css">
</head>

<body>
    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">
            <h1 class="sign-up__title">REGISTER</h1>
            <form class="sign-up-form form" action="{{ url('register-pengguna')}}" method="POST" required>
                {{ csrf_field() }}
                <label class="form-label-wrapper">
                    <p class="form-label">Nomor Induk Kependudukan (NIK)</p>
                    <input class="form-input" type="number" name="nik" placeholder="Masukkan NIK Anda" required>
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Nama</p>
                    <input class="form-input" type="text" name="name" placeholder="Masukkan Nama Lengkap anda" required>
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Alamat</p>
                    <input class="form-input" type="text" name="address" placeholder="Masukkan Alamat Lengkap Anda"
                        required>
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Nomor Telepon</p>
                    <input class="form-input" type="tel" name="telepon" placeholder="Masukkan Nomor Telepon Anda"
                        required>
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Pekerjaan</p>
                    <input class="form-input" type="text" name="jobs" placeholder="Masukkan Pekerjaan Anda" required>
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Email</p>
                    <input class="form-input" type="email" name="email" placeholder="Masukkan Email" required>
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Password</p>
                    <input class="form-input" type="password" name="password" placeholder="Masukkan Password" required>
                </label>
                <label class="form-checkbox-wrapper">
                    <input class="form-checkbox" type="checkbox" required>
                    <span class="form-checkbox-label">Ingatkan Saya</span>
                </label>
                <button class="form-btn primary-default-btn transparent-btn">SIGN UP</button>
            </form>
        </article>
    </main>
    <!-- Chart library -->
    <script src="/assets/auth/plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="/assets/auth/plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="/assets/auth/js/script.js"></script>
</body>

</html>