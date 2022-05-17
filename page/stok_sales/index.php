<!-- fungsi ambil data table dari database -->
<?php

$data_table = data_table('stok_sales');

?>


<div class="row">
  <?php while ($data = $data_table->fetch_assoc()) : ?>
    <div class="col-md-4">
      <a href="#" class="nav-link">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-info">
            <h3 class="widget-user-username"><?= $data['nama_sales'] ?></h3>
            <h6 class="widget-user-desc"><?= $data['gender'] ?> | <?= $data['kontak'] ?></h6>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="<?= base_url('assets/img/sales/' . $data['image']) ?>" alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header"><?= $data['lunas'] ?></h5>
                  <span class="description-text">LUNAS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header"><?= $data['belum_lunas'] ?></h5>
                  <span class="description-text">BELUM LUNAS</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header"><?= $data['lunas'] + $data['belum_lunas'] ?></h5>
                  <span class="description-text">TOTAL</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
      </a>
    </div>
    <!-- /.col -->
  <?php endwhile; ?>
</div>
<!-- /.row -->