<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    FileUpload::make('foto_project')->required()->label('Foto Project')->placeholder('Masukan foto project anda...')->columnSpanFull()->disk('public')->directory('project')->image(),
                    TextInput::make('judul_project')->required()->label('Judul Project')->placeholder('Masukan judul project...'),
                    Select::make('bahasa')
                    ->relationship('bahasa', 'bahasa_pemrograman')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Bahasa Program'),
                    RichEditor::make('isi_project')->required()->label('Isi Project')->placeholder('Masukan isi project...')->columnSpanFull(),
                    TextInput::make('url_project')->url()->label('URL Project')->required()->placeholder('Masukan URL project...'),
                    TextInput::make('urutan_project')->required()->label('Urutan Project')->numeric()->placeholder('Ketikan urutan project...'),
                ])
                ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto_project')->disk('public'),
                TextColumn::make('judul_project')->searchable()->sortable(),
                TextColumn::make('isi_project')->sortable()->searchable()->label('Isi')->limit(50)->wrap()->formatStateUsing(fn($state) => strip_tags($state)),
                TextColumn::make('url_project')->searchable()->sortable(),
                TextColumn::make('urutan_project')->searchable()->sortable(),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
