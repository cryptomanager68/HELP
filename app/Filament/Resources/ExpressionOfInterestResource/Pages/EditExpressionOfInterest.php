<?php

namespace App\Filament\Resources\ExpressionOfInterestResource\Pages;

use App\Filament\Resources\ExpressionOfInterestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExpressionOfInterest extends EditRecord
{
    protected static string $resource = ExpressionOfInterestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
