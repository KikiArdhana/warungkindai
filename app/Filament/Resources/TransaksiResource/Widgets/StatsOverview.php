<?php

namespace App\Filament\Widgets;

use App\Models\Member;
use App\Models\Transaksi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // Fungsi untuk mengambil data transaksi
    protected function getStats(): array
    {
        // Mengambil jumlah transaksi total
        $totalMember = Member::count();
        $totalTransaksi = Transaksi::count();

        // Mengambil total pembelian (total_pembelian_akhir) dari semua transaksi
        $totalPendapatan = Transaksi::sum('total_pembelian_akhir');

        // Mengambil total diskon yang diberikan dalam transaksi
        $totalDiskon = Transaksi::sum('diskon');

        // Mengambil jumlah transaksi bulan ini
        $totalTransaksiBulanIni = Transaksi::whereMonth('tanggal_transaksi', now()->month)->count();

        // Mengambil total pembelian bulan ini
        $totalPendapatanBulanIni = Transaksi::whereMonth('tanggal_transaksi', now()->month)->sum('total_pembelian_akhir');

        return [

             // Statistik untuk total pendapatan
             Stat::make('Total Pendapatan', 'Rp ' . number_format($totalPendapatan, 0, ',', '.'))
             ->description('Total pendapatan dari semua transaksi')
             ->icon('heroicon-o-currency-dollar')  // Ikon untuk pendapatan
             ->color('success'),

               // Statistik untuk total pendapatan bulan ini
            Stat::make('Pendapatan Bulan Ini', 'Rp ' . number_format($totalPendapatanBulanIni, 0, ',', '.'))
            ->description('Total pendapatan bulan ini')
            ->icon('heroicon-o-currency-dollar')  // Ikon untuk pendapatan bulan ini
            ->color('success'),

             // Statistik untuk jumlah transaksi
             Stat::make('Total Transaksi', $totalTransaksi)
             ->description('Jumlah transaksi saat ini')
             ->icon('heroicon-o-shopping-cart')  // Ikon untuk transaksi
             ->color('secondary'),

              // Statistik untuk jumlah transaksi bulan ini
            Stat::make('Transaksi Bulan Ini', $totalTransaksiBulanIni)
            ->description('Jumlah transaksi bulan ini')
            ->icon('heroicon-o-calendar')  // Ikon untuk transaksi bulan ini
            ->color('info'),

            // Statistik untuk jumlah member
            Stat::make('Member', $totalMember)
                ->description('Total member')
                ->icon('heroicon-o-users')  // Ikon untuk member
                ->color('warning'),
           
            // Statistik untuk total diskon
            Stat::make('Total Diskon', number_format($totalDiskon, 0, ',', '.') . '%')
            ->description('Total diskon yang diberikan')
            ->icon('heroicon-o-tag')  // Ikon untuk diskon
            ->color('primary'),
        
           

          
        ];
    }
}
