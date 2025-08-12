@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Carousel Section --}}
<div class="row mb-4">
    <div class="col">
        <div id="carouselExampleFade" class="carousel slide carousel-fade shadow rounded overflow-hidden" data-bs-ride="carousel" style="max-height: 400px;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/carousel-1.jpg') }}" class="d-block w-100 img-fluid" alt="Carousel 1" style="object-fit: cover; height: 400px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel-2.jpg') }}" class="d-block w-100 img-fluid" alt="Carousel 2" style="object-fit: cover; height: 400px;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel-3.jpg') }}" class="d-block w-100 img-fluid" alt="Carousel 3" style="object-fit: cover; height: 400px;">
                </div>
            </div>

            {{-- Controls --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>


        {{-- Section Title --}}
        <div class="row mb-3">
            <div class="col">
                <h3>Ujian Kenaikan Tingkat</h3>
            </div>
        </div>

        {{-- Cards --}}
        {{-- Dashboard Summary Cards --}}
        <div class="row">
            {{-- Card: Anggota --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow border-0"
                    style="background: linear-gradient(to right, #4facfe, #00f2fe); color: white;">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-0">User</h5>
                            <h2 class="fw-bold mb-0">{{ $jumlahAnggota }}</h2>
                            <small>Total pengguna</small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card: UKT Geup --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow border-0"
                    style="background: linear-gradient(to right, #43e97b, #38f9d7); color: white;">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-calendar-check fa-3x"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-0">UKT Geup</h5>
                            <h2 class="fw-bold mb-0">{{ $jumlahUjian }}</h2>
                            <small>Jumlah ujian diselenggarakan</small>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card: Peserta UKT --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow border-0"
                    style="background: linear-gradient(to right, #f7971e, #ffd200); color: white;">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-user-graduate fa-3x"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-0">Peserta UKT</h5>
                            <h2 class="fw-bold mb-0">{{ $jumlahPeserta }}</h2>
                            <small>Total peserta yang ikut UKT</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
