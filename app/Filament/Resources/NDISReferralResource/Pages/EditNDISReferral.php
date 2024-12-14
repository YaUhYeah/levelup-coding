<?php

namespace App\Filament\Resources\NDISReferralResource\Pages;

use App\Filament\Resources\NDISReferralResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNDISReferral extends EditRecord
{
    protected static string $resource = NDISReferralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
