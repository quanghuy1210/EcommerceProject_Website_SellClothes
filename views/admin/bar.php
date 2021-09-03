<div style="margin:30px auto;width: 90%;">
  <div class="row">
    <div class="col-sm-3 jumbotron">
      <h4>Danh Mục</h4>
      <ul class="nav nav-pills flex-column">
        <?php
        if (isset($xem["catalog"])) {
          foreach ($xem["catalog"] as $k => $v) {

        ?>
            <li class="nav-item" style="margin-top: 5px;margin-bottom: 5px;">
              <a class="nav-link active" href="?url1=voucher&&id=<?php echo $v['id']; ?>"><?php echo $v['name']; ?></a>
            </li>
        <?php
          }
        }

        ?>
      </ul>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-9">