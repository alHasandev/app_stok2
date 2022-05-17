<!-- fungsi ambil data table dari database -->
<?php

$data_table = data_table('sales');

?>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <!-- tombah tambah data -->
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#formModal">New Menu Item</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="dataTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Image</th>
              <th>Nama Sales</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Kontak</th>
              <th>Alamat</th>
              <th>Operations</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1 ?>
            <?php while ($data = $data_table->fetch_assoc()) : ?>

              <tr>
                <td><?= $no ?></td>
                <td>
                  <img src="<?= base_url('assets/img/sales/' . $data['image']) ?>" width="75" class="img-fluid rounded-sm" alt="Responsive image">
                </td>
                <td><?= $data['nama_sales'] ?></td>
                <td><?= $data['gender'] ?></td>
                <td><?= tanggal($data['tgl_lahir']) ?></td>
                <td><?= $data['kontak'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td>
                  <a href="#" class="badge badge-success" data-toggle="modal" data-target="#formModal" onclick='editSales(`<?= json_encode($data) ?>`)'>
                    <i class="fas fa-edit"></i>
                    Edit
                  </a>
                  <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteModal" onclick='deleteModal(`sales`, `<?= json_encode($data) ?>`, `nama_sales`)'>
                    <i class="fas fa-trash"></i>
                    Delete
                  </a>
                </td>
              </tr>
              <?php $no++ ?>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<!-- Modal -->

<!-- Form Modal untuk tambah dan Edit Data -->
<div class="modal fade show" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- atur form disini -->
    <form action="<?= page('sales', 'add') ?>" method="POST" id="formSales" class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="formModalLabel">Tambah Sales Baru</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="resetForm()">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- edit untuk mengubah isi form -->
        <input type="hidden" name="id" id="id" value="">
        <div class="form-group">
          <label for="nama_sales">Nama Sales</label>
          <input type="text" name="nama_sales" id="nama_sales" class="form-control">
        </div>
        <div class="form-group">
          <label for="child_item">Jenis Kelamin</label>
          <div class="icheck-success">
            <input type="radio" checked value="Laki-Laki" name="gender" id="gender_1">
            <label for="gender_1">
              Laki-Laki
            </label>
          </div>
          <div class="icheck-danger">
            <input type="radio" value="Perempuan" name="gender" id="gender_2">
            <label for="gender_2">
              Perempuan
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="tgl_lahir">Tanggal Lahir</label>
          <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
        </div>
        <div class="form-group">
          <label for="kontak">Kontak</label>
          <input type="varchar" name="kontak" id="kontak" class="form-control">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="nav_link">Image</label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" id="image">
            <label class="custom-file-label" for="image">Choose file</label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <!-- ubah tombol form -->
        <button class="btn btn-secondary" type="reset" data-dismiss="modal" onclick="resetForm()">Cancel</button>
        <input type="submit" class="btn btn-primary" value="Add">
      </div>
    </form>
  </div>
</div>