<div style="margin:30px auto;width: 90%;">
    <div class="row">
        <div class="col-sm-12">
            <h2>Cẩn Thận Khi Nhập Liệu</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Địa Chỉ</th>
                        <th>Nút Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($xem['user'] as $k => $v) {
                    ?>
                        <tr>
                            <td><?php echo $v['id']; ?></td>
                            <td><?php echo $v['name']; ?></td>
                            <td><?php echo $v['email']; ?></td>
                            <td><?php echo $v['phone']; ?></td>
                            <td><?php echo $v['address']; ?></td>
                            <th>Xóa</th>
                        </tr>
                    <?php


                    }?>
                </tbody>
            </table>


        </div>
    </div>

    <a href="?url1=main">
        <h4>/Trở Lại/</h4>
    </a>
</div>