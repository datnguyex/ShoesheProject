<?php
require_once '../../config/database.php';

if (isset($_GET['productID'])) {
    $productID = $_GET['productID'];
}
$productModel = new Product();
$productModel->destroy($productID);

header('location: http://undersized-guys.000.webhostapp.com/admin/products/');
