@extends('layouts.dashboard')
@section('title', 'Index kategori')
@section('content')
    <div class="container-fluid py-3">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Data Kategori</h5>
                <a href="{{ route('kategori.create', $toko->id_toko) }}" class="btn btn-success">Tambah Kategori</a>
            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="table-responsive mb-3">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th width="60">ID</th>
                                <th>Kategori</th>
                                <th>Jenis Transaksi</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kategori as $k)
                                <tr>
                                    <td>{{ $k->id_kategori }}</td>
                                    <td>{{ $k->kategori }}</td>
                                    <td>{{ $k->jenis_transaksi }}</td>
                                    <td>

                                        <!-- EDIT -->
                                        <a href="{{ route('kategori.edit', [
                                            'id_toko' => $toko->id_toko,
                                            'id_kategori' => $k->id_kategori,
                                        ]) }}"
                                            class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <!-- DELETE -->
                                        <form
                                            action="{{ route('kategori.destroy', [
                                                'id_toko' => $toko->id_toko,
                                                'id_kategori' => $k->id_kategori,
                                            ]) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus kategori ini?')">
                                                Hapus
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Data masih kosong</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                <!-- Tombol kembali -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('produk.index', $toko->id_toko) }}" class="btn btn-secondary">
                        ← Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>


@endsection
