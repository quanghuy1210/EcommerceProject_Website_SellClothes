<style>
    .ct {
        background-color: rgb(214, 214, 194);
    }
</style>
<div class="container ct">
    <h2 style="text-align: center;">Lịch Sử Mua Hàng</h2>
    <div class="list-group">
        <?php 
            if(empty($xem["transaction"])){
            ?>
                <h3 style="text-align: center; margin-top: 100px; margin-bottom:100px ;">Bạn Chưa Có Giao Dịch Nào</h3>
            <?php 
            }
            else{
            ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Mã Giao Dịch</th>
                            <th>Người Dùng</th>
                            <th>Phone</th>
                            <th>Địa Chỉ</th>
                            <th>Chú Thích</th>
                            <th>Thành Tiền</th>
                            <th>Ngày Giao Dịch</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($xem["transaction"] as $v){
                                ?>
                        <tr>
                            <td><?php echo $v['user_id']?></td>
                            <td><?php echo $v['user_name']?></td>
                            <td><?php echo $v['user_phone']?></td>
                            <td><?php echo $v['user_address']?></td>
                            <td><?php echo $v['message']?></td>
                            <td><?php echo $v['amount']?></td>
                            <td><?php echo $v['created']?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>

            <?php 
            }
        ?>
    </div>
</div>



</div>
</div>
</div>