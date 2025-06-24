<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NavbarResource\Pages;
use App\Models\Navbar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NavbarResource extends Resource
{
    protected static ?string $model = Navbar::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3-bottom-left';
    protected static ?string $navigationLabel = 'Navbar';
    protected static ?string $modelLabel = 'Navbar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Grid::make(2)->schema([
                        TextInput::make('navbar.id')
                            ->label('Navbar Indonesia')
                            ->required()
                            ->placeholder('Masukan navbar...'),
                        TextInput::make('navbar.en')
                            ->label('Navbar English')
                            ->required()
                            ->placeholder('Enter navbar...'),
                    ]),
                    TextInput::make('slug')
                        ->unique(ignoreRecord: true)
                        ->placeholder("Contoh: 'about', 'contact'"),
                    TextInput::make('urutan')
                        ->numeric()
                        ->label('Urutan Tampil')
                        ->required()
                        ->placeholder('Urutan navbar...'),
                ])
            ]); 
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('navbar.id')->label('Navbar (ID)')->sortable(),
                Tables\Columns\TextColumn::make('navbar.en')->label('Navbar (EN)')->sortable(),
                Tables\Columns\TextColumn::make('slug')->sortable(),
                Tables\Columns\TextColumn::make('urutan')->sortable(),
            ])
            ->defaultSort('urutan')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNavbars::route('/'),
            'create' => Pages\CreateNavbar::route('/create'),
            'edit' => Pages\EditNavbar::route('/{record}/edit'),
        ];
    }
}

