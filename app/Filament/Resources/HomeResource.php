<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Home;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\HomeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HomeResource\RelationManagers\MotivasiRelationManager;

class HomeResource extends Resource
{
    protected static ?string $model = Home::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function getNavigationLabel(): string
    {
        return 'Deskripsi';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Home';
    }
    
    public static function getNavigationSort(): ?int
    {
        return 1;
    }    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('judul')->required()->label('Judul Home')->placeholder('Hai, Kenalin Saya Costa...'),
                    RichEditor::make('isi')->required()->label('Isi Home')->placeholder('Masukan isi/deskripsi untuk di halaman home...'),
                    FileUpload::make('foto_home')->required()->label('Foto to Home')->disk('public')->directory('home')->image(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->searchable(),
                TextColumn::make('isi')->searchable()->limit(50)->wrap()->formatStateUsing(fn($state) => strip_tags($state)),
                ImageColumn::make('foto_home')->searchable()->disk('public'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            MotivasiRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomes::route('/'),
            'edit' => Pages\EditHome::route('/{record}/edit'),
        ];
    }
}
