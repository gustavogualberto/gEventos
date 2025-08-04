<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Evento
 *
 * @property int $id
 * @property string $nome
 * @property string|null $descricao
 * @property string $cidade
 * @property string $date
 * @property string|null $imagem
 * @property int|null $formato
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id
 * @property-read \App\Models\User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Evento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Evento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Evento query()
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereCidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereFormato($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereImagem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereUserId($value)
 */
	class Evento extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @method \Illuminate\Database\Eloquent\Relations\BelongsToMany eventoComoParticipante()
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Evento> $eventoComoParticipante
 * @property-read int|null $evento_como_participante_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Evento> $eventos
 * @property-read int|null $eventos_count
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

