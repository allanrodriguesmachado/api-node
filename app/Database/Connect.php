<?php

namespace App\Database;

use PDO;

class Connect
{
    private const  DB_HOST = 'db';
    private const  USER = 'admin';
    private const  DBNAME = 'fullstack';
    private const  PASS = 'admin';

    private const  OPTIONS = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    private static mixed $instance;

    public static function getInstance(): PDO|string
    {
        try {
            if (empty(self::$instance)) {
                self::$instance = new PDO(
                    "pgsql:host=" . self::DB_HOST . ";port=5432;dbname=" . self::DBNAME,
                    self::USER,
                    self::PASS,
                    self::OPTIONS
                );
            }
        } catch (\PDOException $e) {
            return $e->getMessage();
        }

        return self::$instance;
    }
}