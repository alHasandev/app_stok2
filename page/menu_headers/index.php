<!-- fungsi ambil data table dari database -->
<?php

$data_table = data_table('nav_headers');

?>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <!-- tombah tambah data -->
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#formModal">New Menu Header</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="tableMenuHeader" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Header Name</th>
              <th>Header Text</th>
              <th>Order Number</th>
              <th>Operations</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1 ?>
            <?php while ($data = $data_table->fetch_assoc()) : ?>

              <tr>
                <td><?= $no ?></td>
                <td><?= $data['header_name'] ?></td>
                <td><?= $data['header_text'] ?></td>
                <td><?= $data['order_place'] ?></td>
                <td>
                  <a href="#" class="badge badge-success" data-toggle="modal" data-target="#formModal" onclick='editMenuHeader(`<?= json_encode($data) ?>`)'>
                    <i class="fas fa-edit"></i>
                    Edit
                  </a>
                  <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteModal" onclick='deleteModal(`menu_headers`, `<?= json_encode($data) ?>`, `header_name`)'>
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
    <form action="<?= page('menu_headers', 'add') ?>" method="POST" id="formMenuHeader" class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="formModalLabel">Add New Menu Header</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="resetForm()">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- edit untuk mengubah isi form -->
        <input type="hidden" name="id" id="id" value="">
        <div class="form-group">
          <label for="header_name">Header Name</label>
          <input type="text" name="header_name" id="header_name" class="form-control">
        </div>
        <div class="form-group">
          <label for="header_text">Header Text</label>
          <input type="text" name="header_text" id="header_text" class="form-control">
        </div>
        <div class="form-group">
          <label for="order_place">Order Number</label>
          <input type="number" name="order_place" id="order_place" class="form-control">
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