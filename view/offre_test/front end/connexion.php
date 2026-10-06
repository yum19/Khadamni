<?php
    class connexion
    {
        private static $pdo = null;
    
        public static function getConnexion()
        {
            if (!isset(self::$pdo)) {
                try {
                    $cfg = require __DIR__ . '/../../../config.local.php';
                    self::$pdo = new PDO(
                        $cfg['db']['dsn'],
                        $cfg['db']['user'],
                        $cfg['db']['pass'],
                        [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                        ]
                    );
                } catch (PDOException $e) {
                    die('Database connection failed: ' . $e->getMessage());
                }
            }
            return self::$pdo;
        }
    }
?>    
