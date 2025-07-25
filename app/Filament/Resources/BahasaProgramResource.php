<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BahasaProgramResource\Pages;
use App\Filament\Resources\BahasaProgramResource\RelationManagers;
use App\Models\BahasaProgram;
use App\Models\Bprogram;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BahasaProgramResource extends Resource
{
    protected static ?string $model = Bprogram::class;

    protected static ?string $navigationIcon = 'heroicon-o-language';

    public static function getNavigationGroup(): ?string
    {
        return 'Master Data';
    }

    public static function getNavigationSort(): ?int
    {
        return 20;
    }

    public static function getNavigationLabel(): string
    {
        return 'Bahasa Program';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('bahasa_pemrograman')->required()->label('Bahasa Program')->placeholder('Masukan bahasa program anda...'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bahasa_pemrograman')->searchable()->sortable(),
            ])
            ->defaultSort('bahasa_pemrograman', 'asc')
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
            'index' => Pages\ListBahasaPrograms::route('/'),
            'create' => Pages\CreateBahasaProgram::route('/create'),
            'edit' => Pages\EditBahasaProgram::route('/{record}/edit'),
        ];
    }
}
