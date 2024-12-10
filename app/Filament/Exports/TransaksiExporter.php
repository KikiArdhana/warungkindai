<?php

namespace App\Filament\Exports;

use App\Models\Transaksi;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class TransaksiExporter extends Exporter
{
    protected static ?string $model = Transaksi::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id_transaksi'),
            ExportColumn::make('id_pegawai'),
            ExportColumn::make('id_pelanggan'),
            ExportColumn::make('id_item'),
            ExportColumn::make('id_poin'),
            ExportColumn::make('tanggal_transaksi'),
            ExportColumn::make('total_pembelian'),
            ExportColumn::make('diskon'),
            ExportColumn::make('total_pembelian_akhir'),
            ExportColumn::make('metode_pembayaran'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
            ExportColumn::make('total_poin'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your transaksi export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
