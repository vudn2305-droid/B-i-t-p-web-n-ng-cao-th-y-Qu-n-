<?php
require('model/database.php');
require('model/category_db.php');
require('model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}

if ($action == 'list_products') {
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $categories = get_categories();
    $category_name = get_category_name($category_id);
    $products = get_products_by_category($category_id);
    include('view/product_list.php');

} else if ($action == 'view_product') {
    $product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);
    $product = get_product($product_id);
    include('view/product_detail.php');

} else if ($action == 'list_categories') {
    $categories = get_categories();
    include('view/category_list.php');

} else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id != NULL) {
        delete_category($category_id);
    }
    header("Location: .?action=list_categories");

} else if ($action == 'add_category') {
    $name = filter_input(INPUT_POST, 'name');
    if ($name != NULL) {
        add_category($name);
    }
    header("Location: .?action=list_categories");
}
?>
