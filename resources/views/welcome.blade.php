<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kevin Sport</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar-nav .nav-link {
            color: #343a40;
            /* default gelap */
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #0d6efd;
            /* hover warna biru */
        }

        .navbar-nav .nav-link.active {
            color: #0d6efd !important;
            /* warna biru untuk yang aktif */
        }
    </style>

</head>

<body class="antialiased">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top py-3">
        <div class="container">
            <!-- Logo dan Brand -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="height: 50px;" class="me-2">
                <h4 class="m-0 fw-bold text-primary">KEVIN SPORT</h4>
            </a>

            <!-- Toggle button (untuk mobile) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Navigasi -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#feature">Benefits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#class">Class</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#coach">Coach</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://wa.me/6282127032424">Contact</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="btn btn-primary ms-2" href="{{ route('login') }}">Login</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid position-relative header-overlay">
        <div class="container text-center my-5 py-5">
            <h1 class="text-white mt-4 mb-4">KEVIN SPORT</h1>
            <h1 class="text-white display-1 mb-5">Taekwondo Team</h1>
        </div>
    </div>
    <!-- Header End -->

    <!-- Header End -->

    <!-- About Start -->
    <section id="about" class="section-bg">
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100" src="{{ asset('images/about.jpg') }}"
                                alt="About Kevin Sport" style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="section-title position-relative mb-4">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">About Us
                            </h6>
                            <h1 class="display-4">Tempat Berkembangnya Atlet Muda Bertalenta dari Cirebon</h1>
                        </div>
                        <p>Kevin Sport Taekwondo adalah pusat pelatihan bela diri yang berdedikasi untuk mengembangkan
                            atlet-atlet unggul dari Kota Cirebon dan sekitarnya. Sejak didirikan, kami telah menjadi
                            tempat berkumpulnya para pejuang muda yang ingin belajar, berkembang, dan berprestasi
                            melalui seni bela diri Taekwondo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->

    <!-- Feature Start -->
    <section id="feature">
        <div class="container-fluid bg-image" style="margin: 90px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 my-5 pt-5 pb-lg-5">
                        <div class="section-title position-relative mb-4">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Why Choose
                                Us?</h6>
                            <h1 class="display-4">Kenapa Harus Bergabung dengan Kevin Sport Academy?</h1>
                        </div>
                        <p class="mb-4 pb-2">Di Kevin Sport Academy, kami tidak hanya mengajarkan teknik bela diri,
                            tetapi juga membentuk karakter, disiplin, dan semangat juang. Dengan pelatih berpengalaman
                            dan program yang terstruktur, kami siap mendampingi setiap langkah perjalanan Anda.
                        </p>
                        <div class="d-flex mb-3">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-chalkboard-teacher text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Pelatih Bersertifikat Nasional</h4>
                                <p>Pelatih kami tersertifikasi nasional, berpengalaman melatih segala usia dan tingkat
                                    kemampuan, dengan rekam jejak di kompetisi.</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-dumbbell text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Program Terarah</h4>
                                <p>Dari teknik dasar hingga sparring dan poomsae tingkat lanjut, program kami fokus pada
                                    pengembangan fisik dan mental untuk pemula hingga atlet.</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-clock text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Jadwal Fleksibel</h4>
                                <p class="m-0">Kelas tersedia untuk anak-anak, remaja, dan dewasa, dengan waktu
                                    latihan
                                    yang fleksibel agar sesuai dengan rutinitas Anda.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5" style="min-height: 500px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100" src="{{ asset('images/feature.jpg') }}"
                                style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature End -->

    <!-- Class Start -->
    <section id="class">
        <div class="container-fluid px-0 py-5">
            <div class="row mx-0 justify-content-center pt-5">
                <div class="col-lg-6">
                    <div class="section-title text-center position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Class</h6>
                        <h1 class="display-4">Kelas yang tersedia di Kevin Sport</h1>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-2">
                    <div class="col-lg-5" style="min-height: 500px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100" src="{{ asset('images/kevin-junior.jpg') }}"
                                style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-7 my-5 pt-5 pb-lg-5">
                        <div class="section-title position-relative mb-4">
                            <h1 class="display-4">Kevin Junior</h1>
                        </div>
                        <p class="mb-4 pb-2">Program khusus untuk anak-anak usia dini hingga remaja awal. Fokus pada
                            pengenalan dasar bela diri,
                            motorik, serta membangun kepercayaan diri.
                        </p>
                        <div class="d-flex mb-3">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-calendar-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Jadwal Latihan</h4>
                                <p>Selasa, Kamis dan Sabtu (15.45 - 17.30)<br>
                                    Minggu (07.30 - 10.30)</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Lokasi</h4>
                                <p>Dojang Kevin Sport, Kalijaga, Kec. Harjamukti, Kota Cirebon, Jawa Barat 45144</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-money-bill-wave text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Biaya</h4>
                                <h6>Registrasi</h6>
                                <p>Rp350.000 (Include Dobok)</p>
                                <h6>Iuran</h6>
                                <p>Rp100.000/bulan</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="container">
                <div class="row mt-2">
                    <div class="col-lg-7 my-5 pt-5 pb-lg-5">
                        <div class="section-title position-relative mb-4">
                            <h1 class="display-4">Pemuda</h1>
                        </div>
                        <p class="mb-4 pb-2">Program ini terbuka untuk siapa saja, baik anak-anak, remaja, maupun
                            dewasa
                            yang ingin meningkatkan keterampilan bela diri, kekuatan fisik, dan mental melalui latihan
                            Taekwondo yang terstruktur dan profesional. Cocok untuk pemula maupun yang ingin kembali
                            aktif berlatih.
                        </p>
                        <div class="d-flex mb-3">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-calendar-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Jadwal Latihan</h4>
                                <h6>Kelas Reguler</h6>
                                <p>Sabtu (16.00-17.30) dan Minggu (08.00-10.00)</p>
                                <h6>Kelas Prestasi</h6>
                                <p>Senin dan Kamis (16.00 - 17.30)</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Lokasi</h4>
                                <p>Gedung Pemuda, Jalan Komplek Perkantoran Bima Kel, Sunyaragi, Kec. Kesambi, Kota
                                    Cirebon, Jawa Barat 45132</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-money-bill-wave text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Biaya</h4>
                                <h6>Registrasi</h6>
                                <p>Rp350.000 (include Dobok)</p>
                                <h6>Iuran</h6>
                                <p>Rp100.000/bulan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5" style="min-height: 500px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100" src="{{ asset('images/pemuda.jpg') }}"
                                style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-2">
                <div class="row">
                    <div class="col-lg-5" style="min-height: 500px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100"
                                src="{{ asset('images/kevin-sport-academy.jpg') }}" style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-7 my-5 pt-5 pb-lg-5">
                        <div class="section-title position-relative mb-4">
                            <h1 class="display-4">Kevin Sport Academy</h1>
                        </div>
                        <p class="mb-4 pb-2">Program elite untuk calon atlet profesional. Fokus pada persiapan
                            kompetisi, pembinaan fisik, teknik,
                            taktik, serta mental bertanding.
                        </p>
                        <div class="d-flex mb-3">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-calendar-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Jadwal Latihan</h4>
                                <p>Rabu, Jumat dan Minggu (18.45 - 20.30)</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Lokasi</h4>
                                <p>Dojang Kevin Sport, Kalijaga, Kec. Harjamukti, Kota Cirebon, Jawa Barat 45144</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-money-bill-wave text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Biaya</h4>
                                <h6>Registrasi</h6>
                                <p>Rp350.000</p>
                                <h6>Iuran</h6>
                                <p>Rp150.000/bulan</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container">
                <div class="row mt-2">
                    <div class="col-lg-7 my-5 pt-5 pb-lg-5">
                        <div class="section-title position-relative mb-4">
                            <h1 class="display-4">Private / Diklat Poomsae</h1>
                        </div>
                        <p class="mb-4 pb-2">Program ini terbuka untuk siapa saja, baik anak-anak, remaja, maupun
                            dewasa
                            yang ingin meningkatkan keterampilan bela diri, kekuatan fisik, dan mental melalui latihan
                            Taekwondo yang terstruktur dan profesional. Cocok untuk pemula maupun yang ingin kembali
                            aktif berlatih.
                        </p>
                        <div class="d-flex mb-3">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-calendar-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Jadwal Latihan</h4>
                                <p>Senin (19.00 - 20.30)<br>
                                    Sabtu (14.00 - 15.30)</p>

                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Lokasi</h4>
                                <p>Gedung Pemuda, Jalan Komplek Perkantoran Bima Kel, Sunyaragi, Kec. Kesambi, Kota
                                    Cirebon, Jawa Barat 45132</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-money-bill-wave text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Biaya</h4>
                                <h6>Private</h6>
                                <p>Rp350.000/bulan</p>
                                <h6>Diklat</h6>
                                <p>Rp125.000/bulan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5" style="min-height: 500px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100" src="{{ asset('images/diklat.jpg') }}"
                                style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Class End -->

    <!-- Infinite Loop Coach Section -->
    <section id="coach" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="text-uppercase text-danger mb-2" style="letter-spacing: 2px;">Coach</h6>
                <h1 class="display-4 fw-bold">Meet Our Coach</h1>
            </div>

            <div class="position-relative">
                <button id="btn-prev"
                    class="btn btn-primary position-absolute top-50 start-0 translate-middle-y z-3">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <div class="coach-carousel d-flex overflow-hidden position-relative">
                    <div id="carousel-track" class="d-flex transition">
                        @php
                            $coaches = [
                                [
                                    'img' => 'sabeum-suwir.jpg',
                                    'nama' => 'Suwiriyadi',
                                    'divisi' => 'Pemuda Coach',
                                    'dan' => 'DAN V KUKKIWON',
                                ],
                                [
                                    'img' => 'sabeum-supri.jpg',
                                    'nama' => 'Supriyadi',
                                    'divisi' => 'Pemuda Coach',
                                    'dan' => 'DAN IV KUKKIWON',
                                ],
                                [
                                    'img' => 'sabeum-belva.jpg',
                                    'nama' => 'Belva Calista',
                                    'divisi' => 'Pemuda Coach',
                                    'dan' => 'DAN IV KUKKIWON',
                                ],
                                [
                                    'img' => 'sabeum-vilvi.jpg',
                                    'nama' => 'Vilvi',
                                    'divisi' => 'Pemuda Coach',
                                    'dan' => 'DAN II KUKKIWON',
                                ],
                                [
                                    'img' => 'sabeum-hari.jpg',
                                    'nama' => 'Hari Suprapto',
                                    'divisi' => 'Pemuda Coach',
                                    'dan' => 'DAN II KUKKIWON',
                                ],
                                [
                                    'img' => 'sabeum-olis.jpeg',
                                    'nama' => 'M Nurkholis',
                                    'divisi' => 'Pemuda Coach',
                                    'dan' => 'DAN I KUKKIWON',
                                ],
                                [
                                    'img' => 'sabeum-rinto.jpg',
                                    'nama' => 'Rinto Ardianto',
                                    'divisi' => 'Kevin Junior',
                                    'dan' => 'DAN III KUKKIWON',
                                ],
                                [
                                    'img' => 'sabeum-solihin.jpg',
                                    'nama' => 'Solihin Andhika',
                                    'divisi' => 'Kevin Junior Coach',
                                    'dan' => 'DAN I KUKKIWON',
                                ],
                                [
                                    'img' => 'sabeum-akbar.jpg',
                                    'nama' => 'M Akbar K',
                                    'divisi' => 'Kevin Junior Coach',
                                    'dan' => 'DAN III KUKKIWON',
                                ],
                                [
                                    'img' => 'sabeum-nana.jpg',
                                    'nama' => 'Nana Supriyatna',
                                    'divisi' => 'Kevin Sport Academy Coach',
                                    'dan' => 'DAN II KUKKIWON',
                                ],
                                [
                                    'img' => 'sabeum-esti.jpg',
                                    'nama' => 'Esti Dwi Wahyuni',
                                    'divisi' => 'Private / Diklat Poomsae Coach',
                                    'dan' => 'DAN IV KUKKIWON',
                                ],
                                [
                                    'img' => 'sabeum-dhea.jpg',
                                    'nama' => 'Dhea Aulia U',
                                    'divisi' => 'Private / Diklat Poomsae Coach',
                                    'dan' => 'DAN II KUKKIWON',
                                ],
                            ];
                        @endphp

                        @foreach ($coaches as $coach)
                            <div class="coach-card flex-shrink-0 text-center mx-2">
                                <img src="{{ asset('images/' . $coach['img']) }}" class="img-fluid"
                                    style="height: 300px; object-fit: cover;">
                                <div class="bg-light p-3">
                                    <h5 class="mb-1">{{ $coach['nama'] }}</h5>
                                    <p class="mb-1">{{ $coach['divisi'] }}</p>
                                    <small class="text-muted">{{ $coach['dan'] }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button id="btn-next" class="btn btn-primary position-absolute top-50 end-0 translate-middle-y z-3">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <section id="gallery" class="gallery-section">
        <div class="section-title text-center position-relative mb-5">
            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Gallery</h6>
            <h1 class="display-4">Dokumentasi Kegiatan & Prestasi Kevin Sport Taekwondo</h1>
        </div>
        <div class="gallery">
            <img src="{{ asset('images/gallery/gallery-1.jpg') }}" alt="Gallery 1" onclick="openLightbox(this)" />
            <img src="{{ asset('images/gallery/gallery-2.jpg') }}" alt="Gallery 2" onclick="openLightbox(this)" />
            <img src="{{ asset('images/gallery/gallery-3.jpg') }}" alt="Gallery 3" onclick="openLightbox(this)" />
            <img src="{{ asset('images/gallery/gallery-4.jpg') }}" alt="Gallery 4" onclick="openLightbox(this)" />
            <img src="{{ asset('images/gallery/gallery-5.jpg') }}" alt="Gallery 5" onclick="openLightbox(this)" />
            <img src="{{ asset('images/gallery/gallery-6.jpg') }}" alt="Gallery 6" onclick="openLightbox(this)" />
            <img src="{{ asset('images/gallery/gallery-7.jpg') }}" alt="Gallery 7" onclick="openLightbox(this)" />
            <img src="{{ asset('images/gallery/gallery-8.jpg') }}" alt="Gallery 8" onclick="openLightbox(this)" />
        </div>
    </section>

    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
        <span class="close">&times;</span>
        <img id="lightbox-img" class="lightbox-content" />
    </div>

    <script>
        function openLightbox(img) {
            document.getElementById('lightbox-img').src = img.src;
            document.getElementById('lightbox').style.display = 'flex';
        }

        function closeLightbox() {
            document.getElementById('lightbox').style.display = 'none';
        }
    </script>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 border-top py-4"
        style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="container">
            <div
                class="d-flex justify-content-between align-items-center flex-column flex-md-row text-center text-md-start">
                <!-- Left Side: Copyright -->
                <div class="mb-3 mb-md-0">
                    <p class="m-0">
                        Copyright &copy;
                        <a class="text-white" href="#">Kevin Sport</a>. All Rights Reserved.
                    </p>
                </div>

                <!-- Right Side: Contact and Social Media (1 baris) -->
                <div class="d-flex align-items-center justify-content-center justify-content-md-end flex-wrap gap-3">
                    <small><i class="fa fa-phone-alt me-2"></i>+62 821 2703 2424</small>
                    <a class="text-white px-2" href="https://www.facebook.com/dojang.sport">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2"
                        href="https://www.instagram.com/kevin_sport_dojang?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white px-2" href="https://www.youtube.com/@suwiriyadi">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i
            class="fa fa-angle-double-up"></i></a>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const sections = document.querySelectorAll("section[id]");
            const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

            function setActiveLink() {
                let currentSection = "";

                sections.forEach(section => {
                    const rect = section.getBoundingClientRect();
                    if (rect.top <= 150 && rect.bottom >= 150) {
                        currentSection = section.getAttribute("id");
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove("active");
                    const href = link.getAttribute("href");

                    if (href === `#${currentSection}`) {
                        link.classList.add("active");
                    }
                });
            }

            // Jalankan saat scroll
            window.addEventListener("scroll", setActiveLink);

            // Jalankan saat pertama kali load
            setActiveLink();
        });
    </script>


    <script>
        const track = document.getElementById("carousel-track");
        const btnPrev = document.getElementById("btn-prev");
        const btnNext = document.getElementById("btn-next");
        const cardWidth = 304; // Sesuaikan: 300px card + 4px gap

        let index = 0;
        const cards = track.children;
        const total = cards.length;

        // Duplicate for infinite scroll
        track.innerHTML += track.innerHTML;

        function scrollToCard(idx) {
            track.style.transform = `translateX(-${idx * cardWidth}px)`;
        }

        function nextCard() {
            index++;
            if (index >= total) {
                index = 0;
                track.style.transition = "none";
                scrollToCard(index);
                setTimeout(() => {
                    track.style.transition = "transform 0.5s ease-in-out";
                    nextCard();
                }, 50);
            } else {
                scrollToCard(index);
            }
        }

        function prevCard() {
            index--;
            if (index < 0) {
                index = total - 1;
                track.style.transition = "none";
                scrollToCard(index + total); // jump to duplicate
                setTimeout(() => {
                    track.style.transition = "transform 0.5s ease-in-out";
                    scrollToCard(index);
                }, 50);
            } else {
                scrollToCard(index);
            }
        }

        btnNext.addEventListener("click", nextCard);
        btnPrev.addEventListener("click", prevCard);

        // Auto scroll
        let autoScroll = setInterval(nextCard, 3000);

        // Reset interval when clicked
        btnNext.addEventListener("click", () => {
            clearInterval(autoScroll);
            autoScroll = setInterval(nextCard, 3000);
        });
        btnPrev.addEventListener("click", () => {
            clearInterval(autoScroll);
            autoScroll = setInterval(nextCard, 3000);
        });
    </script>

</body>

</html>
