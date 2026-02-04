<?php

namespace App\Factory;


class PostFactory
{

    public static function create(array $data, ?string $imageUrl): array
    {
        self::validate($data);

        return [
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],
            'image' => $imageUrl
        ];
    }

    private static function validate(array $data): void
    {
        if (empty($data['title'])) {
            throw new \InvalidArgumentException('Title is required');
        }

        if (strlen($data['title']) > 255) {
            throw new \InvalidArgumentException('Title too long (max 255 chars)');
        }

        if (empty($data['description'])) {
            throw new \InvalidArgumentException('Description is required');
        }

        if (empty($data['content'])) {
            throw new \InvalidArgumentException('Content is required');
        }
    }
}
