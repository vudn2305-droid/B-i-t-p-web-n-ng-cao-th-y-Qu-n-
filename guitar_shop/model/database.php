<?php
$dsn = 'mysql:host=127.0.0.1;port=3307;dbname=my_guitar_shop';
$username = 'root';
$password = ''; 

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "Database Error: " . $error_message;
    exit();
}
?>
