<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiskonResource\Pages;
use App\Filament\Resources\DiskonResource\RelationManagers;
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
                TextColumn::make('nama_promo')->label('Nama Promo')
                ->searchable(),
                
            ])
            ->filters([
                // Tambahkan filter sesuai kebutuhan
            ])
            ->actions([
                Tables\Actions\EditAction::make(), // Aksi edit
                Tables\Actions\DeleteAction::make(), // Aksi edit
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Aksi bulk delete
                ]),
            ]);
    }
    


    public static function getRelations(): array
    {
        return [
            // Tambahkan relasi jika diperlukan
        ];
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
