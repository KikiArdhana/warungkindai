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
                Forms\Components\TextInput::make('nama_level')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('min_poin')
                    ->required()
                    ->numeric()
                    ->maxLength(10),

                Forms\Components\TextInput::make('max_poin')
                    ->required()
                    ->numeric()
                    ->maxLength(10),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Level::with('diskon')) // Eager load diskon relasi
            ->columns([
                TextColumn::make('id_level')->label('ID Level'),
                TextColumn::make('nama_level')->label('Nama Level'),
                TextColumn::make('min_poin')->label('Min Poin'),
                TextColumn::make('max_poin')->label('Max Poin'),
                // Menampilkan diskon yang tersedia untuk level tersebut
                TextColumn::make('diskon.diskon')->label('Diskon (%)')
                    ->getStateUsing(function (Level $record) {
                        return optional($record->diskon)->diskon ?? 'Tidak ada'; // Menggunakan optional untuk menghindari error jika diskon tidak ada
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
