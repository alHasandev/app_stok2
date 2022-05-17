<!-- fungsi ambil data table dari database -->
<?php

$data_table = data_table('detail_users');
$data_privileges = data_table('privileges');

?>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <!-- tombah tambah data -->
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Tambah User</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="dataTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Image</th>
              <th>Username</th>
              <th>Privilege</th>
              <th>Operations</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1 ?>
            <?php while ($data = $data_table->fetch_assoc()) : ?>

              <tr>
                <td><?= $no ?></td>
                <td>
                  <img src="<?= base_url($data['image']) ?>" width="75" class="img-fluid rounded-sm" alt="Responsive image">
                </td>
                <td><?= $data['username'] ?></td>
                <td><?= $data['privilege'] ?></td>
                <td>
                  <a href="#" class="badge badge-success" data-toggle="modal" data-target="#formModal" onclick='editUser(`<?= json_encode($data) ?>`)'>
                    <i class="fas fa-edit"></i>
                    Edit
                  </a>
                  <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteModal" onclick='deleteModal(`users`, `<?= json_encode($data) ?>`, `username`)'>
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
    <form action="<?= page('users', 'add') ?>" method="POST" id="formUsers" class="modal-content" enctype="multipart/form-data">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="formModalLabel">Add New User</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="resetForm()">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- edit untuk mengubah isi form -->
        <input type="hidden" name="id" id="id" value="">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label for="password1">Password</label>
              <input type="password" name="password1" id="password1" class="form-control">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="password2">Confirm Password</label>
              <input type="password" name="password2" id="password2" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="privilege">Choose Privilege</label>
          <select class="form-control select2" name="privilege" id="privilege" style="width: 100%;">
            <!-- <option value="1">Default - </option> -->
            <?php while ($privilege = $data_privileges->fetch_assoc()) : ?>
              <option value="<?= $privilege['id'] ?>"><?= $privilege['name'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="image">Image</label>
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