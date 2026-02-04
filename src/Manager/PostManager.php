<?php

namespace App\Manager;

use App\Database\Database;
use PDOStatement;

class PostManager
{
    private Database $db;


    public function __construct(?Database $db = null)
    {
        $this->db = $db ?? Database::getInstance();
    }

    public function save(array $data): int
    {
        $this->db->query($this->getSaveQuery(), [
            $data['title'],
            $data['description'],
            $data['content'],
            $data['image']
        ]);

        return (int)$this->db->lastInsertId();
    }
    private function getSaveQuery(): string
    {
        return "INSERT INTO posts (title, description, content, image, views, created_at) 
            VALUES (?, ?, ?, ?, 0, NOW())";
    }
}