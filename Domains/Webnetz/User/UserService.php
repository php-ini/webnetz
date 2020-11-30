<?php

namespace Domains\Webnetz\User;

use Auth;
use Domains\Webnetz\User\Formatters\UserFormatter;
use Illuminate\Support\Facades\Hash;
use Domains\Webnetz\Core\AbstractService;
use Domains\Webnetz\User\Repositories\User;
use Domains\Webnetz\User\Validators\UserValidator;

final class UserService extends AbstractService
{
    protected UserValidator $validator;
    protected UserFormatter $formatter;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this->validator = new UserValidator();
        $this->formatter = new UserFormatter();
    }

    public function createUser(array $input): User
    {;
        return User::create($this->formatInput($input));
    }

    public function getCurrentUser()
    {
        return Auth::user();
    }

}
