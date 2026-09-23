<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;

    public static function connect(): ?PDO
    {
        if (self::$instance === null) {
            $config = require __DIR__ . '/../config/database.php';
            
            $dsn = sprintf(
                "pgsql:host=%s;port=%s;dbname=%s",
                $config['host'],
                $config['port'],
                $config['database']
            );

            try {
                self::$instance = new PDO($dsn, $config['username'], $config['password'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            } catch (PDOException $e) {
                // Log error and show safe message
                \Core\Logger::error("Database Connection Error", ['message' => $e->getMessage()]);
                if (defined('APP_DEBUG') && APP_DEBUG) {
                    throw $e;
                }
                return null;
            }
        }

        return self::$instance;
    }
}
