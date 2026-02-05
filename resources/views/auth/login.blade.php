</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-lg" style="width: 100%; max-width: 420px;">
        <div class="card-body p-4">

            <h3 class="text-center mb-4">LOGIN</h3>



            <form method="POST" action="{{ route('login.proses') }}">
                @csrf
            <div class=" mb-3">
            <label for="">EMAIL</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required><br>
            </div>
            <div class="mb-3">
            <label for="">PASSWORD</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required><br>
            </div>
                <button type="submit" class="btn btn-success w-100">Login</button>

                <p class="text-center mt-3 mb-0">
                    Sudah punya akun? <a href="{{ route('register') }}">register</a>
                </p>

            </form>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
