<style>
    .container {
        background-color: rgb(214, 214, 194); 
    }
    .loi{
        color: red;
    }
    .dung{
        color: green;
    }
</style>
<div class="container">
    <h2 style="text-align: center;">Cập Nhật Sản Phẩm</h2>
    <div class="list-group">
        <div> 
        <?php
            if(isset($_SESSION['loisuasp'])){
                if($_SESSION['loisuasp']=="Lưu Thành Công"){
                    echo '<span><h3 class ="dung">'.$_SESSION['loisuasp'].'</h3></span>';
                    unset($_SESSION['loisuasp']);
                }
                else {
                    echo '<span><h3 class ="loi">'.$_SESSION['loisuasp'].'</h3></span>';
                    unset($_SESSION['loisuasp']);
                }
            }
        ?>
        </div>
        <form role="form" action="?url1=capnhatsp&&id=<?php echo $xem["product"][0]["id"]?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="<?php echo ($xem["product"][0]["name"])?>" id="exampleInputEmail1" placeholder="Tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Thuộc lớp danh mục</label>
                <select class="form-control input-sm m-bot15" name="parent_id">
                    <?php 
                        foreach ($xem["catalog"] as $k => $v) {
                            if ($v['parent_id'] != 0 && $v['parent_id'] != 1) {
                                if($v['id']== $xem["product"][0]["catalog_id"]){
                                    echo '<option value =' . $v['id'] . ' selected >' . $v['name'] . '</option>';
                                }
                                else echo '<option value =' . $v['id'] . '>' . $v['name'] . '</option>';
                            }
                        } 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nội dung</label>
                <!-- <input type="text" name="content" class="form-control" value="<?php echo ($xem["product"][0]["content"])?>" id="exampleInputEmail1" placeholder="noi dung"> -->
                <textarea type="text" name="content" class="form-control" id="exampleInputPassword1" placeholder="noi dung"><?php echo ($xem["product"][0]["content"])?> </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giá</label>
                <input type="text" name="gia" value="<?php echo ($xem["product"][0]["price"])?>" class="form-control" id="exampleInputEmail1" placeholder="giá">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số tiền giảm</label>
                <input type="text" name="discount" value="<?php echo ($xem["product"][0]["discount"])?>" class="form-control" id="exampleInputEmail1" placeholder="giảm giá">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ảnh</label>
                <label for="myfile">Chọn ảnh:</label>
                <input type="file" name="image_link" class="form-control"><br>
                <img src="../image/<?php echo ($xem["product"][0]["image_link"])?>" alt="hinh" class="img-rounded" style="width: 10%;">
                
            </div>
            
            
            <button type="submit" name="add_category" class="btn btn-info">Cập Nhật</button>
        </form>
    </div>
    <br>


    <a href="?url1=danhmuc" style="text-align: center;">
        <h5>//Trở Lại//</h5>
    </a>




</div>