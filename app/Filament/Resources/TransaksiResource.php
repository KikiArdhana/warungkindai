<?php

namespace App\Filament\Resources;

use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Layout;
use App\Filament\Exports\TransaksiExporter;
use App\Filament\Resources\TransaksiResource\Pages;
use App\Models\Transaksi;
use App\Models\Menu;
use App\Models\Member;
use Filament\Actions\DeleteAction;
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
use Filament\Tables\Actions\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Barryvdh\DomPDF\Facade\Pdf;


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
                            ->searchable()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                $member = Member::find($state);
                                if ($member && $member->level) {
                                    $set('diskon', $member->level->diskon->diskon);
                                }
                            }),

                        DatePicker::make('tanggal_transaksi')
                            ->label('Tanggal Transaksi')
                            ->default(Carbon::today())
                            ->disabled(),
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
                            ->readonly()
                            ->numeric()
                            ->required()
                            ->reactive(),

                        TextInput::make('diskon')
                            ->label('Diskon (%)')
                            ->readonly()
                            ->numeric()
                            ->reactive(),

                        TextInput::make('total_pembelian_akhir')
                            ->label('Total Pembelian Setelah Diskon (Manual)')
                            ->numeric()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                $totalPembelian = $get('total_pembelian') ?? 0;
                                $diskon = $get('diskon') ?? 0;

                                $totalAkhir = $totalPembelian - ($totalPembelian * ($diskon / 100));
                                $set('total_pembelian_akhir', $totalAkhir);
                            }),

                        TextInput::make('uang_diterima')
                            ->label('Uang Diterima')
                            ->numeric()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                $totalAkhir = $get('total_pembelian_akhir');
                                if ($state >= $totalAkhir) {
                                    $set('kembalian', $state - $totalAkhir); // Calculate change (kembalian)
                                }
                            }),


                        TextInput::make('kembalian')
                            ->label('Kembalian')
                            ->numeric()
                            ->disabled(),

                        TextInput::make('total_poin')
                            ->label('Total Poin')
                            ->numeric()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                $totalPembelianAkhir = $get('total_pembelian_akhir');
                                if ($totalPembelianAkhir >= 1000) { // Poin hanya dihitung jika lebih dari 1000
                                    $poin = floor($totalPembelianAkhir / 1000); // Hitung poin berdasarkan pembelian akhir
                                    $set('total_poin', $poin); // Set nilai poin
                                } else {
                                    $set('total_poin', 0); // Jika kurang dari 1000, set poin menjadi 0
                                }
                            }),

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

            TextColumn::make('total_pembelian')
                ->label('Total Pembelian')
                ->money('IDR')
                ->sortable(),


            //     TextColumn::make('uang_diterima')
            //     ->label('Uang Diterima')
            //     ->money('IDR')
            //     ->sortable(),

            // TextColumn::make('kembalian')
            //     ->label('Kembalian')
            //     ->money('IDR')
            //     ->sortable(),

            TextColumn::make('diskon')
                ->label('Diskon (%)')
                ->sortable(),


            TextColumn::make('total_pembelian_akhir')
                ->label('Total Pembelian Akhir')
                ->money('IDR')
                ->sortable(),

            TextColumn::make('metode_pembayaran')
                ->label('Metode Pembayaran')
                ->sortable(),


            TextColumn::make('tanggal_transaksi')
                ->label('Tanggal')
                ->date()
                ->sortable(),


        ])
            ->defaultSort('tanggal_transaksi', 'desc')
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('exportPdf')
                    ->label('Export PDF')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function ($record) {
                        return static::exportToPdf($record);
                    }),


            ])
            ->filters([

                Filter::make('bulan_terkini')
                    ->label('Transaksi Bulan ' . now()->translatedFormat('F')) // Nama bulan saat ini
                    ->default()
                    ->query(function ($query) {
                        $currentMonth = now()->month; // Mendapatkan bulan saat ini
                        $currentYear = now()->year;  // Mendapatkan tahun saat ini
                        return $query->whereMonth('tanggal_transaksi', $currentMonth)
                            ->whereYear('tanggal_transaksi', $currentYear);
                    }),

                Filter::make('filter_bulan_lain')
                    ->label('Filter Berdasarkan Bulan')
                    ->form([
                        Forms\Components\Select::make('bulan')
                            ->label('Bulan')
                            ->options([
                                '1' => 'Januari',
                                '2' => 'Februari',
                                '3' => 'Maret',
                                '4' => 'April',
                                '5' => 'Mei',
                                '6' => 'Juni',
                                '7' => 'Juli',
                                '8' => 'Agustus',
                                '9' => 'September',
                                '10' => 'Oktober',
                                '11' => 'November',
                                '12' => 'Desember',
                            ])
                            ->placeholder('Pilih Bulan'),

                        Forms\Components\TextInput::make('tahun')
                            ->label('Tahun')
                            ->numeric()
                            ->default(now()->year)
                            ->placeholder('Masukkan Tahun'),
                    ])
                    ->query(function ($query, $data) {
                        if (isset($data['bulan'])) {
                            $query->whereMonth('tanggal_transaksi', $data['bulan']);
                        }

                        if (isset($data['tahun'])) {
                            $query->whereYear('tanggal_transaksi', $data['tahun']);
                        }

                        return $query;
                    }),


                Filter::make('tanggal_transaksi')
                    ->form([
                        DatePicker::make('start_date')->label('Dari Tanggal'),
                        DatePicker::make('end_date')->label('Sampai Tanggal'),
                    ])
                    ->query(function ($query, $data) {
                        return $query
                            ->when($data['start_date'], fn($q) => $q->where('tanggal_transaksi', '>=', $data['start_date']))
                            ->when($data['end_date'], fn($q) => $q->where('tanggal_transaksi', '<=', $data['end_date']));
                    }),
                Filter::make('member.nama_pelanggan')
                    ->label('Nama Member')
                    ->form([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama')
                            ->placeholder('Masukkan nama member')
                    ])
                    ->query(function ($query, array $data) {
                        if (isset($data['name'])) {
                            return $query->whereHas('member', function ($subQuery) use ($data) {
                                $subQuery->where('nama_pelanggan', 'like', '%' . $data['name'] . '%');
                            });
                        }
                        return $query;
                    }),
                Filter::make('total_pembelian_akhir')
                    ->label('Total Pembelian >')
                    ->form([
                        Forms\Components\TextInput::make('amount')
                            ->label('Total pembelian')
                            ->numeric()
                            ->placeholder('Masukkan nilai minimal')
                    ])
                    ->query(function ($query, array $data) {
                        if (isset($data['amount'])) {
                            return $query->where('total_pembelian_akhir', '>', $data['amount']);
                        }
                        return $query;
                    })


            ])
            ->bulkActions([
                ExportBulkAction::make()
                    ->label('Export Excel')
                    ->icon('heroicon-o-document-chart-bar'), // Menambahkan ikon download


                Tables\Actions\BulkAction::make('exportBulkPdf')
                    ->label('Export PDF')
                    ->icon('heroicon-o-document')  // Menambahkan ikon download
                    ->action(function ($records) {
                        return static::exportBulkToPdf($records);
                    }),

                Tables\Actions\DeleteBulkAction::make()  // Tombol delete untuk aksi bulk



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

    protected static function exportToPdf($record)
    {
        $data = [
            'record' => $record->toArray(),
        ];

        $view = view('exports.transaksi', $data)->render();
        $view = mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');

        $pdf = Pdf::loadHTML($view);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'transaksi_' . $record->id . '.pdf');
    }
    protected static function exportBulkToPdf($records)
    {
        // Ambil ID transaksi yang relevan
        $recordIds = $records->pluck('id_transaksi');

        // Ambil transaksi dari database menggunakan whereIn
        $transaksis = Transaksi::whereIn('id_transaksi', $recordIds)->get();

        // Hitung total pembelian dari semua transaksi yang dipilih
        $totalPembelian = $transaksis->sum('total_pembelian_akhir'); // Menjumlahkan total pembelian

        // Kirim data transaksi dan total pembelian ke view
        $data = [
            'records' => $transaksis,
            'totalPembelian' => $totalPembelian, // Total pembelian yang dihitung
        ];

        // Render view untuk export PDF
        $view = view('exports.transaksi_bulk', $data)->render();
        $view = mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');

        // Generate PDF
        $pdf = Pdf::loadHTML($view);

        // Stream PDF ke browser
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'transaksi_bulk.pdf');
    }

    // Ambil jumlah transaksi untuk bulan ini (misalnya menggunakan Eloquent)
    public function getTransactionCount()
    {
        $currentMonth = now()->month;
        $transactionCount = \App\Models\Transaksi::whereMonth('created_at', $currentMonth)->count();

        return $transactionCount;
    }

    public static function afterCreate($record): void
    {
        // Mengambil total pembelian akhir yang sudah dihitung
        $totalPembelianAkhir = $record->total_pembelian_akhir;

        // Memastikan nilai total_pembelian_akhir valid
        if ($totalPembelianAkhir > 0) {
            // Menghitung poin berdasarkan total pembelian
            $poinBaru = intval($totalPembelianAkhir / 1000); // Misalnya 1 poin untuk setiap 1000 IDR

            // Menyimpan poin yang didapat di transaksi
            $record->total_poin = $poinBaru;
            $record->save();  // Pastikan perubahan disimpan

            // Mencari member terkait dengan transaksi
            $member = Member::find($record->id_pelanggan);

            if ($member) {
                // Menambahkan poin baru ke total poin member
                $member->increment('total_poin', $poinBaru);  // Menambahkan poin pada member

                // Menyimpan perubahan poin di tabel member
                $member->save();
            }
        }
    }
}
