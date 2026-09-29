<h1><?php echo $product['productName']; ?></h1>
<p>Code: <?php echo $product['productCode']; ?></p>
<p>Price: $<?php echo $product['listPrice']; ?></p>
<p>Description: <?php echo $product['description']; ?></p>
<p><a href="?action=list_products&category_id=<?php echo $product['categoryID']; ?>">Back to Products</a></p>
