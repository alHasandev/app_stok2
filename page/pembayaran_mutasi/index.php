<!-- fungsi ambil data table dari database -->
<?php

$data_table = data_table('detail_mutasi');
$data_sales = data_table('sales');
$data_barang = data_table('barang');

?>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <!-- tombah tambah data -->
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Tambah Mutasi</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="dataTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Mutasi</th>
              <th>Nama Sales</th>
              <th>Nama Barang</th>
              <th>Sudah DiBayar</th>
              <th>Belum DiBayar</th>
              <th>Catatan</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1 ?>
            <?php while ($data = $data_table->fetch_assoc()) : ?>

              <tr>
                <td><?= $no ?></td>
                <td><?= tanggal($data['tgl_mutasi']) ?></td>
                <td><?= $data['nama_sales'] ?></td>
                <td><?= $data['nama_barang'] ?></td>
                <td><?= rupiah($data['pembayaran']) ?></td>
                <td><?= rupiah($data['total_harga'] - $data['pembayaran']) ?></td>
                <td><?= keterangan_mutasi($data['total_harga'], $data['pembayaran']) ?></td>
                <td>
                  <a href="#" class="badge badge-info" data-toggle="modal" data-target="#formBayar">
                    <i class="fas fa-search"></i>
                    Detail
                  </a>
                  <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#formModal2" onclick='bayarMutasi(`<?= json_encode($data) ?>`)'>
                    <i class="fas fa-plus"></i>
                    Bayar
                  </a>
                  <br>
                  <a href="#" class="badge badge-success" data-toggle="modal" data-target="#formModal" onclick='editMutasi(`<?= json_encode($data) ?>`)'>
                    <i class="fas fa-edit"></i>
                    Edit
                  </a>
                  <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteModal" onclick='deleteModal(`mutasi_barang`, `<?= json_encode($data) ?>`)'>
                    <i class="fas fa-trash"></i>
                    Hapus
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
    <form action="<?= page('mutasi_barang', 'add') ?>" method="POST" id="formBayarMutasi" class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="formModalLabel">Tambah Mutasi Barang</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="resetForm()">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- edit untuk mengubah isi form -->
        <input type="hidden" name="id" id="id" value="">
        <div class="form-group">
          <label for="tgl_mutasi">Tanggal Mutasi</label>
          <input type="date" name="tgl_mutasi" id="tgl_mutasi" class="form-control">
        </div>
        <div class="form-group">
          <label for="id_sales">Pilih Sales</label>
          <select class="form-control select2" name="id_sales" id="id_sales" style="width: 100%;">
            <!-- <option value="1">Default - </option> -->
            <?php while ($sales = $data_sales->fetch_assoc()) : ?>
              <option value="<?= $sales['id'] ?>"><?= $sales['nama_sales'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
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

<!-- Form Modal untuk tambah pembayaran mutasi -->
<div class="modal fade show" id="formModal2" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- atur form disini -->
    <form action="<?= page('pembayaran_mutasi', 'add') ?>" method="POST" id="formMutasi" class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="formModalLabel">Pembayaran Mutasi Barang</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="resetForm()">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- edit untuk mengubah isi form -->
        <input type="hidden" name="id" id="id" value="">
        <input type="hidden" name="id_mutasi" id="id_mutasi" value="">
        <div class="row">
          <div class="col-sm-5">
            <!-- text input -->
            <div class="form-group">
              <label for="tgl_pembayaran">Tanggal</label>
              <input type="date" name="tgl_pembayaran" id="tgl_pembayaran" class="form-control" readonly>
            </div>
          </div>
          <div class="col-sm-7">
            <div class="form-group">
              <label for="sisa">Nama Sales</label>
              <input type="text" name="sisa" id="sisa" class="form-control" readonly>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="sisa">Keterangan Barang</label>
              <input type="text" name="sisa" id="sisa" class="form-control" readonly>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label for="akan_dibayar">Akan Dibayar</label>
              <input type="number" name="akan_dibayar" id="akan_dibayar" class="form-control" readonly>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="nominal">Nominal Bayar</label>
              <input type="number" name="nominal" id="nominal" class="form-control">
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <!-- ubah tombol form -->
        <button class="btn btn-secondary" type="reset" data-dismiss="modal" onclick="resetForm()">Cancel</button>
        <input type="submit" class="btn btn-primary" value="Tambah Pembayaran">
      </div>
    </form>
  </div>
</div>