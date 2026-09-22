<?php
require('database.php');

$code = $_POST['code'];
$name = $_POST['name'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];

$query = "INSERT INTO products (productCode, productName, listPrice, categoryID)
          VALUES (:code, :name, :price, :category_id)";
$statement = $db->prepare($query);
$statement->bindValue(':code', $code);
$statement->bindValue(':name', $name);
$statement->bindValue(':price', $price);
$statement->bindValue(':category_id', $category_id);
$statement->execute();
$statement->closeCursor();

header("Location: index.php");
?>
