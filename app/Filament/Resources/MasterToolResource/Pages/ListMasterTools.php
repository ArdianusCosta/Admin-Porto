<?php

namespace App\Filament\Resources\MasterToolResource\Pages;

use App\Filament\Resources\MasterToolResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterTools extends ListRecords
{
    protected static string $resource = MasterToolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
