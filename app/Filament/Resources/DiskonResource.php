<?php
namespace App\Filament\Resources;

use App\Filament\Resources\DiskonResource\Pages;
use App\Models\Diskon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DiskonResource extends Resource
{
    protected static ?string $model = Diskon::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?string $navigationLabel = 'Diskon'; // Label untuk navigasi

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('syarat_pembelian') // Input untuk syarat pembelian
                    ->required(),
                
                Forms\Components\TextInput::make('diskon') // Input untuk diskon
                    ->numeric()
                    ->required(),
                
                Forms\Components\TextInput::make('nama_promo') // Input untuk nama promo
                    ->required()
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_promo')->label('ID Promo'),
                TextColumn::make('syarat_pembelian')->label('Syarat Pembelian'),
                TextColumn::make('diskon')->label('Diskon'),
                TextColumn::make('nama_promo')->label('Nama Promo'),
                // Menambahkan relasi ke level
                TextColumn::make('level.nama_level')->label('Level Tersedia')
                    ->getStateUsing(function (Diskon $record) {
                        return optional($record->level)->nama_level ?? 'Tidak Ada'; // Menampilkan level yang terkait
                    }),
            ])
            ->filters([
                // Tambahkan filter sesuai kebutuhan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDiskons::route('/'),
            'create' => Pages\CreateDiskon::route('/create'),
            'edit' => Pages\EditDiskon::route('/{record}/edit'),
        ];
    }
}
