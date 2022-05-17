<!-- fungsi ambil data table dari database -->
<?php

$data_table = data_table('child_items');
$data_parents = data_table('nav_items');

?>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <!-- tombah tambah data -->
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#formModal">New Child Item</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="tableMenuChild" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nav Parent</th>
              <th>Nav Name</th>
              <th>Nav Link</th>
              <th>Operations</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1 ?>
            <?php while ($data = $data_table->fetch_assoc()) : ?>

              <tr>
                <td><?= $no ?></td>
                <td><?= $data['nav_parent'] ?></td>
                <td><?= $data['nav_name'] ?></td>
                <td><?= $data['nav_link'] ?></td>
                <td>
                  <a href="#" class="badge badge-success" data-toggle="modal" data-target="#formModal" onclick='editMenuItem(`<?= json_encode($data) ?>`)'>
                    <i class="fas fa-edit"></i>
                    Edit
                  </a>
                  <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteModal" onclick='deleteModal(`menu_childs`, `<?= json_encode($data) ?>`, `nav_name`)'>
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
    <form action="<?= page('menu_childs', 'add') ?>" method="POST" id="formMenuItem" class="modal-content">
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
          <label for="header_name">Choose Nav Parent</label>
          <select class="form-control select2" name="nav_header" id="nav_header" style="width: 100%;">
            <!-- <option value="1">Default - </option> -->
            <?php while ($parent = $data_parents->fetch_assoc()) : ?>
              <option value="<?= $parent['id'] ?>"><?= $parent['nav_name'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="nav_header">Nav Name</label>
          <input type="text" name="nav_header" id="nav_header" class="form-control">
        </div>
        <div class="form-group">
          <label for="nav_link">Nav Link</label>
          <input type="text" name="nav_link" id="nav_link" class="form-control">
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