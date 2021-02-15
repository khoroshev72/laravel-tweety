<?php


namespace App\Models;


trait Followable
{
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'following_id');
    }

    public function isFollowing(User $user)
    {
        return $this->following()->where('following_id', $user->id)->exists();
    }

    public function follow(User $user)
    {
        $this->following()->save($user);
    }

    public function unFollow($user)
    {
        $this->following()->detach($user);
    }

}