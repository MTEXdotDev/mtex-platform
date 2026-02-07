<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar_path',
        'github_id',
        'github_token',
        'github_refresh_token',
        'recovery_codes',
        'timezone',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'github_token',
        'github_refresh_token',
        'recovery_codes',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'recovery_codes' => 'encrypted:array',
        ];
    }

    /**
     * Get the user's avatar URL.
     */
    public function getDisplayableAvatar(): string
    {
        /*if ($this->avatar_path && Storage::disk('public')->exists($this->avatar_path)) {
            return Storage::url($this->avatar_path);
        }*/
        if ($this->avatar_path) {
            return $this->avatar_path;
        }

        return "https://ui-avatars.com/api/?name=" . urlencode($this->name) . "&background=0D8ABC&color=fff";
    }
}