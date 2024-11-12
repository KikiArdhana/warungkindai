<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Models\Transaksi;
use App\Models\Pegawai;
use App\Models\Member;
use App\Models\Menu;
use App\Models\Poin;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'Transaksi';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('id_pegawai')
                    ->label('Pegawai')
                    ->relationship('pegawai', 'nama_kasir')
                    ->required(),

                Select::make('id_pelanggan')
                    ->label('Pelanggan')
                    ->relationship('member', 'nama_pelanggan')
                    ->required(),

                DatePicker::make('tanggal_transaksi')
                    ->label('Tanggal Transaksi')
                    ->required(),

                TextInput::make('total_pembelian')
                    ->label('Total Pembelian')
                    ->numeric()
                    ->required(),

                Select::make('metode_pembayaran')
                    ->label('Metode Pembayaran')
                    ->options([
                        'cash' => 'Cash',
                        'credit' => 'Credit',
                        'debit' => 'Debit',
                    ])
                    ->required(),

                Repeater::make('menu')
                    ->relationship('menu') // Relasi dengan model Menu
                    ->label('Produk')
                    ->schema([
                        Select::make('id_item')
                            ->label('Nama Produk')
                            ->options(Menu::all()->pluck('nama_item', 'id_item')->toArray())
                            ->required(),

                        TextInput::make('quantity')
                            ->label('Kuantitas')
                            ->numeric()
                            ->required(),
                    ])
                    ->columns(2)
                    ->createItemButtonLabel('Tambah Produk'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pegawai.nama_kasir')
                    ->label('Pegawai')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('member.nama_pelanggan')
                    ->label('Pelanggan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('tanggal_transaksi')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),

                TextColumn::make('total_pembelian')
                    ->label('Total Pembelian')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('metode_pembayaran')
                    ->label('Metode Pembayaran')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Aksi edit
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }

    // Fungsi untuk menghitung poin setelah transaksi
    protected static function afterCreate(Model $record): void
    {
        $poin = floor($record->total_pembelian / 1000); // Misal 1 poin untuk setiap 1000 IDR
        $member = Member::find($record->id_pelanggan);

        if ($poin > 0 && $member) {
            // Tambahkan poin ke member
            $member->increment('poin', $poin);
            $member->save();

            // Simpan poin ke tabel poin
            Poin::create([
                'id_pelanggan' => $member->id_pelanggan,
                'poin' => $poin,
                'tanggal' => $record->tanggal_transaksi,
            ]);
        }
    }
}
