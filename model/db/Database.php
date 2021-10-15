<?php

class Database
{
    private static string $dsn = "mysql:host=mysql.db.ehretwt.dev;dbname=dsu-csc470";
    private static string $username = "public";
    private static string $password = "d2143c27-1819-4b19-9e5d-85b9caa04ab0";
    private static ?PDO $db = null;

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
            } catch (PDOException $e) {
                echo "Database Error : " . $e->getMessage();
                exit();
            }
        }
        return self::$db;
    }
}