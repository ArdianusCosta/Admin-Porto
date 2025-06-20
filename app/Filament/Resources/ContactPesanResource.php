<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactPesanResource\Pages;
use App\Filament\Resources\ContactPesanResource\RelationManagers;
use App\Models\ContactPesan;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactPesanResource extends Resource
{
    protected static ?string $model = ContactPesan::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    public static function getNavigationLabel(): string
    {
        return 'List Contact';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                ->label('Nama Pengirim')
                ->sortable()
                ->searchable(),
                TextColumn::make('email')
                ->label('Email Pengirim')
                ->sortable()
                ->searchable(),
                TextColumn::make('judul')
                ->label('Judul')
                ->sortable()
                ->searchable(),
                TextColumn::make('pesan')
                ->label('Isi Pesan')
                ->sortable()
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListContactPesans::route('/'),
        ];
    }
}
