<?php
include_once "inc.php";

$name = postIndex("ten");
$pass = md5(postIndex("mk"));
$pass1 = md5(postIndex("mk1"));
$mail = postIndex("mail");
$phone = postIndex("dt");
$ar = postIndex("ar");


unset($_SESSION["check"]);
unset($_SESSION["name"]);
unset($_SESSION["user_pass"]);
unset($_SESSION["user_phone"]);
unset($_SESSION["user_mail"]);
unset($_SESSION["user_ar"]);



 
$err = array();
if ($name != "") {
    if (!checksdt($phone))
        $err[] = "Số điện thoại phải là số và đủ 10 số";

    if (!checkEmail($mail)) {
        $err[] = "Sai cú pháp nhập lại email";
    }
    foreach ($xem["user"] as $k => $v) {
        if ($v["email"] == $mail) {
            $err[] = "Email Đã tồn tại";
        }
        if ($v["name"] == $name) {
            $err[] = "Tên Đã tồn tại";
        }
    }
    if ($pass1 != $pass) {
        $err[] = "Hai password khác nhau";
    }

    $partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if(!preg_match($partten ,$pass)){
        $err[] =  "Mật khẩu bạn vừa nhập không đúng định dạng ";
    }
  
}
?>


<legend style="text-align: center;">Đăng Ký Tài Khoản</legend>

<div class="container">
    <form action="" method="post" enctype="multipart/form">
        <div>
            <?php
            if ($name != "" && $pass != "" && $phone != "" && $mail != "" && $ar != "") {
                if (count($err) == 0) {
                    $_SESSION["check"] = 1;
                    $_SESSION["name"] = $name;
                    $_SESSION["user_pass"] = $pass;
                    $_SESSION["user_phone"] = $phone;
                    $_SESSION["user_mail"] = $mail;
                    $_SESSION["user_ar"] = $ar;
                    header('location:?url1=user');
                } else {
                    foreach ($err as $k) {
            ?>
                        <label style="background-color:rgb(254, 1, 0); font-size: 20px;"><?php echo $k; ?></label>
                        <br>
            <?php
                    }
                }
            }
            ?>
        </div>
        <div class="form-group">
            <label>Name:<span style="color:red;">*</span></label>
            <input type="text" class="form-control" name="ten" required value="<?php echo $name ?>" > 

        </div>

        <div class="form-group">
            <label>Phone:<span style="color:red;">*</span></label>
            <input type="text" class="form-control" name="dt" required value="<?php echo $phone ?>" >

        </div>

        <div class="form-group">
            <label>Address:<span style="color:red;">*</span></label>
            <input type="text" class="form-control" name="ar" required value="<?php echo $ar ?>">

        </div>

        <div class="form-group">
            <label>Email:<span style="color:red;">*</span></label>
            <input type="email" class="form-control" name="mail" required value="<?php echo $mail ?>">

        </div>

        <div class="form-group">
            <label>Password:<span style="color:red;">*</span></label>
            <input type="password" class="form-control" name="mk" required>
        </div>
        <div class="form-group">
            <label>Nhập lại Password:<span style="color:red;">*</span></label>
            <input type="password" class="form-control" name="mk1" required>
        </div>
        <button type="submit" class="btn btn-primary" name="btndangky">Đăng ký</button>
    </form>
</div>