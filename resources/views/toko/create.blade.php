@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Nama Toko</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
    <form action="{{route('toko.store')}}" method="POST">
    @csrf
    <label for="">Nama Toko</label>
    <input type="text" name="name" class="form-control" placeholder="Nama Toko Anda" required><br>
    <label for="">No Hp</label>
    <input type="number" name="no_hp" class="form-control" placeholder="No Hp Anda" required><br>
    <label for="">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password Anda" required><br>
    <label for="">Alamat Toko</label>
    <input type="text" name="alamat_toko" class="form-control" placeholder="Alamat" required><br>
    <label for="">Username</label>
    <input type="text" name="Username" class="form-control" placeholder="Username anda" required><br>
    <button type="submit" class="btn btn-success">Sumbit</button>
    <button type="reset" class="btn btn-danger">Reset</button>
    </form>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
@endsection
</body>

</html>

