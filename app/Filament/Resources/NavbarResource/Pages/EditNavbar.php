<?php

namespace App\Filament\Resources\NavbarResource\Pages;

use App\Filament\Resources\NavbarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNavbar extends EditRecord
{
    protected static string $resource = NavbarResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
