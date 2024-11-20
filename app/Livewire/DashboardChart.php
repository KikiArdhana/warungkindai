<?php

namespace App\Http\Livewire;

use Asantibanez\LivewireCharts\LivewireChart;
use Asantibanez\LivewireCharts\Models\BarChartModel;
use Livewire\Component;
use App\Models\Member;
use App\Models\Pegawai;
use App\Models\Transaksi;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class DashboardChart extends Component
{
    // In your Livewire Component

public function render()
{
    $columnChartModel = (new ColumnChartModel())
        ->setTitle('Expenses by Type')
        ->addColumn('Food', 100, '#f6ad55')
        ->addColumn('Shopping', 200, '#fc8181')
        ->addColumn('Travel', 300, '#90cdf4');

    return view('livewire.dashboard-chart', [
        'columnChartModel' => $columnChartModel
    ]);
}

}
