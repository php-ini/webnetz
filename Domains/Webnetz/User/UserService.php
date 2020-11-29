<?php

namespace Domains\Webnetz\User;

use Domains\Webnetz\User\Repositories\User;
use Illuminate\Support\Facades\Hash;
use Domains\Webnetz\User\Validators\UserValidator;

class UserService
{
    private $validator;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this->validator = new UserValidator();
    }

    public function createUser(array $input): User
    {
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }

    public function isValidUser(array $input): bool
    {
        return $this->validator->validate($input);
    }

    public function getValidationErrors(): array
    {
        return $this->validator->getMessages();
    }
}
