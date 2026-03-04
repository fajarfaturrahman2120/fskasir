<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
        }
        .register-card {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card register-card shadow-lg border-0" style="width: 100%; max-width: 450px;">
        <div class="card-body p-4">

            <h3 class="text-center fw-bold mb-4">REGISTER</h3>

            {{-- Error Message --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.proses') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Shop Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           placeholder="Masukkan Nama Toko"
                           value="{{ old('name') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text"
                           name="username"
                           class="form-control"
                           placeholder="Masukkan Username"
                           value="{{ old('username') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Masukkan Email"
                           value="{{ old('email') }}"
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

                <div class="mb-3">
                    <label class="form-label">Ulangi Password</label>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Ulangi Password"
                           required>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    Register
                </button>

                <p class="text-center mt-3 mb-0">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="fw-semibold">
                        Login
                    </a>
                </p>

            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
