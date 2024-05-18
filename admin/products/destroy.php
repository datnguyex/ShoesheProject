<?php
require_once '../../config/database.php';

if (isset($_POST['productID'])) {
    $productID = $_POST['productID'];
    $productModel = new Product();
    if ($productModel->destroy($productID)) {
        $_SESSION['alertDelete'] = "Delete successfully!!!";
    }
    else
    {
        $_SESSION['alertDelete'] = "Delete fail!!!";
    }
}
header('location: http://undersized-guys.000.webhostapp.com/admin/products/');
