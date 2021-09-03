<?php
include_once "inc.php";
$name = postIndex('name');
$pass = md5(postIndex('pass'));
$n = false;
if($name != ""){
    foreach ($xem['user'] as $k => $v) {
        if ($name == $v['email'] && $pass == $v['password'] || $name == $v['name'] && $pass == $v['password']) {
            $_SESSION["name"]  = $v['name'];
            $_SESSION["idnguoidung"]  = $v['id'];
            $n = true;
        }
    }
} 
?>
<legend style="text-align: center;">Đăng Nhập Tài Khoản</legend>
<div class="container">
    <form action="" method="post">
        <div>
            <?php
            if ($name != "") {
                if ($n == true) {
                    header('location:index.php');
                } else {
            ?>
                <label style="background-color:rgb(254, 1, 0);">Bạn Đã Nhập Sai email hoặc password</label>
            <?php
                }
            }
            ?>
        </div>
        <div class="form-group">
            <label for="usr">Name or Gmail :</label>
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
            <label for="pwd">Password :</label>
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
    </form>
</div>
  