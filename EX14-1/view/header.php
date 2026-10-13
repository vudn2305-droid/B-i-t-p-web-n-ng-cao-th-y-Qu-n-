<?php
$app_root = dirname(__DIR__);
$script_dir = isset($_SERVER['SCRIPT_FILENAME']) ? dirname($_SERVER['SCRIPT_FILENAME']) : $app_root;
$css_path = (realpath($script_dir) === realpath($app_root)) ? 'main.css' : '../main.css';
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css"
          href="<?php echo $css_path; ?>">
</head>

<!-- the body section -->
<body>
<header><h1>My Guitar Shop</h1></header>