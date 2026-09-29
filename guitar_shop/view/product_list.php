<h1>Product List</h1>

<div style="display:flex;">
    <div style="width:200px; margin-right:20px;">
        <h2>Categories</h2>
        <ul>
        <?php foreach ($categories as $category) : ?>
            <li>
                <a href="?action=list_products&category_id=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div style="flex:1;">
        <h2><?php echo $category_name; ?></h2>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td>
                    <a href="?action=view_product&product_id=<?php echo $product['productID']; ?>">
                        <?php echo $product['productName']; ?>
                    </a>
                </td>
                <td>$<?php echo $product['listPrice']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
