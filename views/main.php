<style>
    .c:hover {
        width: 100%;
    }

    .vidu2 { 
        text-decoration: line-through;
    }

</style>
<div class="container text-center" style="margin-top:15px;">
    <h3>Các Ưu Đãi <span class="badge badge-secondary">Mới</span></h3>
    <br>
    <div class="row">
        <?php
        if(isset($xem)){
            foreach ($xem["product"] as $k => $v) {
            $t = $v["price"] - $v["discount"]
        ?>
            <div class="col-sm-4">
                <a href="?url1=chitiet&&id=<?php echo $v['id']; ?>"><img src="image/<?php echo $v["image_link"]; ?>" class="img-responsive" style="width:100%;height: 350px;" alt="Image"></a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $v["name"]; ?></h5>
                    <p class="vidu2">Giá Củ: <?php echo number_format($v["price"]); ?> vnd</p> 
                    <p>Giá Mới: <?php echo number_format($t); ?> vnd</p>
                    <?php 
                        if (isset($_SESSION['name'])){ 
                    ?>
                        <a href="?url1=gio&&sl=1&&id=<?php echo $v['id']; ?>" class="btn btn-primary c">Thêm Vào Giỏ</a>
                    <?php  
                        }
                        else{
                    ?>
                        <p class="btn btn-primary c" onclick="btn1()">Thêm Vào Giỏ</p>
                    <?php 
                        }
                    ?>
                </div>
                
            </div>
        <?php
            }
        }?>
    </div>
</div>
<?php 
if(isset($xem["total_page"])){
?>
<div class="container">
  <ul class="pagination justify-content-end">
    
    <?php 
    if(isset($_GET['page'])){
        if($_GET['page'] !=1 ){
    ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $_GET['page'] - 1?>">Previous</a></li>
    <?php 
        } 
    }
    ?>
    <?php
    for ($i=0; $i < $xem["total_page"]; $i++) {
        $page = $i+1;
    ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $page ?>"><?php echo $page?></a></li>
    <?php
    }
    if(isset($_GET['page']) && $_GET['page'] != $xem["total_page"]){
        ?>
        <li class="page-item"><a class="page-link" href="?page=<?php echo $_GET['page'] + 1?>">Next</a></li>
        <?php
    }
    ?>  
  </ul>
</div>
<?php 
}
?>
<script type="text/javascript">
    function btn1() {
        alert("Phải Đăng Nhập Trước Khi Thêm Giỏ Hàng")
    }
</script>
</div>
</div>
</div>