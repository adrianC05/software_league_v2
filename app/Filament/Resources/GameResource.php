<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GameResource\Pages;
use App\Filament\Resources\GameResource\RelationManagers;
use App\Models\Game;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Configuración';
    protected static ?string $navigationLabel = 'Partidos';
    protected static ?int $navigationSort = 1;



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Información sobre las fechas')
                    ->compact()
                    ->schema([
                        Forms\Components\Select::make('round_id')
                            ->label('Ronda')
                            ->relationship('round', 'name')
                            ->required()
                            ->preload()
                            ->placeholder('Seleccione una ronda'),
                        Forms\Components\DatePicker::make('date')
                            ->label('Fecha')
                            ->required(),
                        Forms\Components\TimePicker::make('time')
                            ->label('Hora')
                            ->required(),
                    ])->columns(3),
                Forms\Components\Section::make('Información sobre el partido')
                    ->compact()
                    ->schema([
                        Forms\Components\Select::make('team1_id')
                            ->relationship('team1', 'name')
                            ->label('Equipo 1')
                            ->searchable()
                            ->required()
                            ->preload()
                            ->placeholder('Seleccione'),
                        Forms\Components\Select::make('team2_id')
                            ->relationship('team2', 'name')
                            ->label('Equipo 2')
                            ->searchable()
                            ->required()
                            ->preload()
                            ->placeholder('Seleccione'),

                        Forms\Components\TextInput::make('team1_goals')
                            ->label('Goles del equipo 1')
                            ->numeric(),
                        Forms\Components\TextInput::make('team2_goals')
                            ->label('Goles del equipo 2')
                            ->numeric(),
                    ])->columns(4),
                Forms\Components\Repeater::make('goalScorers')
                    ->relationship()
                    ->label('Goleadores del partido')
                    ->columnSpan('full')
                    ->schema([
                        Forms\Components\Select::make('player_id')
                            ->relationship('player', 'name')
                            ->label('Jugador')
                            ->live(onBlur: true)
                            ->options(
                                \App\Models\Player::all()->mapWithKeys(function ($player) {
                                    return [$player->id => $player->name . ' - ' . $player->team->name];
                                })
                            )
                            ->searchable()
                            ->required()
                            ->preload()
                            ->placeholder('Seleccione'),
                        Forms\Components\TextInput::make('goals')
                            ->label('Goles')
                            ->numeric()
                            ->required(),
                        //
                    ])->grid(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        $bulkActions = [];

        if (auth()->user()->roles->contains('name', 'Admin')) {
            $bulkActions[] = Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
        }

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('round.name')
                    ->label('Ronda')
                    ->sortable(),
                Tables\Columns\TextColumn::make('team1.name')
                    ->numeric()
                    ->label('Equipo 1')
                    ->sortable(),
                Tables\Columns\TextColumn::make('team2.name')
                    ->numeric()
                    ->label('Equipo 2')
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->label('Fecha')
                    ->sortable(),
                Tables\Columns\TextColumn::make('time')
                    ->label('Hora'),
                Tables\Columns\TextInputColumn::make('team1_goals')
                    ->label('Goles del equipo 1')
                    ->sortable(),
                Tables\Columns\TextInputColumn::make('team2_goals')
                    ->label('Goles del equipo 2')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
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
            ->bulkActions($bulkActions);
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
            'index' => Pages\ListGames::route('/'),
            //'create' => Pages\CreateGame::route('/create'),
            //'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }
}
