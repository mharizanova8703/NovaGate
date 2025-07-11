<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'User Reviews';
    protected static ?string $pluralModelLabel = 'Reviews';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Textarea::make('content')
                ->label('Review Content')
                ->rows(5)
                ->disabled(),

            Forms\Components\TextInput::make('tmdb_id')
                ->label('TMDB Movie ID')
                ->disabled(),

            Forms\Components\Toggle::make('is_approved')
                ->label('Approved'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('user.name')
                ->label('User')
                ->searchable(),

            Tables\Columns\TextColumn::make('tmdb_id')
                ->label('TMDB ID'),

            Tables\Columns\TextColumn::make('content')
                ->label('Review')
                ->limit(60),

            Tables\Columns\IconColumn::make('is_approved')
                ->label('Approved')
                ->boolean(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Submitted')
                ->dateTime(),
        ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_approved')
                    ->label('Approval Status')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
