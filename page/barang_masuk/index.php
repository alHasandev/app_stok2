<!-- fungsi ambil data table dari database -->
<?php

$data_table = data_table('detail_barang_masuk');
$data_barang = data_table('barang');

?>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <!-- tombah tambah data -->
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Tambah Barang Masuk</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="tableBarangMasuk" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Masuk</th>
              <th>Nama Barang</th>
              <th>Jenis Barang</th>
              <th>Harga Satuan</th>
              <th>Jumlah</th>
              <th>Total Harga</th>
              <th>Operations</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1 ?>
            <?php while ($data = $data_table->fetch_assoc()) : ?>

              <tr>
                <td><?= $no ?></td>
                <td><?= tanggal($data['tgl_masuk']) ?></td>
                <td><?= $data['nama_barang'] ?></td>
                <td><?= $data['nama_jenis'] ?></td>
                <td><?= rupiah($data['harga']) ?></td>
                <td><?= $data['jumlah'] ?></td>
                <td><?= rupiah($data['harga'] * $data['jumlah']) ?></td>
                <td>
                  <a href="#" class="badge badge-success" data-toggle="modal" data-target="#formModal" onclick='editBarangMasuk(`<?= json_encode($data) ?>`)'>
                    <i class="fas fa-edit"></i>
                    Edit
                  </a>
                  <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteModal" onclick='deleteModal(`barang_masuk`, `<?= json_encode($data) ?>`, `nama_barang`)'>
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
    <form action="<?= page('barang_masuk', 'add') ?>" method="POST" id="formBarangMasuk" class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="formModalLabel">Tambah Barang Masuk</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="resetForm()">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- edit untuk mengubah isi form -->
        <input type="hidden" name="id" id="id" value="">
        <div class="form-group">
          <label for="id_barang">Pilih Barang</label>
          <select class="form-control select2" name="id_barang" id="id_barang" style="width: 100%;">
            <!-- <option value="1">Default - </option> -->
            <?php while ($barang = $data_barang->fetch_assoc()) : ?>
              <option value="<?= $barang['id'] ?>"><?= $barang['nama_barang'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="tgl_masuk">Tanggal Masuk</label>
          <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control">
        </div>
        <div class="form-group">
          <label for="jumlah">Jumlah</label>
          <input type="number" name="jumlah" id="jumlah" class="form-control">
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