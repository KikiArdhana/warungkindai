<?php
namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Models\Transaksi;
use App\Models\Menu;
use App\Models\Member;
use App\Models\Poin;
use Filament\Forms;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'Transaksi';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Wizard::make([
                Wizard\Step::make('Umum')
                    ->schema([
                        Select::make('id_pegawai')
                            ->label('Pegawai')
                            ->relationship('pegawai', 'nama_kasir')
                            ->placeholder('Pilih nama pegawai')
                            ->required(),

                        Select::make('id_pelanggan')
                            ->label('Pelanggan')
                            ->relationship('member', 'nama_pelanggan')
                            ->placeholder('Pilih pelanggan (jika ada)')
                            ->searchable(),

                        DatePicker::make('tanggal_transaksi')
                            ->label('Tanggal Transaksi')
                            ->default(Carbon::today())
                            ->disabled()
                            ->extraAttributes(['class' => 'text-sm p-8']),
                    ]),
                    
                Wizard\Step::make('Menu')
                    ->schema([
                        Repeater::make('menu_items')
                            ->label('Daftar Menu')
                            ->schema([
                                Select::make('id_item')
                                    ->label('Nama Produk')
                                    ->searchable()
                                    ->options(Menu::all()->pluck('nama_item', 'id_item')->toArray())
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                        $menu = Menu::find($state);
                                        $harga = $menu ? $menu->harga : 0;
                                        $quantity = $get('quantity') ?? 1;
                                        $set('harga', $harga);
                                        $set('total_harga', $harga * $quantity);
                                    }),

                                TextInput::make('quantity')
                                    ->label('Jumlah')
                                    ->numeric()
                                    ->default(1)
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                        $harga = $get('harga');
                                        $set('total_harga', $harga * $state);
                                    }),

                                TextInput::make('harga')
                                    ->label('Harga Satuan')
                                    ->numeric()
                                    ->disabled(),

                                TextInput::make('total_harga')
                                    ->label('Total Harga')
                                    ->numeric()
                                    ->disabled(),
                            ])
                            ->columns(2)
                            ->addActionLabel('Tambah')
                            ->reactive()
                            ->afterStateUpdated(function (callable $set, $state) {
                                $total = collect($state)->sum(fn($item) => $item['total_harga'] ?? 0);
                                $set('total_pembelian', $total);
                            }),
                    ]),

                Wizard\Step::make('Bayar')
                    ->schema([
                        TextInput::make('total_pembelian')
                            ->label('Total Pembelian')
                            ->numeric()
                            ->disabled(),

                        Select::make('metode_pembayaran')
                            ->label('Metode Pembayaran')
                            ->options([
                                'cash' => 'Cash',
                                'credit' => 'Credit',
                                'debit' => 'Debit',
                            ])
                            ->required(),
                    ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
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
        ])->filters([])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }

    protected static function afterCreate($record): void
    {
        // Pastikan total pembelian disimpan ke database setelah transaksi selesai
        $totalPembelian = $record->total_pembelian;
        
        // Kalkulasi poin berdasarkan total pembelian
        $poin = floor($totalPembelian / 1000);
        $member = Member::find($record->id_pelanggan);

        // Tambahkan poin ke member jika ada
        if ($poin > 0 && $member) {
            $member->increment('poin', $poin);
            Poin::create([
                'id_pelanggan' => $member->id_pelanggan,
                'poin' => $poin,
                'tanggal' => $record->tanggal_transaksi,
            ]);
        }
    }
}
