<?php

namespace App\Models;

use App\Models\Post;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function modules(){
        return $this->hasMany(Module::class);
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }
    public function scopeSearch($query, array $filters)
    {
        $query->when($filters['user'] ?? false, function ($query, $user) {
            $query
                ->where('name', 'like', '%' . $user . '%')
                ->orWhere('username', 'like', '%' . $user . '%')
                ->orWhere('role', 'like', '%' . $user . '%');
                
        });
    }
}
