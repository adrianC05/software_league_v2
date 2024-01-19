<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayersResource\Pages;
use App\Filament\Resources\PlayersResource\RelationManagers;
use App\Models\Players;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlayersResource extends Resource
{
    protected static ?string $model = Players::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Configuración';
    protected static ?string $navigationLabel = 'Jugadores';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('Name')
                ->required(),
            Forms\Components\TextInput::make('Lastname')
                ->required(),
            Forms\Components\TextInput::make('Cedula')
               ->required(),
            Forms\Components\TextInput::make('Cellphone')
                ->required(),
            Forms\Components\Select::make('Sex')
                ->options([
                    'M' => 'Masculino',
                    'F' => 'Femenino',
                ])
                ->required(),
            Forms\Components\TextInput::make('Semester')
                ->required(),
            Forms\Components\Select::make('teams_id')
                ->relationship('team', 'name')
                ->required()
                ->preload()
                ->placeholder('Seleccione una equipo'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            //'create' => Pages\CreatePlayers::route('/create'),
            //'edit' => Pages\EditPlayers::route('/{record}/edit'),
        ];
    }
}

