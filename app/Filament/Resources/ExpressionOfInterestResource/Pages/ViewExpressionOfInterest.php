<?php

namespace App\Filament\Resources\ExpressionOfInterestResource\Pages;

use App\Filament\Resources\ExpressionOfInterestResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewExpressionOfInterest extends ViewRecord
{
    protected static string $resource = ExpressionOfInterestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
