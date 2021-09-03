<style>
.button2 {
    margin:10px auto;
    background-color: #008CBA;
    color: white;
    border: 2px solid #008CBA;
}

.button2:hover {
    background-color: white; 
    color: black;
}

</style>


<div style="margin:30px auto;width: 90%;">
    <div class="row">
        <div class="col-sm-12">
            <h2>Cẩn Thận Khi Nhập Liệu</h2>
            <h4>Nhấn để thêm sản phẩm : <a href="?url1=viewthemsp">Thêm Sản Phẩm</a> </h4>
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Discount</th>
                        <th>Hình</th>
                        <th>rate_total</th>
                        <th>rate_count</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($xem['product'] as $k => $v) {
                    ?>
                        <tr>
                            <td><?php echo $v['id']; ?></td>
                            <td><?php echo $v['name']; ?></td>
                            <td><?php echo $v['price']; ?></td>
                            <td><?php echo $v['discount']; ?></td>
                            <td><img src="../image/<?php echo $v["image_link"]; ?>" class="img-responsive" style="width:90%;height: 100px;" alt="Image"></td>
                            <th><?php echo $v['rate_total']; ?></th>
                            <th><?php echo $v['rate_count']; ?></th>
                            <th><a href="?url1=suasp&&id=<?php echo $v["id"]?>">Sửa</a></th>
                            <th><a href="?url1=viewxoasp&&id=<?php echo $v["id"]?>">Xóa</a></th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>


        </div>
    </div>


</div>
</div>
</div>
</div>