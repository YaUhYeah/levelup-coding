<?php

namespace App\Filament\Resources\ServiceAgreementResource\Pages;

use App\Filament\Resources\ServiceAgreementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServiceAgreement extends EditRecord
{
    protected static string $resource = ServiceAgreementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
