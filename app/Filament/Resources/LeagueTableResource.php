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
use Filament\Tables\Grouping\Group;

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
                    ->label('Equipo')
                    ->searchable()
                    ->preload()
                    ->placeholder('Seleccione el equipo'),
                Forms\Components\TextInput::make('matches_played')
                    ->label('PJ')
                    ->numeric(),
                Forms\Components\TextInput::make('won')
                    ->label('G')
                    ->numeric(),
                Forms\Components\TextInput::make('E')
                    ->numeric(),
                Forms\Components\TextInput::make('P')
                    ->numeric(),
                Forms\Components\TextInput::make('GF')
                    ->numeric(),
                Forms\Components\TextInput::make('GC')
                    ->numeric(),
                Forms\Components\TextInput::make('GD')
                    ->numeric(),
                Forms\Components\TextInput::make('PTS')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                Group::make('team.groups.name')
                    ->label('Grupo')
                    ->collapsible(),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('team.name')
                    ->label('Equipo')
                    ->toggleable()
                    ->numeric(),
                Tables\Columns\TextColumn::make('team.groups.name')
                    ->label('Grupo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('matches_played')
                    ->label('PJ')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('won')
                    ->label('G')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('drawn')
                    ->label('E')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lost')
                    ->label('P')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('goals_for')
                    ->label('GF')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('goals_against')
                    ->label('GC')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('goals_difference')
                    ->label('GD')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('points')
                    ->label('PTS')
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
            ])->defaultSort('points', 'desc')

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
