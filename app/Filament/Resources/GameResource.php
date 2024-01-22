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
                Forms\Components\Select::make('round_id')
                    ->relationship('round', 'name')
                    ->required()
                    ->preload()
                    ->placeholder('Seleccione una ronda'),
                Forms\Components\Select::make('team1_id')
                    ->relationship('team1', 'name')
                    ->required()
                    ->preload()
                    ->placeholder('Seleccione una equipo'),
                Forms\Components\Select::make('team2_id')
                    ->relationship('team2', 'name')
                    ->required()
                    ->preload()
                    ->placeholder('Seleccione una equipo'),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\TimePicker::make('time')
                    ->required(),
                // team1_goals
                Forms\Components\TextInput::make('team1_goals')
                    ->numeric(),
                // team2_goals
                Forms\Components\TextInput::make('team2_goals')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('round.name')

                    ->sortable(),
                Tables\Columns\TextColumn::make('team1.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('team2.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('time'),
                Tables\Columns\TextInputColumn::make('team1_goals')
                    ->sortable(),
                Tables\Columns\TextInputColumn::make('team2_goals')
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
            'index' => Pages\ListGames::route('/'),
            //'create' => Pages\CreateGame::route('/create'),
            //'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }
}
