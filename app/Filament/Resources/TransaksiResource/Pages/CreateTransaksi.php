<?php

namespace App\Filament\Resources\TransaksiResource\Pages;

use App\Filament\Resources\TransaksiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaksi extends CreateRecord
{
    protected static string $resource = TransaksiResource::class;

    protected function afterSave(): void
{
    $transaksi = $this->record; // Instance transaksi yang baru disimpan
    $menuItems = $this->form->getState()['menu_items'] ?? [];

    foreach ($menuItems as $menuItem) {
        $transaksi->items()->attach($menuItem['id_item'], [
            'subtotal_harga' => $menuItem['total_harga'],
            'quantity' => $menuItem['quantity'],
        ]);
    }
}

protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}



}
