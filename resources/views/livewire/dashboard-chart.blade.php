<?php

namespace App\Filament\Pages;

use App\Filament\Resources\MemberResource\Widgets\TotalTransaksiWidget;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    // Mendefinisikan widget yang akan ditampilkan di dashboard
    protected function getWidgets(): array
    {
        return [
            TotalTransaksiWidget::class, // Menambahkan widget ke dashboard
        ];
    }
}
