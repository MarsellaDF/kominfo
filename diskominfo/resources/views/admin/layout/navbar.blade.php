<!-- ! Sidebar -->
<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="##" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">Elegant</span>
                    <span class="logo-subtitle">Dashboard</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a class="active" href="/admin"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a class="show-cat-btn
                    {{ Request::segment(1) == 'banner-admin'
                    || Request::segment(1) == 'tujuansasaran-admin'
                    || Request::segment(1) == 'kedudukan-admin'
                        ? 'active'
                        : '' }}" href="##">
                        <span class="icon setting" aria-hidden="true"></span>Setting Content
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="/banner-admin">Banner</a>
                        </li>
                        <li>
                            <a href="/tujuansasaran-admin">Tujuan dan Sasaran</a>
                        </li>
                        <li>
                            <a href="/kedudukan-admin">Kedudukan Tugas Fungsi</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn
                    {{ Request::segment(1) == 'admintentang-admin'
                    || Request::segment(1) == 'keanggotaan-admin'
                    || Request::segment(1) == 'adminpejabat-admin'
                    || Request::segment(1) == 'admintatakerja-admin'
                        ? 'active'
                        : '' }}" href="##">
                        <span class="icon document" aria-hidden="true"></span>Profil
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="/admintentang-admin">Tentang</a>
                        </li>
                        <li>
                            <a href="/keanggotaan-admin">Keanggotaan</a>
                        </li>
                        <li>
                            <a href="/adminpejabat-admin">Pejabat Struktural</a>
                        </li>
                        <li>
                            <a href="/admintatakerja-admin">Organisasi & Tata Kerja</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn
                    {{ Request::segment(1) == 'adminprokeg-admin'
                    || Request::segment(1) == 'adminrealisasi-admin'
                    || Request::segment(1) == 'adminanggaran-admin'
                    || Request::segment(1) == 'adminneraca-admin'
                    || Request::segment(1) == 'adminkas-admin'
                    || Request::segment(1) == 'adminkeuangan-admin'
                    || Request::segment(1) == 'adminaset-admin'
                    || Request::segment(1) == 'admindigital-admin'
                        ? 'active'
                        : '' }}" href="##">
                        <span class="icon document" aria-hidden="true"></span>Kinerja
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="/adminprokeg-admin">Program & Kegiatan</a>
                        </li>
                        <li>
                            <a href="/adminrealisasi-admin">Realisasi Kegiatan</a>
                        </li>
                        <li>
                            <a href="/adminanggaran-admin">Laporan Realisasi Anggaran</a>
                        </li>
                        <li>
                            <a href="/adminneraca-admin">Neraca</a>
                        </li>
                        <li>
                            <a href="/adminkas-admin">Laporan Arus Kas</a>
                        </li>
                        <li>
                            <a href="/adminkeuangan-admin">Laporan Keuangan</a>
                        </li>
                        <li>
                            <a href="/adminaset-admin">Aset</a>
                        </li>
                        <li>
                            <a href="/admindigital-admin">Dokumen Digital</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn
                    {{ Request::segment(1) == 'adminberita-admin'
                    || Request::segment(1) == 'adminrekrutmen-admin'
                    || Request::segment(1) == 'adminprodukhukum-admin'
                    || Request::segment(1) == 'adminpengaduan-admin'
                    || Request::segment(1) == 'adminbarangjasa-admin'
                    || Request::segment(1) == 'adminevakuasi-admin'
                    || Request::segment(1) == 'adminberkala-admin'
                    || Request::segment(1) == 'adminsesaat-admin'
                    || Request::segment(1) == 'adminkecuali-admin'
                    || Request::segment(1) == 'adminsemerta-admin'
                        ? 'active'
                        : '' }}" href="##">
                        <span class="icon document" aria-hidden="true"></span>Informasi
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="/adminberita-admin">Berita</a>
                        </li>
                        <li>
                            <a href="/adminrekrutmen-admin">Rekrutmen</a>
                        </li>
                        <li>
                            <a href="/adminprodukhukum-admin">Produk Hukum</a>
                        </li>
                        <li>
                            <a href="/adminpengaduan-admin">Pengaduan</a>
                        </li>
                        <li>
                            <a href="/adminbarangjasa-admin">Pengadaan Barang Jasa</a>
                        </li>
                        <li>
                            <a href="/adminevakuasi-admin">Prosedur Evakuasi Darurat</a>
                        </li>
                        <li>
                            <a href="/adminberkala-admin">Berkala</a>
                        </li>
                        <li>
                            <a href="/adminsesaat-admin">Setiap Saat</a>
                        </li>
                        <li>
                            <a href="/adminkecuali-admin">Dikecualikan</a>
                        </li>
                        <li>
                            <a href="/adminsemerta-admin">Serta Merta</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn
                    {{ Request::segment(1) == 'library-admin'
                    || Request::segment(1) == 'adminmaklumat-admin'
                    || Request::segment(1) == 'adminpedoman-admin'
                    || Request::segment(1) == 'admindashum-admin'
                    || Request::segment(1) == 'adminsk-admin'
                    || Request::segment(1) == 'adminsop-admin'
                    || Request::segment(1) == 'adminlangsung-admin'
                    || Request::segment(1) == 'adminpermohonan-admin'
                    || Request::segment(1) == 'adminkeberatan-admin'
                    || Request::segment(1) == 'adminlaporan-admin'
                        ? 'active'
                        : '' }}" href="##">
                        <span class="icon document" aria-hidden="true"></span>PPID
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        {{-- <li>
                            <a href="/adminppid-admin">Tentang PPID</a>
                        </li> --}}
                        <li>
                            <a href="/library-admin">Library</a>
                        </li>
                        <li>
                            <a href="/adminmaklumat-admin">Maklumat Pelayanan</a>
                        </li>
                        <li>
                            <a href="/adminpedoman-admin">Pedoman</a>
                        </li>
                        <li>
                            <a href="/admindashum-admin">DasHum Pembentukan</a>
                        </li>
                        <li>
                            <a href="/adminsk-admin">SK Pembentukan</a>
                        </li>
                        <li>
                            <a href="/adminsop-admin">SOP</a>
                        </li>
                        <li>
                            <a href="/adminlangsung-admin">Datang Langsung</a>
                        </li>
                        <li>
                            <a href="/adminpermohonan-admin">Permohonan</a>
                        </li>
                        <li>
                            <a href="/adminkeberatan-admin">Keberatan</a>
                        </li>
                        <li>
                            <a href="/adminlaporan-admin">Laporan</a>
                        </li>
                    </ul>
                </li>
            <span class="system-menu__title">system</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a href="register.html"><span class="icon user-3" aria-hidden="true"></span>Register</a>
                </li>
                <li>
                    <a href="appearance.html"><span class="icon edit" aria-hidden="true"></span>Appearance</a>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon category" aria-hidden="true"></span>Extentions
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="extention-01.html">Extentions-01</a>
                        </li>
                        <li>
                            <a href="extention-02.html">Extentions-02</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon user-3" aria-hidden="true"></span>Users
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="users-01.html">Users-01</a>
                        </li>
                        <li>
                            <a href="users-02.html">Users-02</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="##"><span class="icon setting" aria-hidden="true"></span>Settings</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture>
                    <source srcset="/assets/auth/img/avatar/avatar-illustrated-01.webp" type="image/webp"><img
                        src="/assets/auth/img/avatar/avatar-illustrated-01.png" alt="User name">
                </picture>
            </span>
            <div class="sidebar-user-info">
                <span class="sidebar-user__title">Nafisa Sh.</span>
                <span class="sidebar-user__subtitle">Support manager</span>
            </div>
        </a>
    </div>
</aside>
