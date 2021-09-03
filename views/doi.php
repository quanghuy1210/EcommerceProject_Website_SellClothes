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
    <h2 style="text-align: center;">Trang Đổi Thông Tin</h2>
    <div class="list-group">
        <div> 
        <?php
            if(isset($_SESSION['loiuser'])){
                if($_SESSION['loiuser']=="Lưu Thành Công"){
                    echo '<span><h3 class ="dung">'.$_SESSION['loiuser'].'</h3></span>';
                    unset($_SESSION['loiuser']);
                }
                else {
                    echo '<span><h3 class ="loi">'.$_SESSION['loiuser'].'</h3></span>';
                    unset($_SESSION['loiuser']);
                }
                
            }
        ?>
        </div>
        <h3 style="margin:auto; display:block;"><a href="?url1=viewdoiMKUser&&id=<?php echo $xem["user"][0]["id"]?>">Đổi Mật Khẩu</a></h3>
        
        <form role="form" action="?url1=suaUser&&id=<?php echo $xem["user"][0]["id"]?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Người Dùng</label>
                <input type="text" name="name" class="form-control" value="<?php echo ($xem["user"][0]["name"])?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo ($xem["user"][0]["email"])?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Số Điện Thoại</label>
                <input type="text" name="phone" class="form-control" value="<?php echo ($xem["user"][0]["phone"])?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Địa Chỉ</label>
                <input type="text" name="address" class="form-control" value="<?php echo ($xem["user"][0]["address"])?>">
            </div>
            

            <button style="margin:auto; display:block;" type="submit" name="add_category" class="btn btn-info">Cập Nhật</button>
        </form>
    </div>
    <br>




</div>



</div>
</div>
</div>