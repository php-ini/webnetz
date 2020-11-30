<?php
declare(strict_types=1);

namespace Domains\Webnetz\Image\Validators;

use Illuminate\Support\Facades\Validator;

/**
 * Class UserValidator
 * @package Domains\Webnetz\Image\Validators
 * @author Mahmoud Abdelsattar <jinkazama_m@yahoo.com>
 */
class ImageValidator implements ValidatorInterface
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
                'image' => ['required', 'image', 'mimes:jpeg,jpg,bmp,png,gif'],
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

    /**
     * @param array $input
     * @return bool
     * @throws \Illuminate\Validation\ValidationException
     */
    public function isValidWithoutImage(array $input): bool
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

}
