<?php
declare(strict_types=1);

namespace Domains\Webnetz\Category\Formatters;


use Domains\Webnetz\User\UserService;

class CategoryFormatter implements FormatterInterface
{
    /**
     * @inheritDoc
     */
    public function format(array $data): array
    {
        $userService = new UserService();

        return [
            'name' => $data['name'],
            'description' => @$data['description'],
            'user_id' => $userService->getCurrentUser()->id
        ];
    }
}
