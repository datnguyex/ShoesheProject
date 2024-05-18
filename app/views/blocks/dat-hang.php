<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: auto;
        }

        .product-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }

        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
        }

        .product-details {
            flex-grow: 1;
        }

        .product-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .product-price {
            color: green;
            font-size: 16px;
        }

        .delete-button {
            color: white;
            background-color: red;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-left: auto;
            cursor: pointer;
        }

        .checkout-form {
            max-width: 500px;
            margin: auto;
        }

        .quantity-input {
            width: 40px;
            text-align: center;
        }
        .tieuDe {
            text-align: center;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h2 class="tieuDe">Checkout</h2>
        
        <form action="dieuchinhsoluong.php" method="post" class="checkout-form">
            <!-- Thông tin người mua -->
            <div class="mb-3">
                <label for="customerName" class="form-label">Tên người mua:</label>
                <input type="text" class="form-control" id="customerName" name="customerName" required>
            </div>

            <!-- Phương thức thanh toán -->
            <div class="mb-3">
                <label for="paymentMethod" class="form-label">Phương thức thanh toán:</label>
                <select class="form-select" id="paymentMethod" name="paymentMethod" required>
                    <option value="creditCard">Thẻ tín dụng</option>
                    <option value="TienMat">Thanh toán khi nhận hàng</option>
                    <!-- Thêm các phương thức thanh toán khác nếu cần -->
                </select>
            </div>
            <!-- Danh sách sản phẩm đã chọn -->
            <h4 class="mb-3">Danh sách sản phẩm đã chọn:</h4>
            <div class="product-list">
                <?php foreach ($products as $product) : ?>
                    <div class="product-container">
                        <img src="public/images/<?php echo $product['image']; ?>" alt="Product Image" class="product-image">
                        <div class="product-details">
                            <div class="product-name"><?php echo $product['name']; ?></div>
                            <div class="product-price"><?php echo $product['price']; ?></div>
                            <!-- Form điều chỉnh số lượng -->
                            <div class="small-form">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary decrease-quantity">
                                        -
                                    </button>
                                    <!-- Input để hiển thị và cập nhật số lượng -->
                                    <input type="text" class="quantity-input" name="quantity" value="1" readonly>
                                    <button type="button" class="btn btn-outline-secondary increase-quantity">
                                        +
                                    </button>
                                </div>
                                <input type="hidden" name="maSanPham" value="<?php echo $product['id']; ?>">
                            </div>
                        </div>
                        <!-- Add delete button -->
                        <a href="favourite.php?idDeleteFavourite=<?php echo $product['id']; ?>" class="delete-button">Delete</a>
                    </div>
                <?php endforeach ?>
            </div>

            <!-- Nút đặt hàng -->
            <button type="submit" class="btn btn-danger btn-block">Đặt hàng</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const decreaseButtons = document.querySelectorAll('.decrease-quantity');
            const increaseButtons = document.querySelectorAll('.increase-quantity');
            const quantityInputs = document.querySelectorAll('.quantity-input');

            // Xử lý sự kiện giảm số lượng
            decreaseButtons.forEach(function (button, index) {
                button.addEventListener('click', function () {
                    let quantity = parseInt(quantityInputs[index].value);
                    if (quantity > 1) {
                        quantity--;
                        quantityInputs[index].value = quantity;
                    }
                });
            });

            // Xử lý sự kiện tăng số lượng
            increaseButtons.forEach(function (button, index) {
                button.addEventListener('click', function () {
                    let quantity = parseInt(quantityInputs[index].value);
                    quantity++;
                    quantityInputs[index].value = quantity;
                });
            });
        });
    </script>
</body>
</html>
