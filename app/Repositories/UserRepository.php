<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    /**
     * Create a new user and return the user model.
     *
     * @param array $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'email'    => $data['email'],
            'password' => $data['password'],
        ]);

        event(new Registered($user));

        return $user;
    }

    public function updateProfile(User $user, array $data)
    {
        return $user->fill($data)->save();
    }

    public function changePassword(User $user, array $data)
    {
        if (!Hash::check($data['current_password'], $user->password)) {
            return false;
        }

        $user->update([
            'password' => $data['new_password'],
        ]);

        return true;
    }
}
