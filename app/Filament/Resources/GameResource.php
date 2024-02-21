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
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Configuración';
    protected static ?string $navigationLabel = 'Partidos';
    protected static ?int $navigationSort = 1;



    public static function form(Form $form): Form
    {
        $editable = [];
        if (auth()->user()->roles->contains('name', 'Admin')) {
            $editable = [
                'round_id',
                'date',
                'time',
                'team1_id',
                'team2_id',

            ];
        }

        return $form
            ->schema([
                Forms\Components\Section::make('Información sobre las fechas')
                    ->compact()
                    ->schema([
                        Forms\Components\Select::make('round_id')
                            ->label('Ronda')
                            ->relationship('round', 'name')
                            ->disabled(!in_array('round_id', $editable))
                            ->required()
                            ->preload()
                            ->placeholder('Seleccione una ronda'),
                        Forms\Components\DatePicker::make('date')
                            ->label('Fecha')
                            ->disabled(!in_array('date', $editable))
                            ->required(),
                        Forms\Components\TimePicker::make('time')
                            ->label('Hora')
                            ->disabled(!in_array('time', $editable))
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
                            ->disabled(!in_array('team1_id', $editable))
                            ->preload()
                            ->placeholder('Seleccione'),
                        Forms\Components\Select::make('team2_id')
                            ->relationship('team2', 'name')
                            ->label('Equipo 2')
                            ->searchable()
                            ->required()
                            ->disabled(!in_array('team2_id', $editable))
                            ->preload()
                            ->placeholder('Seleccione'),

                        Forms\Components\TextInput::make('team1_goals')
                            ->label('Goles del equipo 1')
                            ->numeric(),
                        Forms\Components\TextInput::make('team2_goals')
                            ->label('Goles del equipo 2')
                            ->numeric(),
                    ])->columns(4),
                // Goleadores del partido
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
                // Sanciones de jugadores
                Forms\Components\Repeater::make('playerSanctions')
                    ->relationship()
                    ->label('Sanciones de jugadores')
                    ->columnSpan('full')
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

                    ])->grid(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        $bulkActions = [];

        if (auth()->user()->roles->contains('name', 'Admin')) {
            $bulkActions[] = Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make(),


            ]);
        } elseif (auth()->user()->roles->contains('name', 'Vocal')) {
            $bulkActions[] = Tables\Actions\BulkActionGroup::make([
                ExportBulkAction::make(),
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
