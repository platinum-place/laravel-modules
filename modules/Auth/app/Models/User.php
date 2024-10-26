<?php

namespace Modules\Auth\app\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends BaseAuthModel
{
    use HasApiTokens,HasRoles,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
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

    public function syncPermissionTo(string $permission): void
    {
        if ($this->hasPermissionTo($permission)) {
            $this->revokePermissionTo($permission);
        } else {
            $this->givePermissionTo($permission);
        }
    }

    public function hasPermissionToAction(string $action, string $entity): bool
    {
        return $this->hasPermissionTo("{$action}_{$entity}");
    }

    public function syncPermissionToAction(string $action, string $entity): void
    {
        $this->syncPermissionTo("{$action}_{$entity}");
    }

    public function syncPermissionToActionMultiple(array $permissions): void
    {
        foreach ($permissions as $permission) {
            $this->syncPermissionTo($permission);
        }
    }
}
