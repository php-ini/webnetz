<?php
declare(strict_types=1);

namespace Domains\Webnetz\Image\Validators;

/**
 * Interface ValidatorInterface
 * @package Domains\Webnetz\Image\Validators
 * @author Mahmoud Abdelsattar <jinkazama_m@yahoo.com>
 */
interface ValidatorInterface {

    /**
     * @param array $data
     * @return bool
     */
    public function validate(array $data): bool;

    /**
     * @return array
     */
    public function getMessages(): array;
}
