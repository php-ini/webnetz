<?php
declare(strict_types=1);

namespace Domains\Webnetz\Image\Formatters;

/**
 * Interface FormatterInterface
 * @package Domains\Webnetz\Image\Formatters
 * @author Mahmoud Abdelsattar <jinkazama_m@yahoo.com>
 */
interface FormatterInterface {

    /**
     * @param array $data
     * @return array
     */
    public function format(array $data): array;
}
