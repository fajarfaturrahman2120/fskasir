@extends('layouts.dashboard')

@section('title','Menu')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            overflow-x: hidden;
            background-color: #f8f9fa;
        }

        /* Style untuk Sidebar */
        .sidebar {
            min-height: 100vh;
            width: 250px;
            background-color: #8a2be2;
            border-right: 1px solid #e3e6f0;
            transition: all 0.3s;
        }

        .sidebar .nav-link {
            color: #000000;
            padding: 15px 20px;
            font-weight: 500;
        }

        .sidebar .nav-link:hover {
            background-color: #f1f3f9;
            color: #2e59d9;
        }

        .sidebar .nav-link.active {
            color: #2e59d9;
            background-color: #eaecf4;
            border-left: 4px solid #2e59d9;
        }

        .main-content {
            width: 100%;

            /* CSS untuk memaksa 5 kolom */
            .menu-grid {
                display: grid;
                /* Membuat 5 kolom dengan lebar yang sama (1fr) */
                grid-template-columns: repeat(5, 1fr);
                gap: 20px;
                /* Jarak antar kartu */
                margin-top: 20px;
            }

            /* Penyesuaian agar kartu terlihat bagus */
            .menu-grid .card {
                transition: transform 0.2s;
                border-radius: 12px;
            }

            .menu-grid .card:hover {
                transform: translateY(-5px);
            }

            /* Responsif: Jika layar kecil (HP), otomatis jadi 2 kolom agar tidak sempit */
            @media (max-width: 992px) {
                .menu-grid {
                    grid-template-columns: repeat(3, 1fr);
                }
            }

            @media (max-width: 576px) {
                .menu-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }
        }
    </style>
</head>

<body>



    <div class="d-flex">


    <div class="main-content p-4">
    <div class="container-fluid">
       <h3 class="fw-bold">Toko {{ $toko->name }}</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Owner</a></li>
                <li class="breadcrumb-item"  ><a href="{{route('dashboard')}}">Toko</a> </li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>

        <div class="menu-grid">

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-archive-fill fs-1"></i>
                        </div>
                        <h6 class="text-dark">Aset Toko</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-cash-stack fs-1"></i>
                        </div>
                        <h6 class="text-dark">Biaya Operasional</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-person-badge fs-1"></i>
                        </div>
                        <h6 class="text-dark">Hutang Pihak lain</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-graph-up-arrow fs-1"></i>
                        </div>
                        <h6 class="text-dark">Grafik</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-arrow-left-right fs-1"></i>
                        </div>
                        <h6 class="text-dark">Kas Keluar Masuk</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-credit-card-2-front fs-1"></i>
                        </div>
                        <h6 class="text-dark">Kasbon</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-person-vcard fs-1"></i>
                        </div>
                        <h6 class="text-dark">Kasir</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-cart vcard fs-1"></i>
                        </div>
                        <h6 class="text-dark">Keranjang</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-currency-dollar vcard fs-1"></i>
                        </div>
                        <h6 class="text-dark">Modal Kas</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-person-bounding-box vcard fs-1"></i>
                        </div>
                        <h6 class="text-dark">Member</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-cash vcard fs-1"></i>
                        </div>
                        <h6 class="text-dark">Neraca</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-bookmark-fill vcard fs-1"></i>
                        </div>
                        <h6 class="text-dark">Order Tersimpan</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-wallet2 vcard fs-1"></i>
                        </div>
                        <h6 class="text-dark">Pendapatan Lain</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-currency-euro vcard fs-1"></i>
                        </div>
                        <h6 class="text-dark">Pengeluaran</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-shop vcard fs-1"></i>
                        </div>
                        <h6 class="text-dark">Produk</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-wrench vcard fs-1"></i>
                        </div>
                        <h6 class="text-dark">Pengaturan</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-people-fill vcard fs-1"></i>
                        </div>
                        <h6 class="text-dark">Supplier</h6>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="card h-100 text-center shadow-sm border-0 py-4">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="bi bi-receipt vcard fs-1"></i>
                        </div>
                        <h6 class="text-dark">Tansaksi</h6>
                    </div>
                </div>
            </a>

            </div>
         </div>
        </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection
