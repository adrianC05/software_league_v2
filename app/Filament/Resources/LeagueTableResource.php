<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeagueTableResource\Pages;
use App\Filament\Resources\LeagueTableResource\RelationManagers;
use App\Models\LeagueTable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LeagueTableResource extends Resource
{
    protected static ?string $model = LeagueTable::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Estadísticas';
    protected static ?string $navigationLabel = 'Tabla de posiciones';
    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('team_id')
                    ->relationship('team', 'name')
                    ->searchable()
                    ->preload()
                    ->placeholder('Seleccione el equipo'),
                Forms\Components\TextInput::make('matches_played')
                    ->numeric(),
                Forms\Components\TextInput::make('won')
                    ->numeric(),
                Forms\Components\TextInput::make('drawn')
                    ->numeric(),
                Forms\Components\TextInput::make('lost')
                    ->numeric(),
                Forms\Components\TextInput::make('goals_for')
                    ->numeric(),
                Forms\Components\TextInput::make('goals_against')
                    ->numeric(),
                Forms\Components\TextInput::make('goals_difference')
                    ->numeric(),
                Forms\Components\TextInput::make('points')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('team.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('team.groups.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('matches_played')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('won')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('drawn')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lost')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('goals_for')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('goals_against')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('goals_difference')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('points')
                    ->numeric()
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
                // view
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
            'index' => Pages\ListLeagueTables::route('/'),
            //'create' => Pages\CreateLeagueTable::route('/create'),
            //'edit' => Pages\EditLeagueTable::route('/{record}/edit'),
        ];
    }
}
