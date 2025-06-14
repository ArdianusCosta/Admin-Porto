<?php

namespace App\Filament\Resources\ToolResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ToolpakaiRelationManager extends RelationManager
{
    protected static string $relationship = 'toolpakai';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul_tool')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Tool')
                    ->columns(2)
                    ->placeholder('Masukan nama Tool...'),
                Forms\Components\TextInput::make('urutan_tools')
                    ->required()
                    ->maxLength(255)
                    ->label('Urutan Tool')
                    ->columns(2)
                    ->placeholder('Ketikan urutan Tool...')
                    ->numeric(),
                RichEditor::make('deskripsi_tool')->required()->placeholder('Masukan deskripsi Tool...')->label('Deskripsi Tool')->columnSpanFull(),
                FileUpload::make('foto_tool')->required()->placeholder('Pilih foto tool...')->label('Foto Tool')->disk('public')->directory('tool')->image()->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('judul_tool')
            ->columns([
                Tables\Columns\TextColumn::make('judul_tool')->label('Nama Tool')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('urutan_tools')->label('Urutan Tool')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('deskripsi_tool')->label('Deskripsi Tool')->sortable()->searchable()->limit(50)->wrap()->formatStateUsing(fn($state) => strip_tags($state)),
                Tables\Columns\ImageColumn::make('foto_tool')->label('Foto Tool')->sortable()->searchable()->disk('public'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
