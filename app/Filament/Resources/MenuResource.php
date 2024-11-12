<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Menu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_item')
                    ->required() // Pastikan ini wajib diisi
                    ->label('Nama Item') // Label untuk field ini
                    ->maxLength(255) // Maksimal panjang input
                    ->placeholder('Masukkan nama item'), // Placeholder untuk memberikan petunjuk

                Forms\Components\TextInput::make('harga')
                    ->required() // Pastikan ini wajib diisi
                    ->label('Harga') // Label untuk field ini
                    ->numeric() // Validasi sebagai numeric
                    ->placeholder('Masukkan harga item'), // Placeholder untuk memberikan petunjuk
          
                Forms\Components\TextInput::make('kategori')
                    ->required() // Pastikan ini wajib diisi
                    ->label('Kategori') // Label untuk field ini
                    ->maxLength(100) // Maksimal panjang input
                    ->placeholder('Masukkan kategori item'), // Placeholder untuk memberikan petunjuk
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_item')->label('ID Item'), // Menampilkan ID Item
                TextColumn::make('nama_item')->label('Nama Item'), // Menampilkan Nama Item
                TextColumn::make('harga')->label('Harga'), // Menampilkan Harga
                TextColumn::make('kategori')->label('Kategori'), // Menampilkan Kategori
            ])
            ->filters([
                // Tambahkan filter sesuai kebutuhan
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
            // Tambahkan relasi jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
