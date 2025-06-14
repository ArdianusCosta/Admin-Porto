<?php

namespace App\Filament\Resources\BahasaProgramResource\Pages;

use App\Filament\Resources\BahasaProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBahasaProgram extends EditRecord
{
    protected static string $resource = BahasaProgramResource::class;

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }
}
