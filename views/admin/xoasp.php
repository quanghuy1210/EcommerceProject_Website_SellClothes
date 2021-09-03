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
            <h2 style="text-align: center;">Bạn Có  Chắc Muốn Xóa Sản Phẩm Này</h2>
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
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td><?php echo $xem["product"][0]['id']?></td>
                            <td><?php echo $xem["product"][0]['name']?></td>
                            <td><?php echo $xem["product"][0]['price']?></td>
                            <td><?php echo $xem["product"][0]['discount']?></td>
                            <td style="width:20%"><img src="../image/<?php echo $xem["product"][0]["image_link"]?>" class="img-responsive" style="width:70%;height: 100px;" alt="Image"></td>
                            <th><?php echo $xem["product"][0]['rate_total']?></th>
                            <th><?php echo $xem["product"][0]['rate_count']?></th>
                        </tr>
                </tbody>
            </table>
            
            <div>
                <table style="width: 100%;">
                    <tr>
                        <th style="text-align: center;"><h3><a href="?url1=danhmuc">//Trở Về</a></h3></th>
                        <th style="text-align: center;"><h3><a href="?url1=xoasp&&id=<?php echo $xem["product"][0]['id']?>">Xóa\\</a></h3></th>
                    </tr>
                </table>

            </div>


        </div>
    </div>
</div>