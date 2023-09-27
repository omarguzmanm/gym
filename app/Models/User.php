<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'name',
        'code',
        'phone_number',
        'address',
        'profile_photo_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function analysis()
    {
        return $this->hasMany(Analysis::class, 'id_user');
    }

    public function chats()
    {
        return $this->belongsToMany(Chat::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function memberships()
    {
        return $this->belongsToMany(Membership::class, 'membership_user')
            ->withPivot(['inscription', 'renew_date', 'status']);
        // ->withTimestamps(); // Esto cargará automáticamente created_at y updated_at en la tabla pivote
    }

    public function appointments()
    {
        return $this->belongsToMany(Routine::class, 'user_routine', 'user_id', 'routine_id')->withTimestamps();
    }

    public function routines()
    {
        return $this->belongsToMany(Routine::class, 'exercise_routine_user', 'user_id', 'routine_id')
            ->withPivot('exercise_id')->withTimestamps();
    }



}