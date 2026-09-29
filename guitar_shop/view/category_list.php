<h1>Category List</h1>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Name</th>
        <th>&nbsp;</th>
    </tr>
    <?php foreach ($categories as $category) : ?>
    <tr>
        <td><?php echo $category['categoryName']; ?></td>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_category">
                <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h2>Add Category</h2>
<form action="." method="post">
    <input type="hidden" name="action" value="add_category">
    <label>Name:</label>
    <input type="text" name="name">
    <input type="submit" value="Add">
</form>

<p><a href="?action=list_products">List Products</a></p>
