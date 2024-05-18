<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>ShoesHe - Trò chuyện với Cửa hàng</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
        }

        .khung-chat {
            max-width: 80%; 
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .tieude-chat {
            padding: 20px;
            background-color: #e91e63; 
            color: #fff;
            text-align: center;
            font-size: 1.5em;
            border-bottom: 2px solid #c2185b;
        }

        .navbar {
            background-color: #ADD8E6 !important;
            padding: 10px;
        }

        .navbar-nav .nav-link {
            color: #fff !important; 
        }

        .navbar-nav .nav-item:nth-child(2)
        {
            margin-left: 900px; 
        }

        .navbar-nav .nav-item .nav-link {
        color: #000 !important; 
        font-weight: bold; 
        }

        .navbar-nav .nav-item .nav-link i {
            color: #000 !important;
        }

        .noi-dung-chat {
            flex-grow: 1;
            overflow-y: auto;
            padding: 20px;
        }

        .khung-nhap-chat {
            display: flex;
            align-items: center;
            padding: 20px;
            border-top: 2px solid #c2185b;
        }

        #nhapTinNhan {
            flex-grow: 1;
            margin-right: 10px;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        #guiTinNhanBtn {
            padding: 10px;
            font-size: 1em;
            background-color: #e91e63; 
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .goi-y-mua {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            background-color: #ecf0f1;
            border-top: 2px solid #ddd;
        }

        .goi-y-mua button {
            padding: 10px;
            font-size: 1em;
            background-color: #e91e63;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <!-- khung chat -->
    <div class="khung-chat">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://undersized-guys.000.webhostapp.com/">
        <img src="public/img/logo_cut.png" alt="Logo" width="60" height="50">
    </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://undersized-guys.000.webhostapp.com/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://undersized-guys.000.webhostapp.com/cart.php"><i class="bi bi-cart4"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://undersized-guys.000.webhostapp.com/history.php"><i class="bi bi-clock-history"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://undersized-guys.000.webhostapp.com/favourite.php"><i class="bi bi-heart"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="tieude-chat">Trò chuyện với Cửa hàng</div>
        <div class="noi-dung-chat" id="noiDungChat">
            
        </div>
        <div class="khung-nhap-chat">
            <textarea id="nhapTinNhan" placeholder="Nhập tin nhắn của bạn..."></textarea>
            <button id="guiTinNhanBtn" onclick="return guiTinNhanDaNhap()">Gửi</button>
        </div>
        <div class="goi-y-mua">
            <?php
                $cauHoiVaTraLoi = array(
                    array("Sản phẩm mới", "Chúng tôi có nhiều sản phẩm mới đẹp và thời trang. Hãy kiểm tra ngay!"),
                    array("Khuyến mãi", "Có khuyến mãi hấp dẫn ngay bây giờ. Đừng bỏ lỡ!"),
                    array("Đặt hàng", "Quá đơn giản! Bạn chỉ cần thêm sản phẩm vào giỏ hàng và tiến hành thanh toán."),
                    array("Chính sách đổi trả", "Chính sách đổi trả của chúng tôi linh hoạt và thuận tiện cho bạn. Hãy đọc chi tiết trên trang web!"),
                    array("Liên hệ hỗ trợ", "Nếu bạn cần hỗ trợ, hãy liên hệ với chúng tôi qua số điện thoại hoặc email.")
                );

                foreach ($cauHoiVaTraLoi as $cau) {
                    echo "<button onclick=\"chonCauHoi('{$cau[0]}')\">{$cau[0]}</button>";
                }
            ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            guiTinNhanGoiY("Xin chào! Chúng tôi có thể giúp gì cho bạn?");
        });

        function chonCauHoi(cauHoi) {
            var cauTraLoi = layCauTraLoiTuCauHoi(cauHoi);

            guiTinNhan("Bạn: " + cauHoi);
            guiTinNhanGoiY(cauTraLoi);
        }

        function layCauTraLoiTuCauHoi(cauHoi) {
            <?php
                foreach ($cauHoiVaTraLoi as $cau) {
                    echo "if ('$cau[0]' === cauHoi) {
                            return '$cau[1]';
                        }";
                }
            ?>
            return "Xin lỗi, chúng tôi không hiểu câu hỏi của bạn. Hãy thử lại!";
        }

        function guiTinNhan(noiDung) {
            var noiDungChat = document.getElementById("noiDungChat");
            var phanTuTinNhan = document.createElement("div");
            phanTuTinNhan.textContent = noiDung;
            noiDungChat.appendChild(phanTuTinNhan);
        }

        function guiTinNhanGoiY(noiDung) {
            guiTinNhan("Shop: " + noiDung);
        }

        function guiTinNhanDaNhap() {
            var nhapTinNhan = document.getElementById("nhapTinNhan");
            var tinNhan = nhapTinNhan.value;

            guiTinNhan("Bạn: " + tinNhan);
            guiTinNhanGoiY("Cảm ơn bạn đã gửi câu hỏi. Chúng tôi sẽ trả lời sớm nhất có thể!");
            nhapTinNhan.value = "";
        }
    </script>
</body>

</html>