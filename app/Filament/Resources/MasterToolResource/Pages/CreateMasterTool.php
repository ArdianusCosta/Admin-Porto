<?php

namespace App\Filament\Resources\MasterToolResource\Pages;

use App\Filament\Resources\MasterToolResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMasterTool extends CreateRecord
{
    protected static string $resource = MasterToolResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
