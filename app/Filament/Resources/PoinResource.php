<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PoinResource\Pages;
use App\Models\Poin;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PoinResource extends Resource
{
    protected static ?string $model = Poin::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Poin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_pelanggan')
                    ->required()
                    ->label('ID Pelanggan')
                    ->numeric(),

                Forms\Components\TextInput::make('jumlah_poin')
                    ->required()
                    ->label('Jumlah Poin')
                    ->numeric(),

                Forms\Components\DatePicker::make('tanggal_diberikan')
                    ->required()
                    ->label('Tanggal Diberikan'),

                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_poin')
                    ->label('ID Poin')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('id_pelanggan')
                    ->label('ID Pelanggan')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('jumlah_poin')
                    ->label('Jumlah Poin')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal_diberikan')
                    ->label('Tanggal Diberikan')
                    ->date(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime(),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Tanggal Diperbarui')
                    ->dateTime(),
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
            'index' => Pages\ListPoins::route('/'),
            'create' => Pages\CreatePoin::route('/create'),
            'edit' => Pages\EditPoin::route('/{record}/edit'),
        ];
    }
}
