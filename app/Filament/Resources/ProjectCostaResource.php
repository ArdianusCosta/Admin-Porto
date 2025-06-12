<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectCostaResource\Pages;
use App\Filament\Resources\ProjectCostaResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectCostaResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    FileUpload::make('foto_project')
                    ->required()
                    ->label('Foto Project')
                    ->columnSpanFull(),
                    TextInput::make('judul')
                    ->required()
                    ->label('judul')
                    ->placeholder('Masukan judul project...'),
                    Textarea::make('deskripsi_project')
                    ->required()
                    ->label('Deskripsi Project')
                    ->placeholder('Masukan deskripsi project...'),
                ])
                ->columnSpan('2')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListProjectCostas::route('/'),
            'create' => Pages\CreateProjectCosta::route('/create'),
            'edit' => Pages\EditProjectCosta::route('/{record}/edit'),
        ];
    }
}
