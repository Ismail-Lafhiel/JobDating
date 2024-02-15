<?php

namespace App\Filament\Resources\IndustryFieldResource\Pages;

use App\Filament\Resources\IndustryFieldResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndustryField extends EditRecord
{
    protected static string $resource = IndustryFieldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
