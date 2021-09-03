<?php 
include_once "../inc.php";

$name = postIndex("name");
$content = postIndex("content");
$gia = postIndex("gia");
$discount = postIndex("discount");





?>

<style>
    .container {
        background-color: rgb(214, 214, 194);
    }
</style>
<div class="container">
    <h2 style="text-align: center;">Thêm Sản Phẩm</h2>
    <div class="list-group">
        <div> 
        <?php
            if(isset($_SESSION['loithemsp'])){
                echo "<span> <h3>".$_SESSION['loithemsp']."</h3></span>";
                unset($_SESSION['loithemsp']);
            }
        
        ?>
        </div>
        <form role="form" action="?url1=luusp" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name?>" id="exampleInputEmail1" placeholder="Tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Thuộc lớp danh mục</label>
                <select class="form-control input-sm m-bot15" name="parent_id">
                    <?php 
                        foreach ($xem["catalog"] as $k => $v) {
                            if ($v['parent_id'] != 0 && $v['parent_id'] != 1) {
                                echo '<option value =' . $v['id'] . '>' . $v['name'] . '</option>';
                            }
                        } 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nội dung</label>
                <textarea type="text" name="content" class="form-control" id="exampleInputPassword1" placeholder="<?php echo $content?>"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giá</label>
                <input type="text" name="gia" value="<?php echo $gia?>" class="form-control" id="exampleInputEmail1" placeholder="giá">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số tiền giảm</label>
                <input type="text" name="discount" value="<?php echo $discount?>" class="form-control" id="exampleInputEmail1" placeholder="giảm giá">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ảnh</label>
                <label for="myfile">Chọn ảnh:</label>
                <input type="file" name="image_link" class="form-control"><br>
            </div>
            <!-- <div class="form-group">
                <label for="exampleInputEmail1">list Ảnh</label>
                <label for="myfile">chon anh</label>
                <input type="file" name="image_list" multiple class="form-control"><br>
            </div> -->
            
            <button type="submit" name="add_category" class="btn btn-info">Thêm</button>
        </form>
    </div>
    <br>


    <a href="?url1=danhmuc" style="text-align: center;">
        <h5>//Trở Lại//</h5>
    </a>






</div>