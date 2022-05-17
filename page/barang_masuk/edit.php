<?php

// fungsi edit data siswa

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk edit data
$query = "UPDATE barang_masuk SET id_barang = '$data[id_barang]', tgl_masuk = '$data[tgl_masuk]', jumlah = '$data[jumlah]' WHERE id = '$data[id]'";

$edit = $conn->query($query);

// cek apakah edit berhasil
if ($edit) {
  redirect('barang_masuk');
} else {
  var_dump($edit);
  die();
}
