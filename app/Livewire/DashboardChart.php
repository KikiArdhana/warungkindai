<?php

namespace App\Http\Livewire;

use App\Filament\Widgets\BlogPostsChart;
use Livewire\Component;
use App\Filament\Widgets\StatsOverview; 
use App\Filament\Widgets\TransaksiChart; 
use App\Filament\Widgets\MemberChart; // Impor widget yang sudah dibuat

class Dashboard extends Component
{
    // Fungsi ini digunakan untuk menentukan widget yang akan ditampilkan di dashboard
    public function getWidgets(): array
    {
        return [
            StatsOverview::class,
            TransaksiChart::class,
          // Memanggil StatsOverview Widget
        ];
    }

    public function render()
    {
        return view('livewire.dashboard'); // Mengembalikan tampilan dashboard
    }
}

