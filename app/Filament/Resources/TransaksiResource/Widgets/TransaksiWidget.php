<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class TransaksiChart extends ChartWidget
{
    protected static ?string $heading = 'Transaksi';

    protected function getData(): array
    {

        $transaksiBulanIni = Transaksi::select(
            DB::raw('MONTH(tanggal_transaksi) as bulan'),
            DB::raw('SUM(total_pembelian_akhir) as total')
        )
            ->groupBy(DB::raw('MONTH(tanggal_transaksi)'))
            ->orderBy('bulan', 'asc')
            ->get();


        $labels = [];
        $data = [];


        foreach ($transaksiBulanIni as $transaksi) {
            $labels[] = date('M', mktime(0, 0, 0, $transaksi->bulan, 10)); // Nama bulan
            $data[] = $transaksi->total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Transaksi',
                    'data' => $data,  // Data total pembelian per bulan
                    'borderColor' => 'rgb(75, 192, 192)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'fill' => true,
                ],
            ],
            'labels' => $labels, // Labels bulan
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Jenis chart bisa diubah sesuai kebutuhan, misal 'bar', 'line', dll.
    }
}
