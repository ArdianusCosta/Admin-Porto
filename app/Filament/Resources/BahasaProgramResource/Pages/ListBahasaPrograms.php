<?php

namespace App\Filament\Resources\BahasaProgramResource\Pages;

use App\Filament\Resources\BahasaProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBahasaPrograms extends ListRecords
{
    protected static string $resource = BahasaProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
