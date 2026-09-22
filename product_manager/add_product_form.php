<?php
require('database.php');
$query = 'SELECT * FROM categories ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>

<form action="add_product.php" method="post">
    <label>Code:</label>
    <input type="text" name="code"><br>

    <label>Name:</label>
    <input type="text" name="name"><br>

    <label>List Price:</label>
    <input type="text" name="price"><br>

    <label>Category:</label>
    <select name="category_id">
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <input type="submit" value="Add Product">
</form>
