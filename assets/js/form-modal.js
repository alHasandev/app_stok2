function urlParam(name) {
  const results = new RegExp("[?&]" + name + "=([^&#]*)").exec(
    window.location.href
  );

  return results[1] || 0;
}

// fungsi saat menekan tombol delete
function deleteModal(page, data, name = "nama") {
  // convert data ke json
  data = JSON.parse(data);

  const id = data.id;
  const param = data[name] ? data[name] : page;

  const deleteHref = $("#deleteLink").attr("href");
  // console.log(deleteHref.length);
  $("#deleteBody span").html(param);

  $("#deleteLink").attr(
    "href",
    deleteHref + "?page=" + page + "&aksi=delete&id=" + id
  );
}

// fungsi reset form seperti semula
function resetForm() {
  // trigger reset
  $("#formModal form").trigger("reset");
  // const formAction = $('#formModal form').attr('action');

  // ubah action dari form menjadi edit
  let tambahAction = window.location.href + "&aksi=add";

  $("#formModal form").attr("action", tambahAction);

  // ubah judul form
  $("#formModalLabel").html("Tambah");

  // // ubah tombol edit menjadi tambah
  $("input[type=submit]").val("Tambah");

  // reset modal hapus
  const deleteHref = $("#deleteLink").attr("href").substr(0, 26);
  $("#deleteModal a").attr("href", deleteHref);
}

// kode diatas tidak perlu diubah, ubah, tambah dan sesuaikan lah kode dibawah, ex: tinggal copas dan sesuaikan

// fungsi saat menekan tombol edit

// fungsi untuk edit menu header
function editMenuHeader(data) {
  // parse json data menjadi objek
  data = JSON.parse(data);
  // ikuti pola sesuaikan dengan id pada form modal data

  // ubah action dari form menjadi edit
  let editAction = window.location.href + "&aksi=edit";
  $("#formMenuHeader").attr("action", editAction);

  // ubah judul form
  $("#formModalLabel").html("Edit Menu Header");

  // ubah tombol tambah menjadi edit
  $("#formMenuHeader input[type=submit]").val("Edit");

  // ubah dan tambahkan sesuai form kalian
  $("#id").val(data.id);
  $("#header_name").val(data.header_name);
  $("#header_text").val(data.header_text);
  $("#order_place").val(data.order_place);
}

// fungsi untuk edit menu header
function editMenuItem(data) {
  // parse json data menjadi objek
  data = JSON.parse(data);
  // ikuti pola sesuaikan dengan id pada form modal data

  // ubah action dari form menjadi edit
  let editAction = window.location.href + "&aksi=edit";
  $("#formMenuHeader").attr("action", editAction);

  // ubah judul form
  $("#formModalLabel").html("Edit Menu Header");

  // ubah tombol tambah menjadi edit
  $("#formMenuHeader input[type=submit]").val("Edit");

  // ubah dan tambahkan sesuai form kalian
  $("#id").val(data.id);
  $("#header_name").val(data.header_name);
  $("#header_text").val(data.header_text);
  $("#order_place").val(data.order_place);
}

// fungsi untuk edit barang
function editBarang(data) {
  // parse json data menjadi objek
  data = JSON.parse(data);
  console.log(data);
  // ikuti pola sesuaikan dengan id pada form modal data

  // ubah action dari form menjadi edit
  let editAction = window.location.href + "&aksi=edit";
  $("#formBarang").attr("action", editAction);

  // ubah judul form
  $("#formModalLabel").html("Edit Barang");

  // ubah tombol tambah menjadi edit
  $("#formBarang input[type=submit]").val("Edit");

  // ubah dan tambahkan sesuai form kalian
  $("#id").val(data.id);
  $("#nama_barang").val(data.nama_barang);
  $("#id_jenis").val(data.id_jenis);
  $("#harga").val(data.harga);
  $("#stok").val(data.stok);
  $("#keterangan").val(data.keterangan);
}

