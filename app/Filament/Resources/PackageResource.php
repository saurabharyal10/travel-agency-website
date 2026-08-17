<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Filament\Resources\PackageResource\RelationManagers;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Info')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Forms\Components\TextInput::make('category')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('duration')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g. 6 Days'),
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('$'),
                        Forms\Components\Select::make('badge')
                            ->options([
                                'featured' => 'Featured',
                                'best_price' => 'Best Price',
                                'sold_out' => 'Sold Out',
                            ])
                            ->placeholder('None'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ]),

                Forms\Components\Section::make('Description')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Hero image')
                            ->image()
                            ->directory('packages'),
                        Forms\Components\FileUpload::make('gallery')
                            ->image()
                            ->multiple()
                            ->directory('packages/gallery')
                            ->reorderable(),
                    ]),

                Forms\Components\Section::make('Highlights')
                    ->schema([
                        Forms\Components\TagsInput::make('highlights')
                            ->label('')
                            ->placeholder('Add a highlight and press Enter'),
                    ]),

                Forms\Components\Section::make('Itinerary')
                    ->schema([
                        Forms\Components\Repeater::make('itinerary')
                            ->label('')
                            ->schema([
                                Forms\Components\TextInput::make('day')
                                    ->numeric()
                                    ->required(),
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->columnSpan(2),
                                Forms\Components\Textarea::make('description')
                                    ->required()
                                    ->rows(2)
                                    ->columnSpanFull(),
                            ])
                            ->columns(3)
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => isset($state['title']) ? "Day {$state['day']}: {$state['title']}" : null)
                            ->defaultItems(1),
                    ]),

                Forms\Components\Section::make('Inclusions & Exclusions')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TagsInput::make('inclusions')
                            ->placeholder('Add an item and press Enter'),
                        Forms\Components\TagsInput::make('exclusions')
                            ->placeholder('Add an item and press Enter'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('duration'),
                Tables\Columns\TextColumn::make('price')
                    ->money('usd'),
                Tables\Columns\TextColumn::make('badge')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'featured' => 'success',
                        'best_price' => 'info',
                        'sold_out' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options(fn (): array => \App\Models\Package::query()->distinct()->pluck('category', 'category')->all()),
                Tables\Filters\TernaryFilter::make('is_active'),
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
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
