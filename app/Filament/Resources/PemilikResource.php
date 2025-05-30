<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PemilikResource\Pages;
use App\Filament\Resources\PemilikResource\RelationManagers;
use App\Models\Pemilik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class PemilikResource extends Resource
{
    protected static ?string $model = Pemilik::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                ->label('Nama Pemilik')
                ->required(),
            TextInput::make('kontak')
                ->label('Nomor HP')
                ->tel()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('nama'),
            TextColumn::make('kontak'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPemiliks::route('/'),
            'create' => Pages\CreatePemilik::route('/create'),
            'edit' => Pages\EditPemilik::route('/{record}/edit'),
        ];
    }
}
