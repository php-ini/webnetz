<?php
declare(strict_types=1);

namespace Domains\Webnetz\Category\Validators;

use Illuminate\Support\Facades\Validator;

/**
 * Class UserValidator
 * @package Domains\Webnetz\Category\Validators
 * @author Mahmoud Abdelsattar <jinkazama_m@yahoo.com>
 */
class CategoryValidator implements ValidatorInterface
{
    /**
     * @var array
     */
    private $messages = [];

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
                'name' => ['required', 'string', 'min:3', 'max:50'],
            ]
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
