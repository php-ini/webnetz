<?php

namespace Domains\Webnetz\User;

use Auth;
use Domains\Webnetz\User\Formatters\UserFormatter;
use Domains\Webnetz\Core\AbstractService;
use Domains\Webnetz\User\Repositories\User;
use Domains\Webnetz\User\Validators\UserValidator;

/**
 * Class UserService
 * @package Domains\Webnetz\User
 */
final class UserService extends AbstractService
{
    /**
     * @var UserValidator
     */
    protected UserValidator $validator;
    /**
     * @var UserFormatter
     */
    protected UserFormatter $formatter;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this->validator = new UserValidator();
        $this->formatter = new UserFormatter();
    }

    /**
     * @param array $input
     * @return User
     */
    public function createUser(array $input): User
    {
        return User::create($this->formatInput($input));
    }

    /**
     * @return mixed
     */
    public function getCurrentUser()
    {
        return Auth::user();
    }

}
