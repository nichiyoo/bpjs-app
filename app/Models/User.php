<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Determine if the user is an admin.
     *
     * @param  string  $role  The role to check for, separated by a comma.
     * @return bool
     */
    public function hasRole($role): bool
    {
        $roles = explode(',', $role);

        foreach ($roles as $name) {
            if ($this->role === $name) {
                return true;
            }
        }

        return false;
    }

    public function officer(): HasOne
    {
        return $this->hasOne(Officer::class, 'user_id');
    }

    public function surveys(): HasMany
    {
        return $this->hasMany(Survey::class, 'user_id');
    }
}
