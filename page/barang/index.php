<!-- fungsi ambil data table dari database -->
<?php

$data_table = data_table('detail_barang');
$data_jenis = data_table('jenis');

?>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <!-- tombah tambah data -->
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Tambah Barang</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="tableMenuItem" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Jenis Barang</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Keterangan</th>
              <th>Operations</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1 ?>
            <?php while ($data = $data_table->fetch_assoc()) : ?>

              <tr>
                <td><?= $no ?></td>
                <td><?= $data['nama_barang'] ?></td>
                <td><?= $data['nama_jenis'] ?></td>
                <td><?= rupiah($data['harga']) ?></td>
                <td><?= $data['stok'] ?></td>
                <td><?= $data['keterangan'] ?></td>
                <td>
                  <a href="#" class="badge badge-success" data-toggle="modal" data-target="#formModal" onclick='editBarang(`<?= json_encode($data) ?>`)'>
                    <i class="fas fa-edit"></i>
                    Edit
                  </a>
                  <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteModal" onclick='deleteModal(`barang`, `<?= json_encode($data) ?>`, `nama_barang`)'>
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
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- atur form disini -->
    <form action="<?= page('barang', 'add') ?>" method="POST" id="formBarang" class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="formModalLabel">Add New Menu Item</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="resetForm()">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- edit untuk mengubah isi form -->
        <input type="hidden" name="id" id="id" value="">
        <div class="form-group">
          <label for="nama_barang">Nama Barang</label>
          <input type="text" name="nama_barang" id="nama_barang" class="form-control">
        </div>
        <!-- text input -->
        <div class="form-group">
          <label for="id_jenis">Pilih Jenis Barang</label>
          <select class="form-control select2" name="id_jenis" id="id_jenis" style="width: 100%;">
            <!-- <option value="1">Default - </option> -->
            <?php while ($jenis = $data_jenis->fetch_assoc()) : ?>
              <option value="<?= $jenis['id'] ?>"><?= $jenis['nama_jenis'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="harga">Harga Barang</label>
          <input type="number" name="harga" id="harga" class="form-control">
        </div>
        <div class="form-group">
          <label for="stok">Stok</label>
          <input type="number" name="stok" id="stok" class="form-control">
        </div>
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
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