<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

      if (request('avatar')) {
        if (Storage::exists($user->getRawOriginal('avatar'))) {
          Storage::delete($user->getRawOriginal('avatar'));
        }
        $attrs['avatar'] = request('avatar')->store('avatars');
      }

      $user->slug = null;
      $user->update($attrs);

      return redirect()->route('profile', $user->slug);
    }
}
