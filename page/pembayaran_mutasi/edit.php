<?php

// fungsi edit data siswa

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk edit data
$query = "UPDATE mutasi_barang SET tgl_mutasi = '$data[tgl_mutasi]', id_barang = '$data[id_barang]', id_sales = '$data[id_sales]', jumlah = '$data[jumlah]', pembayaran = '$data[pembayaran]' WHERE id = '$data[id]'";

$edit = $conn->query($query);

// cek apakah edit berhasil
if ($edit) {
  redirect('mutasi_barang');
} else {
  var_dump($edit);
  die();
}
