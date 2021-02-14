<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'following_id');
    }

    public function follow(User $user)
    {
        $this->following()->save($user);
    }

    public function timeline()
    {
        $followingIds = $this->following()->pluck('id');
        $ids = $followingIds->push($this->id);
        return Tweet::whereIn('user_id', $ids)
            ->latest()
            ->get();
    }

    public function getAvatarAttribute()
    {
        return "https://i.pravatar.cc/40?u={{$this->email}}";
    }
}
