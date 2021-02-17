<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    public function edit(User $user)
    {
//      $this->authorize('edit', $user);

      return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
      $attrs = request()->validate([
        'name' => [
          'string', 'required', 'max:255'
        ],
        'email' => [
          'email', 'required', Rule::unique('users')->ignore($user)
        ],
        'password' => [
          'string', 'required', 'min:6', 'confirmed'
        ],
        'avatar' => [
          'file'
        ]
      ]);

      $user->slug = null;
      $attrs['avatar'] = request('avatar')->store('avatars');
      $attrs['password'] = bcrypt($attrs['password']);
      $user->update($attrs);

      return redirect()->route('profile', $user->slug);
    }
}
