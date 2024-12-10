<!-- resources/views/transaksi/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Buat Transaksi Baru</h1>

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_pegawai">Pegawai</label>
            <input type="text" name="id_pegawai" id="id_pegawai" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
        </div>

        <!-- Tambahkan elemen form lainnya sesuai kebutuhan -->

        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
    </form>
@endsection
