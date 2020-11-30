<?php


namespace Domains\Webnetz\User\Formatters;


use Illuminate\Support\Facades\Hash;

class UserFormatter implements FormatterInterface
{

    /**
     * @inheritDoc
     */
    public function format(array $data): array
    {
        return [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ];
    }
}
