<?php
namespace App\Filament\Resources;

use App\Filament\Resources\LevelResource\Pages;
use App\Models\Level;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class LevelResource extends Resource
{
    protected static ?string $model = Level::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Level';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_level') // Input untuk nama_level
                    ->required() // Pastikan ini diisi
                    ->maxLength(255), // Atur panjang maksimum sesuai kebutuhan

                Forms\Components\TextInput::make('min_poin') // Input untuk min_poin
                    ->required() // Pastikan ini diisi
                    ->numeric() // Mengatur input sebagai numeric
                    ->maxLength(10), // Atur panjang maksimum sesuai kebutuhan

                Forms\Components\TextInput::make('max_poin') // Input untuk max_poin
                    ->required() // Pastikan ini diisi
                    ->numeric() // Mengatur input sebagai numeric
                    ->maxLength(10), // Atur panjang maksimum sesuai kebutuhan
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_level')->label('ID Level'), // Menampilkan ID level
                TextColumn::make('nama_level')->label('Nama Level'), // Menampilkan Nama Level
                TextColumn::make('min_poin')->label('Min Poin'), // Menampilkan Min Poin
                TextColumn::make('max_poin')->label('Max Poin'), // Menampilkan Max Poin
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
            'index' => Pages\ListLevels::route('/'),
            'create' => Pages\CreateLevel::route('/create'),
            'edit' => Pages\EditLevel::route('/{record}/edit'),
        ];
    }
}
