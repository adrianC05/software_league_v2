<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypeSanctionResource\Pages;
use App\Filament\Resources\TypeSanctionResource\RelationManagers;
use App\Models\TypeSanction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TypeSanctionResource extends Resource
{
    protected static ?string $model = TypeSanction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Configuración';
    protected static ?string $navigationLabel = 'Tipos de sanciones';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->maxLength(255),
                Forms\Components\TextInput::make('suspended_games')
                    ->label('Juegos suspendidos')
                    ->numeric(),
                Forms\Components\TextInput::make('money_to_pay')
                    ->label('Dinero a pagar')
                    ->numeric(),
                Forms\Components\Textarea::make('description')
                    ->label('Descripción')
                    ->maxLength(255),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('suspended_games')
                    ->label('Juegos suspendidos')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('money_to_pay')
                    ->label('Dinero a pagar')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Descripción')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTypeSanctions::route('/'),
            //'create' => Pages\CreateTypeSanction::route('/create'),
            //'edit' => Pages\EditTypeSanction::route('/{record}/edit'),
        ];
    }
}
