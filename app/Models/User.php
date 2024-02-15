<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class User extends Authenticatable implements FilamentUser
{
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

    const ROLE_ADMIN = "ADMIN";
    const ROLE_CME = "CME";
    const ROLE_USER = "USER";
    const DEFAULT_ROLE = "USER";

    const ROLES = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_CME => 'Cme',
        self::ROLE_USER => 'User'
    ];
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];
    public function canAccessPanel(Panel $panel): bool
    {
        return  $this->can("viewAdmin", User::class);
    }
    public function canApplyForJobs()
    {
        return $this->role === self::ROLE_USER;
    }
    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }
    public function isCme()
    {
        return $this->role === self::ROLE_CME;
    }
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
        'application_status'
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
        'password'
    ];

    public function skills(): MorphToMany
    {
        return $this->morphToMany(Skill::class, 'skillable');
    }

    public function announcements()
    {
        return $this->belongsToMany(Announcement::class, 'applications')->withTimestamps();
    }
}
