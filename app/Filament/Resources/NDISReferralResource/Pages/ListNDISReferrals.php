<?php

namespace App\Filament\Resources\NDISReferralResource\Pages;

use App\Filament\Resources\NDISReferralResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNDISReferrals extends ListRecords
{
    protected static string $resource = NDISReferralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
