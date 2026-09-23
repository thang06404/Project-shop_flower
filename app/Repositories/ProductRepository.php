<?php

namespace App\Repositories;

use Core\Database;
use PDO;

class ProductRepository
{
    public function getFeatured(int $limit = 8): array
    {
        $db = Database::connect();
        if (!$db) {
            return [];
        }

        $stmt = $db->prepare("
            SELECT * FROM products 
            WHERE parent_id = 0 AND status = 'active' 
            ORDER BY id DESC 
            LIMIT :limit
        ");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
