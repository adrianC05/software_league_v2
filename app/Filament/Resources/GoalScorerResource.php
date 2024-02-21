<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GoalScorerResource\Pages;
use App\Filament\Resources\GoalScorerResource\RelationManagers;
use App\Models\Game;
use App\Models\GoalScorer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\Summarizers\Count;
use Filament\Tables\Columns\Summarizers\Sum;
use Illuminate\Database\Query\Builder;
use Filament\Tables\Grouping\Group;

class GoalScorerResource extends Resource
{
    protected static ?string $model = GoalScorer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Estadísticas';
    protected static ?string $navigationLabel = 'Goleadores';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('player_id')
                    ->relationship('player', 'name')
                    ->label('Jugador')
                    ->searchable()
                    ->preload()
                    ->placeholder('Seleccione un jugador'),
                Forms\Components\Select::make('game_id')
                    ->relationship('game', 'id')
                    ->label('Partido')
                    ->searchable()
                    ->options(
                        Game::all()->mapWithKeys(function ($game) {
                            return [$game->id => $game->team1->name . ' vs ' . $game->team2->name];
                        })
                    )
                    ->preload()
                    ->placeholder('Seleccione un partido'),
                Forms\Components\TextInput::make('goals')
                    ->label('Goles')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                Group::make('player.name')
                    ->label('Goles anotados por jugador')
                    ->collapsible(),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('player.name')
                    ->label('Jugador')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('player.team.name')
                    ->label('Equipo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('game.team2.name')
                    ->label('Gol/es a')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('goals')
                    ->label('Goles')
                    ->numeric()
                    ->summarize(Sum::make()->label('Total'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de creación')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Fecha de actualización')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListGoalScorers::route('/'),
            //'create' => Pages\CreateGoalScorer::route('/create'),
            //'edit' => Pages\EditGoalScorer::route('/{record}/edit'),
        ];
    }
}
