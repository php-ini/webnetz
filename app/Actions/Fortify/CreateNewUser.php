<?php

namespace App\Actions\Fortify;

use Domains\Webnetz\User\Repositories\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Domains\Webnetz\User\UserService;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return Domains\Webnetz\User\Repositories\User
     */
    public function create(array $input)
    {
        $userService = new UserService();
        if($userService->isValidUser($input)) {
            return $userService->createUser($input);
        }

        return $userService->getValidationErrors();
//        Validator::make($input, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => $this->passwordRules(),
//        ])->validate();
//
//        return User::create([
//            'name' => $input['name'],
//            'email' => $input['email'],
//            'password' => Hash::make($input['password']),
//        ]);
    }
}
