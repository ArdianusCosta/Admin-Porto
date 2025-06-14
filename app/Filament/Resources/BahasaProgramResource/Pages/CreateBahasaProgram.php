<?php

namespace App\Filament\Resources\BahasaProgramResource\Pages;

use App\Filament\Resources\BahasaProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBahasaProgram extends CreateRecord
{
    protected static string $resource = BahasaProgramResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
