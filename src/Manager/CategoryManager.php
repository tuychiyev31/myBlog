<?php

namespace App\Manager;

use App\Database\Database;

class CategoryManager
{
    private Database $db;

    public function __construct(?Database $db = null)
    {
        $this->db = $db ?? Database::getInstance();
    }

    public function save(array $data): int
    {
        $this->db->query($this->getSaveQuery(), [$data['name'], $data['description']]);

        return (int)$this->db->lastInsertId();
    }

    private function getSaveQuery(): string
    {
        return "INSERT INTO categories (name, description, created_at) VALUES (?, ?, NOW())";
    }
}
