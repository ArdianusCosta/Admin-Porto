<?php

namespace App\Filament\Resources\HomeResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\RelationManagers\RelationManager;

class MotivasiRelationManager extends RelationManager
{
    protected static string $relationship = 'motivasi';

    public function canCreate(): bool
    {
        return false; 
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('foto_motivasi')
                ->disk('public')
                ->directory('motivasi')
                ->image()
                ->required()
                ->columnSpanFull(),
            Forms\Components\TextInput::make('motivasi')
                ->maxLength(255)
                ->required()
                ->columnSpanFull(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto_motivasi')->disk('public'),
                Tables\Columns\TextColumn::make('motivasi'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->visible(fn ($livewire) => $livewire->ownerRecord->motivasi === null), 
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }
}
