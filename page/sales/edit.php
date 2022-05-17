<?php

// fungsi edit data siswa

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk edit data
$query = "UPDATE sales SET nama_sales = '$data[nama_sales]', gender = '$data[gender]', kontak = '$data[kontak]', alamat = '$data[alamat]', image = 'default.png' WHERE id = '$data[id]'";

$edit = $conn->query($query);

// cek apakah edit berhasil
if ($edit) {
  redirect('sales');
} else {
  var_dump($edit);
  die();
}
