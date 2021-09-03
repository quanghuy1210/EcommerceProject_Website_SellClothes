<style>
    .ct {
        background-color: rgb(214, 214, 194);
    }
    .loi{
        color: red;
    }
    .dung{
        color: green;
    }
</style>

<div class="container ct">
    <h2 style="text-align: center;">Đổi Mật Khẩu</h2>
    <div class="list-group">
        <div>
        <?php
            if(isset($_SESSION['loidoimk'])){
                if($_SESSION['loidoimk']=="Lưu Thành Công"){
                    echo '<span><h3 class ="dung">'.$_SESSION['loidoimk'].'</h3></span>';
                    unset($_SESSION['loidoimk']);
                }
                else {
                    echo '<span><h3 class ="loi">'.$_SESSION['loidoimk'].'</h3></span>';
                    unset($_SESSION['loidoimk']);
                }
            }
        ?>
        </div>
        <form role="form" action="?url1=doimkuser&&id=<?php echo $xem["user"][0]["id"]?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Mật Khẩu Củ</label>
                <input type="password" name="pass" class="form-control" id="kiemtra" onchange="kiemtra()">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mật Khẩu Mới</label>
                <input type="password" name="newpass" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nhập Lại</label>
                <input type="password" name="newpass1" class="form-control">
            </div>

            <button style="margin:auto; display:block;" type="submit" name="add_category" class="btn btn-info">Cập Nhật</button>
        </form>
    </div>
    <br>



</div>



</div>
</div>
</div>