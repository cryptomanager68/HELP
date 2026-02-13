<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExpressionOfInterestResource\Pages;
use App\Models\ExpressionOfInterest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ExpressionOfInterestResource extends Resource
{
    protected static ?string $model = ExpressionOfInterest::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationLabel = 'Expressions of Interest';
    
    protected static ?string $modelLabel = 'Expression of Interest';
    
    protected static ?string $pluralModelLabel = 'Expressions of Interest';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Participant Information')
                    ->schema([
                        Forms\Components\Select::make('participant_type')
                            ->label('Participant Type')
                            ->options([
                                'equity_participant' => 'Equity Participant',
                                'property_owner' => 'Property Owner / Seller',
                            ])
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('full_name')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mobile_number')
                            ->label('Mobile Number')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email_address')
                            ->label('Email Address')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('best_time_to_call')
                            ->label('Best Time to Call')
                            ->maxLength(255),
                    ])->columns(2),
                    
                Forms\Components\Section::make('Location & Property Details')
                    ->schema([
                        Forms\Components\TextInput::make('general_location')
                            ->label('General Location (Suburb/Region)')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('approximate_equity')
                            ->label('Approximate Equity Available')
                            ->maxLength(255)
                            ->visible(fn ($get) => $get('participant_type') === 'equity_participant'),
                        Forms\Components\Select::make('property_type')
                            ->label('Property Type')
                            ->options([
                                'Residential' => 'Residential',
                                'Block of Flats' => 'Block of Flats',
                                'Development Site' => 'Development Site',
                                'Other' => 'Other',
                            ])
                            ->visible(fn ($get) => $get('participant_type') === 'property_owner'),
                        Forms\Components\TextInput::make('property_type_other')
                            ->label('Property Type (Other)')
                            ->maxLength(255)
                            ->visible(fn ($get) => $get('property_type') === 'Other'),
                        Forms\Components\TextInput::make('approximate_land_size')
                            ->label('Approximate Land Size')
                            ->maxLength(255)
                            ->visible(fn ($get) => $get('participant_type') === 'property_owner'),
                        Forms\Components\TextInput::make('current_use')
                            ->label('Current Use')
                            ->maxLength(255)
                            ->visible(fn ($get) => $get('participant_type') === 'property_owner'),
                    ])->columns(2),
                    
                Forms\Components\Section::make('Options Being Considered')
                    ->schema([
                        Forms\Components\Checkbox::make('option_outright_sale')
                            ->label('Outright Sale'),
                        Forms\Components\Checkbox::make('option_joint_venture')
                            ->label('Joint Venture'),
                        Forms\Components\Checkbox::make('option_syndicate')
                            ->label('Participation in Development Syndicate'),
                        Forms\Components\Checkbox::make('option_unsure')
                            ->label('Unsure - Exploring Options Only'),
                    ])
                    ->columns(2)
                    ->visible(fn ($get) => $get('participant_type') === 'property_owner'),
                    
                Forms\Components\Section::make('Acknowledgements')
                    ->schema([
                        Forms\Components\Checkbox::make('acknowledgement_1')
                            ->label('No financial, legal, or tax advice is provided')
                            ->required(),
                        Forms\Components\Checkbox::make('acknowledgement_2')
                            ->label('No recommendation has been made')
                            ->required(),
                        Forms\Components\Checkbox::make('acknowledgement_3')
                            ->label('Any structure or outcome is determined independently')
                            ->required(),
                        Forms\Components\Checkbox::make('acknowledgement_4')
                            ->label('Will seek own professional advice before proceeding')
                            ->required(),
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Submitted')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('participant_type')
                    ->label('Type')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'equity_participant' => 'Equity Participant',
                        'property_owner' => 'Property Owner',
                        default => $state,
                    })
                    ->colors([
                        'success' => 'equity_participant',
                        'primary' => 'property_owner',
                    ])
                    ->searchable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mobile_number')
                    ->label('Mobile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_address')
                    ->label('Email')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('general_location')
                    ->label('Location')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('property_type')
                    ->label('Property Type')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('acknowledgement_1')
                    ->label('Ack. Complete')
                    ->boolean()
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('participant_type')
                    ->label('Participant Type')
                    ->options([
                        'equity_participant' => 'Equity Participant',
                        'property_owner' => 'Property Owner',
                    ]),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Submitted From'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Submitted Until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ExportBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListExpressionOfInterests::route('/'),
            'create' => Pages\CreateExpressionOfInterest::route('/create'),
            'view' => Pages\ViewExpressionOfInterest::route('/{record}'),
            'edit' => Pages\EditExpressionOfInterest::route('/{record}/edit'),
        ];
    }

    /**
     * Allow all authenticated users to access this resource
     */
    public static function canAccess(): bool
    {
        return true;
    }
}
