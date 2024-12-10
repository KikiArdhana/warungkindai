@extends('filament::layouts.app')

@section('content')
    <div class="filament-form">
        <h1>Form Transaksi Kustom</h1>

        <form method="POST" action="{{ route('filament.transaksis.store') }}">
            @csrf
            <div class="form-group">
                <label for="id_pegawai">Pegawai</label>
                <input type="text" name="id_pegawai" id="id_pegawai" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
