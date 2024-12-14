<?php

namespace App\Filament\Resources\ServiceAgreementResource\Pages;

use App\Filament\Resources\ServiceAgreementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceAgreements extends ListRecords
{
    protected static string $resource = ServiceAgreementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
