<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
        }
        .login-card {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card login-card shadow-lg border-0" style="width: 100%; max-width: 420px;">
        <div class="card-body p-4">

            <h3 class="text-center fw-bold mb-4">LOGIN</h3>

            {{-- Alert Error --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.proses') }}">
                @csrf=

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Masukkan Email"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Masukkan Password"
                           required>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    Login
                </button>

                <p class="text-center mt-3 mb-0">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="fw-semibold">
                        Daftar
                    </a>
                </p>

            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