// fungsi untuk edit jenis barang
function editJenisBarang(data) {
  // parse json data menjadi objek
  data = JSON.parse(data);
  console.log(data);
  // ikuti pola sesuaikan dengan id pada form modal data

  // ubah action dari form menjadi edit
  let editAction = window.location.href + "&aksi=edit";
  $("#formJenisBarang").attr("action", editAction);

  // ubah judul form
  $("#formModalLabel").html("Edit Jenis Barang");

  // ubah tombol tambah menjadi edit
  $("#formJenisBarang input[type=submit]").val("Edit");

  // ubah dan tambahkan sesuai form kalian
  $("#id").val(data.id);
  $("#nama_jenis").val(data.nama_jenis);
}

// fungsi untuk edit jenis barang
function editBarangMasuk(data) {
  // parse json data menjadi objek
  data = JSON.parse(data);
  console.log(data);
  // ikuti pola sesuaikan dengan id pada form modal data

  // ubah action dari form menjadi edit
  let editAction = window.location.href + "&aksi=edit";
  $("#formBarangMasuk").attr("action", editAction);

  // ubah judul form
  $("#formModalLabel").html("Edit Barang Masuk");

  // ubah tombol tambah menjadi edit
  $("#formBarangMasuk input[type=submit]").val("Edit");

  // ubah dan tambahkan sesuai form kalian
  $("#id").val(data.id);
  $("#id_barang").val(data.id_barang);
  $("#tgl_masuk").val(data.tgl_masuk);
  $("#jumlah").val(data.jumlah);
}

// fungsi untuk edit users
function editUser(data) {
  // parse json data menjadi objek
  data = JSON.parse(data);

  // ikuti pola sesuaikan dengan id pada form modal data

  // ubah action dari form menjadi edit
  let editAction = window.location.href + "&aksi=edit";
  $("#formUsers").attr("action", editAction);

  // ubah judul form
  $("#formModalLabel").html("Edit User");

  // ubah tombol tambah menjadi edit
  $("#formUsers input[type=submit]").val("Edit");

  // ubah dan tambahkan sesuai form kalian
  $("#id").val(data.id);
  $("#username").val(data.username);
  $("#privilege").val(data.privilege);
  // $('#image').val(data.image);
}

// fungsi untuk edit mutasi
function editMutasi(data) {
  // parse json data menjadi objek
  data = JSON.parse(data);

  // ikuti pola sesuaikan dengan id pada form modal data

  // ubah action dari form menjadi edit
  let editAction = window.location.href + "&aksi=edit";
  $("#formMutasi").attr("action", editAction);

  // ubah judul form
  $("#formModalLabel").html("Edit Mutasi");

  // ubah tombol tambah menjadi edit
  $("#formMutasi input[type=submit]").val("Edit");

  // ubah dan tambahkan sesuai form kalian
  $("#id").val(data.id);
  $("#tgl_mutasi").val(data.tgl_mutasi);
  $("#id_barang").val(data.id_barang);
  $("#id_sales").val(data.id_sales);
  $("#jumlah").val(data.jumlah);
  // $('#image').val(data.image);
}

// fungsi untuk bayar mutasi
function bayarMutasi(data) {
  // parse json data menjadi objek
  data = JSON.parse(data);

  // ikuti pola sesuaikan dengan id pada form modal data
  console.log(data);

  // ubah judul form
  $("#formModalLabel").html("Edit Mutasi");

  // ubah dan tambahkan sesuai form kalian
  $("#id_mutasi").val(data.id);
  $("#nama_sales").val(data.nama_sales);
  $("#keterangan").val(data.jenis_barang + ": " + data.nama_barang);
  $("#belum_dibayar").val(data.total_harga);
  // $('#image').val(data.image);
}

// fungsi untuk edit sales
function editSales(data) {
  // parse json data menjadi objek
  data = JSON.parse(data);

  // ikuti pola sesuaikan dengan id pada form modal data

  // ubah action dari form menjadi edit
  let editAction = window.location.href + "&aksi=edit";
  $("#formSales").attr("action", editAction);

  // ubah judul form
  $("#formModalLabel").html("Edit Sales");

  // ubah tombol tambah menjadi edit
  $("#formSales input[type=submit]").val("Edit");

  // ubah dan tambahkan sesuai form kalian
  $("#id").val(data.id);
  $("#nama_sales").val(data.nama_sales);
  $("#gender").val(data.gender);
  $("#tgl_lahir").val(data.tgl_lahir);
  $("#kontak").val(data.kontak);
  $("#alamat").val(data.alamat);
  // $('#image').val(data.image);
}
