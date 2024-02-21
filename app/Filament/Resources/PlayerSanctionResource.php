<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayerSanctionResource\Pages;
use App\Filament\Resources\PlayerSanctionResource\RelationManagers;
use App\Models\PlayerSanction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
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
                    ->label('Jugador')
                    ->searchable()
                    ->options(
                        \App\Models\Player::all()->mapWithKeys(function ($player) {
                            return [$player->id => $player->name . ' - ' . $player->team->name];
                        })
                    )
                    ->preload()
                    ->placeholder('Seleccione un jugador'),
                Forms\Components\Select::make('type_sanction_id')
                    ->relationship('typeSanction', 'name')
                    ->label('Tipo de sanción')
                    ->searchable()
                    ->preload()
                    ->placeholder('Seleccione el jugador sancionado'),
                Forms\Components\Toggle::make('status')
                    ->label('Estado'),
                Forms\Components\DatePicker::make('date')
                    ->label('Fecha')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('player.name')
                    ->label('Jugador')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('player.team.name')
                    ->label('Equipo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('typeSanction.name')
                    ->label('Tipo de sanción')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->label('Estado')
                    ->boolean(),
                Tables\Columns\TextColumn::make('date')
                    ->label('Fecha')
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
                    ExportBulkAction::make(),
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
