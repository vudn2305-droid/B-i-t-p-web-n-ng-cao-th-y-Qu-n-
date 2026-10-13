<?php
class Database {
  private static $dsn = 'mysql:host=localhost;port=3307;dbname=my_guitar_shop3;charset=utf8mb4';
    private static $username = 'mgs_user';
    private static $password = 'pa55word';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            $connections = array(
                array(self::$username, self::$password),
                array('root', '')
            );

            foreach ($connections as $connection) {
                try {
                    self::$db = new PDO(self::$dsn, $connection[0], $connection[1]);
                    self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    break;
                } catch (PDOException $e) {
                    $error_message = $e->getMessage();
                }
            }

            if (!isset(self::$db)) {
                include __DIR__ . '/../errors/database_error.php';
                exit();
            }
        }
        return self::$db;
    }
}
?>