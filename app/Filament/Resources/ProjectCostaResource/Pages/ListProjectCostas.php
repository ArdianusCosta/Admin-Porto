<?php

namespace App\Filament\Resources\ProjectCostaResource\Pages;

use App\Filament\Resources\ProjectCostaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectCostas extends ListRecords
{
    protected static string $resource = ProjectCostaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
