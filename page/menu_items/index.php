<!-- fungsi ambil data table dari database -->
<?php

$data_table = data_table('nav_items');
$data_headers = data_table('nav_headers');

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
        <table id="tableMenuItem" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Header Name</th>
              <th>Nav Name</th>
              <th>Nav Icon</th>
              <th>Nav Link</th>
              <th>Has Child Item</th>
              <th>Operations</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1 ?>
            <?php while ($data = $data_table->fetch_assoc()) : ?>

              <tr>
                <td><?= $no ?></td>
                <td><?= $data['nav_header'] ?></td>
                <td><?= $data['nav_name'] ?></td>
                <td><?= $data['nav_icon'] ?></td>
                <td><?= $data['nav_link'] ?></td>
                <td><?= $data['child_item'] ?></td>
                <td>
                  <a href="#" class="badge badge-success" data-toggle="modal" data-target="#formModal" onclick='editMenuItem(`<?= json_encode($data) ?>`)'>
                    <i class="fas fa-edit"></i>
                    Edit
                  </a>
                  <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteModal" onclick='deleteModal(`menu_items`, `<?= json_encode($data) ?>`, `header_name`)'>
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
    <form action="<?= page('menu_items', 'add') ?>" method="POST" id="formMenuItem" class="modal-content">
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
          <label for="header_name">Choose Header</label>
          <select class="form-control select2" name="nav_header" id="nav_header" style="width: 100%;">
            <!-- <option value="1">Default - </option> -->
            <?php while ($header = $data_headers->fetch_assoc()) : ?>
              <option value="<?= $header['id'] ?>"><?= $header['header_name'] . ' - ' . $header['header_text'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="nav_header">Nav Name</label>
          <input type="text" name="nav_header" id="nav_header" class="form-control">
        </div>
        <div class="form-group">
          <label for="nav_icon">Nav Icon</label>
          <input type="text" name="nav_icon" id="nav_icon" class="form-control">
        </div>
        <div class="form-group">
          <label for="nav_link">Nav Link</label>
          <input type="text" name="nav_link" id="nav_link" class="form-control">
        </div>
        <div class="form-group">
          <label for="child_item">Has Child Item ?</label>
          <div class="icheck-success">
            <input type="radio" checked value="1" name="child_item" id="child_item_1">
            <label for="child_item_1">
              Yes
            </label>
          </div>
          <div class="icheck-danger">
            <input type="radio" value="0" name="child_item" id="child_item_2">
            <label for="child_item_2">
              No
            </label>
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