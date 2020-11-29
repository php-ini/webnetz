<?php


namespace Domains\Webnetz\Core;


abstract class AbstractService
{
    public function isValid(array $input): bool
    {
        return $this->validator->validate($input);
    }

    public function getValidationErrors(): array
    {
        return $this->validator->getMessages();
    }
}
