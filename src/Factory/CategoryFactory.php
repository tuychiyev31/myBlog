<?php

namespace App\Factory;

class CategoryFactory
{
    public static function create(array $data): array
    {
        self::validate($data);

        return [
            'name' => $data['name'],
            'description' => $data['description'],
        ];
    }

    private static function validate(array $data): void
    {
        if (empty($data['name'])) {
            throw new \InvalidArgumentException('Name is required');
        }

        if (strlen($data['description']) > 255) {
            throw new \InvalidArgumentException('Description too long (max 255 chars)');
        }

        if (empty($data['description'])) {
            throw new \InvalidArgumentException('Description is required');
        }

    }
}