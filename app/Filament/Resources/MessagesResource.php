<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessagesResource\Pages;
use App\Models\Messages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class MessagesResource extends Resource
{
    protected static ?string $model = Messages::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    
    protected static ?string $navigationLabel = 'Customer Messages';
    
    protected static ?string $navigationGroup = 'Communication';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Message Details')
                    ->schema([
                        Forms\Components\TextInput::make('user.name')
                            ->label('Customer Name')
                            ->disabled(),
                        Forms\Components\TextInput::make('user.email')
                            ->label('Customer Email')
                            ->disabled(),
                        Forms\Components\TextInput::make('subject')
                            ->label('Subject')
                            ->disabled()
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('message')
                            ->label('Message')
                            ->disabled()
                            ->rows(6)
                            ->columnSpanFull(),
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Pending',
                                'responded' => 'Responded',
                            ])
                            ->required(),
                        Forms\Components\Textarea::make('responseText')
                            ->label('Response Notes (Internal)')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject')
                    ->label('Subject')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Customer')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->icon('heroicon-o-envelope'),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'responded',
                    ])
                    ->icons([
                        'heroicon-o-clock' => 'pending',
                        'heroicon-o-check-circle' => 'responded',
                    ]),
                Tables\Columns\TextColumn::make('message')
                    ->label('Message')
                    ->limit(100)
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime('M d, Y H:i')
                    ->sortable()
                    ->since(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'responded' => 'Responded',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('markResponded')
                    ->label('Mark Responded')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->visible(fn (Messages $record) => $record->status === 'pending')
                    ->action(function (Messages $record) {
                        $record->update(['status' => 'responded']);
                        Notification::make()
                            ->title('Message marked as responded')
                            ->success()
                            ->send();
                    }),
                Tables\Actions\Action::make('replyEmail')
                    ->label('Reply')
                    ->icon('heroicon-o-envelope')
                    ->color('primary')
                    ->url(fn (Messages $record) => "mailto:{$record->user->email}?subject=Re: {$record->subject}")
                    ->openUrlInNewTab(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('markResponded')
                        ->label('Mark as Responded')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->action(function ($records) {
                            $records->each->update(['status' => 'responded']);
                            Notification::make()
                                ->title('Messages marked as responded')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMessages::route('/'),
            'view' => Pages\ViewMessages::route('/{record}'),
            'edit' => Pages\EditMessages::route('/{record}/edit'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count() ?: null;
    }
    
    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    /**
     * Allow all authenticated users to access this resource
     */
    public static function canAccess(): bool
    {
        return true;
    }
}
