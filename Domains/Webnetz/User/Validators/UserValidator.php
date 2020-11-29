<?php
declare(strict_types=1);

namespace Domains\Webnetz\User\Validators;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\Validator;

/**
 * Class UserValidator
 * @package Domains\Webnetz\User\Validators
 * @author Mahmoud Abdelsattar <jinkazama_m@yahoo.com>
 */
class UserValidator implements ValidatorInterface
{
    use PasswordValidationRules;

    const PASSWORD_VALIDATION_MESSAGE = 'The :attribute format is invalid (should include at least 8 characters long, should contain at least 1 lowercase character, 1 uppercase character and 1 digit. Special characters should be possible, but are not required).';
    /**
     * @var array
     */
    private $messages = [];

    private $customValidation = [
        'regex' => self::PASSWORD_VALIDATION_MESSAGE,
    ];

    /**
     * @param array $input
     * @return bool
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validate(array $input): bool
    {
        $validator = Validator::make(
            $input,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
            ],
            $this->customValidation
        );

        if ($validator->fails()) {
            $this->messages = $validator->validate();
            return false;
        }

        return true;
    }

    /**
     * @return array
     */
    public function getMessages(): array
    {
        return $this->messages;
    }
}
