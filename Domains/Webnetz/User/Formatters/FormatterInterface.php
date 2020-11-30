<?php
declare(strict_types=1);

namespace Domains\Webnetz\User\Formatters;

/**
 * Interface FormatterInterface
 * @package Domains\Webnetz\User\Formatters
 * @author Mahmoud Abdelsattar <jinkazama_m@yahoo.com>
 */
interface FormatterInterface {

    /**
     * @param array $data
     * @return array
     */
    public function format(array $data): array;

}
