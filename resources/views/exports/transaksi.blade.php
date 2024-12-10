<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Transaksi</title>
    <!-- Link ke CDN Bootstrap -->
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
            text-align: center;
            background-color: #AB3434; /* Rose-800 color */
            padding: 20px 0;
        }

        .container {
            margin-top: 50px;
        }

        .table {
            background-color: #ffffff;
            border-radius: 8px;
        }

        .thead-dark {
            background-color: #FF8C00; /* Orange color */
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

        footer {
            background-color: #AB3434; /* Rose-800 color */
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .filter-info {
            background-color: #e7f4e7;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <h1>Detail Transaksi</h1>

    <!-- Informasi Filter -->
    <div class="container">
        <div class="filter-info">
            <h5>Filter yang Diterapkan:</h5>
            <ul>
                <li><strong>Pegawai:</strong> {{ $filter['pegawai'] ?? 'Semua Pegawai' }}</li>
                <li><strong>Metode Pembayaran:</strong> {{ $filter['metode_pembayaran'] ?? 'Semua Metode Pembayaran' }}</li>
                <li><strong>Tanggal Transaksi:</strong> {{ $filter['tanggal'] ?? 'Semua Tanggal' }}</li>
            </ul>
        </div>
    </div>

    <!-- Tabel Responsif -->
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Pegawai</th>
                        <th>Pelanggan</th>
                        <th>Total Pembelian Akhir</th>
                        <th>Metode Pembayaran</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $record['id_transaksi'] }}</td>
                        <td>{{ $record['pegawai']['nama_kasir'] ?? 'Tidak tersedia' }}</td>
                        <td>{{ $record['member']['nama_pelanggan'] ?? 'Tidak tersedia' }}</td>
                        <td>Rp{{ number_format($record['total_pembelian_akhir'], 0, ',', '.') }}</td>
                        <td>{{ ucfirst($record['metode_pembayaran']) }}</td>
                        <td>{{ $record['tanggal_transaksi'] }}</td>
                    </tr>
                </tbody>
            </table>
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
