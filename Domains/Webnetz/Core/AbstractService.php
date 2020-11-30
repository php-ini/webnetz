<?php
declare(strict_types=1);

namespace Domains\Webnetz\Core;


/**
 * Class AbstractService
 * @package Domains\Webnetz\Core
 */
abstract class AbstractService
{
    /**
     * @param array $input
     * @return bool
     */
    public function isValid(array $input): bool
    {
        return $this->validator->validate($input);
    }

    /**
     * @return array
     */
    public function getValidationErrors(): array
    {
        return $this->validator->getMessages();
    }

    /**
     * @param array $input
     * @return array
     */
    public function formatInput(array $input): array
    {
        return $this->formatter->format($input);
    }
}
