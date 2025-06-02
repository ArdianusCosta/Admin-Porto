<?php

namespace App\Filament\Resources\ContactPesanResource\Pages;

use App\Filament\Resources\ContactPesanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactPesans extends ListRecords
{
    protected static string $resource = ContactPesanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
