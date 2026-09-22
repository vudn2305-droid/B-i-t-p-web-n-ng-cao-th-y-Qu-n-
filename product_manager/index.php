<?php
require('database.php');


$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
    $category_id = 1;
}


$queryCategory = 'SELECT categoryName FROM categories WHERE categoryID = :category_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['categoryName'];
$statement1->closeCursor();


$queryProducts = 'SELECT * FROM products WHERE categoryID = :category_id ORDER BY productID';
$statement2 = $db->prepare($queryProducts);
$statement2->bindValue(':category_id', $category_id);
$statement2->execute();
$products = $statement2->fetchAll();
$statement2->closeCursor();

$queryAllCategories = 'SELECT * FROM categories ORDER BY categoryID';
$statement3 = $db->prepare($queryAllCategories);
$statement3->execute();
$categories = $statement3->fetchAll();
$statement3->closeCursor();
?>
<!DOCTYPE html>
<html>
<head>

  

    <title>Product Manager</title>
    <meta charset="UTF-8">
</head>
<body>
<h1>Product Manager</h1>
<div style="display:flex;">
    
    <div style="margin-right:20px;">
        <h2>Categories</h2>
        <ul>
            <?php foreach ($categories as $cat) : ?>
                <li>
                    <a href="?category_id=<?php echo $cat['categoryID']; ?>">
                        <?php echo $cat['categoryName']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    
    <div>
        <h2><?php echo $category_name; ?></h2>
        <table border="1" cellpadding="5">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['productName']; ?></td>
                <td><?php echo $product['listPrice']; ?></td>
                <td>
                    <form action="delete_product.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                    <form action="edit_product_form.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                        <input type="submit" value="Edit">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_product_form.php">Add Product</a></p>
        <p><a href="index.php">List Categories</a></p>
    </div>
</div>
</body>
</html>
