<?php

namespace App\Filament\Resources\ProjectCostaResource\Pages;

use App\Filament\Resources\ProjectCostaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectCosta extends EditRecord
{
    protected static string $resource = ProjectCostaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
