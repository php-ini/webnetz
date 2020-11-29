<?php

namespace Domains\Webnetz\User;

use Auth;
use Illuminate\Support\Facades\Hash;
use Domains\Webnetz\Core\AbstractService;
use Domains\Webnetz\User\Repositories\User;
use Domains\Webnetz\User\Validators\UserValidator;

final class UserService extends AbstractService
{
    protected $validator;

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

    public function getCurrentUser()
    {
        return Auth::user();
    }

}
