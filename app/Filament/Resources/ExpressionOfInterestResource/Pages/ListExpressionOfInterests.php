<?php

namespace App\Filament\Resources\ExpressionOfInterestResource\Pages;

use App\Filament\Resources\ExpressionOfInterestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExpressionOfInterests extends ListRecords
{
    protected static string $resource = ExpressionOfInterestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
