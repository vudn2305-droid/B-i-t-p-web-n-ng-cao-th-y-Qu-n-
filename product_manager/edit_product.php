<?php
require('database.php');

$product_id = $_POST['product_id'];
$code = $_POST['code'];
$name = $_POST['name'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];

$query = "UPDATE products
          SET productCode = :code, productName = :name, listPrice = :price, categoryID = :category_id
          WHERE productID = :product_id";
$statement = $db->prepare($query);
$statement->bindValue(':code', $code);
$statement->bindValue(':name', $name);
$statement->bindValue(':price', $price);
$statement->bindValue(':category_id', $category_id);
$statement->bindValue(':product_id', $product_id);
$statement->execute();
$statement->closeCursor();

header("Location: index.php");
?>
