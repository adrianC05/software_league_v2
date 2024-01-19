<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayerSanctionResource\Pages;
use App\Filament\Resources\PlayerSanctionResource\RelationManagers;
use App\Models\PlayerSanction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlayerSanctionResource extends Resource
{
    protected static ?string $model = PlayerSanction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Contabilidad';
    protected static ?string $navigationLabel = 'Sanciones de jugadores';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('player_id')
                    ->relationship('player', 'name')
                    ->searchable()
                    ->preload()
                    ->placeholder('Seleccione un jugador'),
                Forms\Components\Select::make('type_sanction_id')
                    ->relationship('typeSanction', 'name')
                    ->searchable()
                    ->preload()
                    ->placeholder('Seleccione el jugador sancionado'),
                Forms\Components\Toggle::make('status'),
                Forms\Components\DatePicker::make('date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('player.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('player.team.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('typeSanction.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListPlayerSanctions::route('/'),
            //'create' => Pages\CreatePlayerSanction::route('/create'),
            //'edit' => Pages\EditPlayerSanction::route('/{record}/edit'),
        ];
    }
}
