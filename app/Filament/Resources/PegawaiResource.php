<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PegawaiResource\Pages;
use App\Models\Pegawai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Pegawai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Input untuk nama_kasir
                Forms\Components\TextInput::make('nama_kasir') // Pastikan nama field sesuai dengan kolom di tabel
                    ->required() // Menjadikannya wajib
                    ->maxLength(255), // Tentukan panjang maksimum jika perlu
                
                  
            Forms\Components\TextInput::make('role') // Tambahkan field role
            ->required() // Menjadikannya wajib
            ->maxLength(100), // Atur panjang maksimum sesua
                // Tambahkan field lain sesuai kebutuhan
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_pegawai')->label('ID Pegawai') // Menampilkan ID pegawai
                ->searchable(),
                TextColumn::make('nama_kasir')->label('Nama Pegawai') // Menampilkan Nama Kasir
                ->searchable(),
                TextColumn::make('role')->label('Role') // Menampilkan Email
                ->searchable(),
                
            
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
            'index' => Pages\ListPegawais::route('/'),
            'create' => Pages\CreatePegawai::route('/create'),
            'edit' => Pages\EditPegawai::route('/{record}/edit'),
        ];
    }
}
