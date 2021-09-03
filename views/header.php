<?php
// echo "<pre>";
// print_r($xem["slider"]);
// echo "</pre>";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="st.css">
    <style>
        .d {
            background-color: rgb(102, 153, 255);
            color: #FFFFFF !important;
            font-size: 20px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="jumbotron text-center d" style="margin-bottom:0;">
            <h1>QUÊN TÊN SHOP</h1>

            <p>Hãy Tận Hưởng Các Ưu Đãi Từ Shop Nhé</p>
        </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="margin-bottom: 20px;border-radius: 5px">
            <div class="collapse navbar-collapse" id="navbarNav">
                <a class="navbar-brand" href="#">
                    <img src="image/baner/panda.png" height="50px" style="border-radius: 10px;" title="i love panda" alt="panda">
                </a>
                <!-- form lay tim kiem -->
                <form class="form-inline" action="?url1=timkiem" method="POST">  
                    <input class="form-control mr-sm-2" type="text" name="tim" placeholder="Tìm Kiếm">
                    <select name="ss" style="width:150px;">
                        <option value="1" selected="selected">Tăng dần</option>
                        <option value="2">Giảm dần</option>
                    </select>
                    <button class="btn btn-success" type="submit" style="margin-left: 10px;">Tìm Kiếm</button>
                </form>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Trang chủ</a>
                    </li>
                   
                    <?php
                    if (isset($_SESSION['name'])) {
                        echo '<li class="nav-item"><a class="nav-link" href="?url1=gio">Giỏ hàng</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="?url1=viewuser" > --' . $_SESSION['name'] . '-- </a></li>';
                        echo '<li class="nav-item"> <a class="nav-link" href="?url1=dangxuat">Đăng xuất</a> </li>';
                    } else {
                        echo '<li class="nav-item"> <a class="nav-link" href="?url1=dangnhap">Đăng nhập</a> </li>';
                        echo '<li class="nav-item"> <a class="nav-link" href="?url1=dangky">Đăng ký</a></li>';
                    }

                    ?>
                </ul>
            </div>
        </nav>

    </div>