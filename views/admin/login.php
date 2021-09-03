<?php

include_once "../inc.php";

$name = postIndex('name');
$pass = md5(postIndex('pass'));


$n = false;

foreach ($xem['admin'] as $k => $v) {
    if ($name == $v['email'] && $pass == $v['password']) {
        $_SESSION["name_ad"]  = $v['name'];
        $n = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>DANG NHAP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        fieldset {
            width: 50%;
            margin: 100px auto;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend style="text-align: center;">Form Đăng Nhập Tài Khoản Của Admin</legend>
        <div class="container">
            <form action="" method="post">
                <div>
                    <?php
                    if ($name != "") {
                        if ($n == true) {
                            header('location:?url1=main');
                        } else {
                    ?>
                            <label style="background-color:rgb(254, 1, 0);">Bạn Đã Nhập Sai email hoặc password</label>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="usr">Gmail or email :</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                    <?php
                    if ($name == "") {
                    ?>
                        <label style="background-color:rgb(196, 224, 178);">Bạn hãy nhập email hoặc gmail</label>
                    <?php
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="pass">
                    <?php
                    if ($pass == md5("")) {
                    ?>
                        <label style="background-color:rgb(196, 224, 178);">Bạn hãy nhập password</label>
                    <?php
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-primary">ĐĂNG NHẬP</button>
                <?PHP




                ?>

            </form>
        </div>
    </fieldset>

</body>

</html>