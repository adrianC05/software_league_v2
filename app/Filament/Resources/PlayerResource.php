<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayerResource\Pages;
use App\Filament\Resources\PlayerResource\RelationManagers;
use App\Models\Player;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Grouping\Group;

class PlayerResource extends Resource
{
    protected static ?string $model = Player::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Configuración';
    protected static ?string $navigationLabel = 'Jugadores';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('team_id')
                    ->relationship('team', 'name')
                    ->searchable()
                    ->preload()
                    ->placeholder('Seleccione el equipo sancionado'),
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('lastname')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cedula')
                    ->numeric(),
                Forms\Components\TextInput::make('cellphone')
                    ->tel()
                    ->numeric(),
                Forms\Components\Select::make('sex')
                    ->options([
                        'Masculino' => 'Masculino',
                        'Femenino' => 'Femenino',
                    ]),
                Forms\Components\TextInput::make('semester')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                Group::make('team.name')
                    ->label('Equipo')
                    ->collapsible(),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('team.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lastname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cedula')
                    ->sortable(),
                Tables\Columns\TextColumn::make('cellphone')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sex')
                    ->searchable(),
                Tables\Columns\TextColumn::make('semester')
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
            'index' => Pages\ListPlayers::route('/'),
            //'create' => Pages\CreatePlayer::route('/create'),
            //'edit' => Pages\EditPlayer::route('/{record}/edit'),
        ];
    }
}
