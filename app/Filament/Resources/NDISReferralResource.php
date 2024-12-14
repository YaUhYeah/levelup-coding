<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NDISReferralResource\Pages;
use App\Models\NDISReferral;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NDISReferralResource extends Resource
{
    protected static ?string $model = NDISReferral::class;

    protected static ?string $navigationIcon = "heroicon-o-user-group";

    protected static ?string $navigationLabel = "NDIS Referrals";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make("Personal Information")
                    ->schema([
                        Forms\Components\TextInput::make("first_name")
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make("last_name")
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make("email")
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make("phone")
                            ->tel()
                            ->required()
                            ->maxLength(20),
                        Forms\Components\TextInput::make("ndis_number")
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make("date_of_birth")
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make("Support Details")
                    ->schema([
                        Forms\Components\Textarea::make("support_needs")
                            ->required()
                            ->rows(3),
                        Forms\Components\Textarea::make("goals")
                            ->required()
                            ->rows(3),
                    ]),

                Forms\Components\Section::make("Referrer Information")
                    ->schema([
                        Forms\Components\TextInput::make("referrer_name")
                            ->maxLength(255),
                        Forms\Components\TextInput::make("referrer_organization")
                            ->maxLength(255),
                        Forms\Components\TextInput::make("referrer_phone")
                            ->tel()
                            ->maxLength(20),
                        Forms\Components\TextInput::make("referrer_email")
                            ->email()
                            ->maxLength(255),
                    ])->columns(2),

                Forms\Components\Textarea::make("notes")
                    ->rows(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("first_name")
                    ->searchable(),
                Tables\Columns\TextColumn::make("last_name")
                    ->searchable(),
                Tables\Columns\TextColumn::make("email")
                    ->searchable(),
                Tables\Columns\TextColumn::make("phone")
                    ->searchable(),
                Tables\Columns\TextColumn::make("ndis_number")
                    ->searchable(),
                Tables\Columns\TextColumn::make("created_at")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make("updated_at")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
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
            "index" => Pages\ListNDISReferrals::route("/"),
            "create" => Pages\CreateNDISReferral::route("/create"),
            "edit" => Pages\EditNDISReferral::route("/{record}/edit"),
        ];
    }
}
