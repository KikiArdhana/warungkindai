<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
        }

        h1 {
            color: #ffffff; /* Rose-800 color */
            margin-bottom: 30px;
        }

        .table {
            background-color: #ffffff;
            border-radius: 8px;
        }

        .thead-dark {
            background-color: #FF8C00; /* Rose-800 color */
            color: #ffffff;
        }

        .table th, .table td {
            text-align: center;
            padding-top: 20px;
            padding-bottom: 10px;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }

        .container {
            margin-top: 50px;
        }

        footer {
            background-color: #AB3434; /* Rose-800 color */
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        header {
            background-color: #AB3434; /* Rose-800 color */
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .row {
            font-weight: bold;
            font-size: 16px;
            text-align: right;
            margin-top: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Laporan Transaksi</h1>
    </header>

    <div class="container">
        <!-- Tabel Responsif -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Pegawai</th>
                        <th>Pelanggan</th>
                        <th>Total Awal</th>
                        <th>Diskon</th>
                        <th>Total Pembelian Akhir</th>
                        <th>Metode Pembayaran</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <td>{{ $record->id_transaksi ?? 'Tidak tersedia' }}</td>
                            <td>{{ $record->pegawai->nama_kasir ?? 'Tidak tersedia' }}</td>
                            <td>{{ $record->member->nama_pelanggan ?? 'Tidak tersedia' }}</td>
                            <td>Rp{{ number_format($record->total_pembelian, 0, ',', '.') }}</td>
                            <td>Rp{{ number_format($record->diskon ?? 0, 0, ',', '.') }}</td>
                            <td>Rp{{ number_format($record->total_pembelian_akhir, 0, ',', '.') }}</td>
                            <td>{{ ucfirst($record->metode_pembayaran) }}</td>
                            <td>{{ $record->tanggal_transaksi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Menampilkan Total Pembelian Akhir -->
        <!-- Menampilkan Total Pembelian Akhir -->
<div class="row">
    <div class="col-md-12 d-flex justify-content-end">
        <h4>Total Pembelian Akhir: Rp{{ number_format($totalPembelian, 0, ',', '.') }}</h4>
    </div>
</div>

    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Laporan Transaksi | GoKindai</p>
    </footer>

    <!-- Link ke JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

