<?php

namespace App\Models;

use Core\Database;
use PDO;
use PDOException;

class User
{
    /**
     * Tìm user theo email
     *
     * @param string $email
     * @return array|null
     */
    public static function findByEmail(string $email): ?array
    {
        $db = Database::connect();
        if (!$db) {
            return null;
        }

        try {
            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email AND status != 'deleted' LIMIT 1");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch();
            return $user ?: null;
        } catch (PDOException $e) {
            \Core\Logger::error("User::findByEmail Error", ['message' => $e->getMessage()]);
            return null;
        }
    }

    /**
     * Tạo user mới
     *
     * @param array $data
     * @return bool
     */
    public static function create(array $data): bool
    {
        $db = Database::connect();
        if (!$db) {
            return false;
        }

        try {
            $stmt = $db->prepare("
                INSERT INTO users (name, email, password, phone, role, status) 
                VALUES (:name, :email, :password, :phone, 'customer', 'active')
            ");

            $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $data['password'], PDO::PARAM_STR); // Mật khẩu đã băm
            $stmt->bindParam(':phone', $data['phone'], PDO::PARAM_STR);

            return $stmt->execute();
        } catch (PDOException $e) {
            \Core\Logger::error("User::create Error", ['message' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * Lấy user theo ID
     */
    public static function findById(int $id): ?array
    {
        $db = Database::connect();
        if (!$db) {
            return null;
        }

        try {
            $stmt = $db->prepare("SELECT id, name, email, phone, role, status, created_at FROM users WHERE id = :id AND status != 'deleted' LIMIT 1");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $user = $stmt->fetch();
            return $user ?: null;
        } catch (PDOException $e) {
            \Core\Logger::error("User::findById Error", ['message' => $e->getMessage()]);
            return null;
        }
    }

    /**
     * Cập nhật remember token
     */
    public static function updateRememberToken(int $id, ?string $token): bool
    {
        $db = Database::connect();
        if (!$db) {
            return false;
        }

        try {
            $stmt = $db->prepare("UPDATE users SET remember_token = :token WHERE id = :id");
            $stmt->bindParam(':token', $token, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            \Core\Logger::error("User::updateRememberToken Error", ['message' => $e->getMessage()]);
            return false;
        }
    }

    /**
     * Tìm user theo remember token
     */
    public static function findByRememberToken(string $token): ?array
    {
        $db = Database::connect();
        if (!$db) {
            return null;
        }

        try {
            $stmt = $db->prepare("SELECT * FROM users WHERE remember_token = :token AND status = 'active' LIMIT 1");
            $stmt->bindParam(':token', $token, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch();
            return $user ?: null;
        } catch (PDOException $e) {
            \Core\Logger::error("User::findByRememberToken Error", ['message' => $e->getMessage()]);
            return null;
        }
    }
}
