<?php
require_once __DIR__ . '/../model/database.php';
require_once __DIR__ . '/../model/category.php';
require_once __DIR__ . '/../model/category_db.php';
require_once __DIR__ . '/../model/product.php';
require_once __DIR__ . '/../model/product_db.php';

// create the CategoryDB and ProductDB objects
$categoryDB = new CategoryDB();
$productDB = new ProductDB();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}  

if ($action == 'list_products') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }

    // Get product and category data
    $current_category = $categoryDB->getCategory($category_id);
    $categories = $categoryDB->getCategories();
    $products = $productDB->getProductsByCategory($category_id);

    include __DIR__ . '/product_list.php';
} else if ($action == 'view_product') {
    $categories = $categoryDB->getCategories();

    $product_id = filter_input(INPUT_GET, 'product_id', 
            FILTER_VALIDATE_INT);   
    $product = $productDB->getProduct($product_id);

    include __DIR__ . '/product_view.php';
}
?>