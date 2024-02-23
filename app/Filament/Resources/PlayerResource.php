<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayerResource\Pages;
use App\Filament\Resources\PlayerResource\RelationManagers;
use App\Models\Player;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
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
                    ->label('Equipo')
                    ->searchable()
                    ->preload()
                    ->placeholder('Seleccione el equipo sancionado'),
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->maxLength(255),
                Forms\Components\TextInput::make('lastname')
                    ->label('Apellido')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cedula')
                    ->label('Cédula')
                    ->numeric(),
                Forms\Components\TextInput::make('cellphone')
                    ->label('Teléfono')
                    ->tel()
                    ->numeric(),
                Forms\Components\Select::make('sex')
                    ->label('Sexo')
                    ->options([
                        'Masculino' => 'Masculino',
                        'Femenino' => 'Femenino',
                    ]),
                Forms\Components\TextInput::make('semester')
                    ->label('Semestre')
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
                    ->label('Equipo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lastname')
                    ->label('Apellido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cedula')
                    ->label('Cédula')
                    ->sortable(),
                Tables\Columns\TextColumn::make('cellphone')
                    ->label('Teléfono')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sex')
                    ->label('Sexo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('semester')
                    ->label('Semestre')
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
                    //ExportBulkAction::make(),
                    Tables\Actions\BulkAction::make('export')
                        ->label('Exportar PDF')
                        ->icon('heroicon-o-arrow-down-on-square')
                        ->url(fn (Player $record) => route('generatePlayersPDF', $record->id))
                        ->openUrlInNewTab(),
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
