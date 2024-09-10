<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $label = "Pengguna";
    protected static ?string $navigationLabel = "Pengguna";
    protected static ?string $pluralModelLabel = "Pengguna";
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = "Pengguna";

    public static function canViewAny(): bool
    {
        return true;
    }
    public static function canDeleteAny(): bool
    {
        return auth()->user()->hasRole("super_admin");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
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
                Action::make('gantiPassword')
                    ->label('Ganti Password')
                    ->hidden(function (User $record) {
                        // return !(auth()->user()->email == $record->email || auth()->user()->hasRole('super_admin'));
                        return false;
                    })
                    ->form([
                        TextInput::make('password_baru')
                            ->label('Password Baru')
                            ->required(),
                        TextInput::make('konfirmasi_password_baru')
                            ->label('Konfirmasi Password Baru')
                            ->lazy()
                            ->required()
                    ])
                    ->action(function (User $record, array $data) {
                        $user_email = $record->email;
                        $need_redirect = false;
                        if ($user_email == auth()->user()->email) {
                            $need_redirect = true;
                        }
                        if ($data['password_baru'] == $data["konfirmasi_password_baru"] && $record->updatePasswordTanpaPasswordLama($data['password_baru'])) {
                            if ($need_redirect) {
                                Notification::make()
                                    ->title('Sukses mengganti password Anda. Mohon Login kembali')
                                    ->success()
                                    ->send();
                                Auth::logout();
                                return redirect()->to(route('login'));
                            };
                            return Notification::make()
                                ->title('Sukses mengganti password user ' . $record->nama)
                                ->success()
                                ->send();
                        };
                        Notification::make()
                            ->title('Gagal mengganti password. Silakan cek kembali password yang diinput')
                            ->danger()
                            ->send();
                    }),

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return auth()->user()->hasRole('operator_umum') || auth()->user()->hasRole('super_admin');
    }
    public static function canEdit(Model $record): bool
    {
        return auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('operator_umum') || auth()->user()->email == $record->email;
    }
}
