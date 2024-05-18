<?php
require_once 'config/database.php';


if (isset($_GET['selectedProducts'])) {
    // Lấy giá trị của tham số truy vấn
    $Ids = $_GET['selectedProducts'];
}




