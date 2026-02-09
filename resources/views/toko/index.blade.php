@extends('layouts.dashboard')

@section('title', 'Toko')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
            <h4>DATA TOKO</h4>
        </div>

        <div class="card-body">

            <a href="{{ route('toko.create') }}" class="btn btn-success mb-3">
                + Tambah Toko
            </a>

            <table class="table table-bordered table-striped table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Toko</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($toko as $item)
                    <tr>
                        <td>{{ $item->id_toko }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            <a href="{{ route('toko.edit', $item->id_toko) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('toko.destroy', $item->id_toko) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if ($toko->isEmpty())
                    <tr>
                        <td colspan="6">Data masih kosong</td>
                    </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
</body>
</html>

@endsection
