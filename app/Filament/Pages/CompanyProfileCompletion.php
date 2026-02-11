<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;

class CompanyProfileCompletion extends Page implements HasForms
{
    use InteractsWithForms;
    
    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static string $view = 'filament.pages.company-profile-completion';
    
    protected static ?string $navigationGroup = 'User Management';
    
    protected static ?string $navigationLabel = 'Company Profile Completion';
    
    protected static ?int $navigationSort = 2;

    public ?array $data = [];

    public function mount(): void
    {
        $user = auth()->user();
        $this->form->fill([
            'name' => $user->name,
            'email' => $user->email,
            'company_name' => $user->company_name ?? '',
            'company_address' => $user->company_address ?? '',
            'company_phone' => $user->company_phone ?? '',
            'company_registration' => $user->company_registration ?? '',
            'brand_color' => $user->brand_color ?? '#10b981',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Company Information')
                    ->schema([
                        TextInput::make('company_name')
                            ->label('Company Name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('company_registration')
                            ->label('Company Registration Number')
                            ->maxLength(255),
                        TextInput::make('company_phone')
                            ->label('Company Phone')
                            ->tel()
                            ->maxLength(255),
                        Textarea::make('company_address')
                            ->label('Company Address')
                            ->rows(3)
                            ->maxLength(500),
                        TextInput::make('brand_color')
                            ->label('Brand Color')
                            ->type('color')
                            ->default('#10b981'),
                    ])->columns(2),
                    
                Section::make('Contact Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Contact Name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Contact Email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        
        $user = auth()->user();
        $user->update($data);

        Notification::make()
            ->title('Profile updated successfully')
            ->success()
            ->send();
    }
}
