<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\AboutMe;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AboutMeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AboutMeResource\RelationManagers;
use Filament\Forms\Components\RichEditor;

class AboutMeResource extends Resource
{
    protected static ?string $model = AboutMe::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationGroup = 'About Me';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('judul')->required()->placeholder('Masukan judul...')->label('Judul'),
                    TextInput::make('nama_isi')->required()->placeholder('Masukan nama isi untuk yang Berwarna...')->label('Nama yang Berwarna'),
                    RichEditor::make('isi')->required()->placeholder('Masukan isi...')->label('Isi')->columnSpanFull(),
                    FileUpload::make('foto_about_me')->required()->label('Foto About Me')->disk('public')->directory('about-me')->image()->columnSpanFull(),
                    TextInput::make('project_selesai')->numeric()->required()->placeholder('Ketikan angka project yang Anda selesaikan...')->label('Project Selesai'),
                    TextInput::make('tahun_pengalaman')->numeric()->required()->placeholder('Ketikan angka pengalaman Anda...')->label('Tahun Pengalaman'),
                ])
                ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->sortable()->searchable()->label('Judul'),
                TextColumn::make('nama_isi')->sortable()->searchable()->label('Nama yang Berwarna'),
                TextColumn::make('isi')->sortable()->searchable()->label('Isi')->limit(50)->wrap()->formatStateUsing(fn($state) => strip_tags($state)),
                ImageColumn::make('foto_about_me')->label('Foto About Me')->disk('public'),
                TextColumn::make('project_selesai')->label('Project Selesai')->sortable()->searchable(),
                TextColumn::make('tahun_pengalaman')->label('Tahun Pengalaman')->sortable()->searchable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutMes::route('/'),
            'edit' => Pages\EditAboutMe::route('/{record}/edit'),
        ];
    }
}
