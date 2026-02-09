<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body { overflow-x: hidden; background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; width: 250px; background-color: #8a2be2; border-right: 1px solid #e3e6f0; transition: all 0.3s; }
        .sidebar .nav-link { color: #000; padding: 15px 20px; font-weight: 500; }
        .sidebar .nav-link:hover { background-color: #f1f3f9; color: #2e59d9; }
        .sidebar .nav-link.active { color: #2e59d9; background-color: #eaecf4; border-left: 4px solid #2e59d9; }
        .main-content { width: 100%; }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-primary d-flex align-items-center" href="#">
                <i class="bi bi-eye-fill me-2 fs-4"></i> Yokasir
            </a>
            <div class="ms-auto">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                        Owner {{ Auth::user()->name }}
                        <span class="ms-2 bg-primary rounded-circle d-flex align-items-center justify-content-center"
                              style="width:32px;height:32px;">
                            <i class="bi bi-person-fill text-white"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        <li><a class="dropdown-item" href="/profile">Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="d-flex">
        <!-- SIDEBAR -->
        <div class="sidebar shadow-sm">
            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <i class="bi bi-grid-1x2-fill me-2"></i> Halaman Utama
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/toko">
                        <i class="bi bi-shop me-2"></i> Kelola Toko
                    </a>
                </li>
            </ul>
        </div>

        <!-- ISI HALAMAN -->
        <div class="main-content p-4">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
