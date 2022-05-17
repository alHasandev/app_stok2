<?php

// fungsi edit data siswa

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk edit data
$query = "UPDATE jenis SET nama_jenis = '$data[nama_jenis]' WHERE id = '$data[id]'";

$edit = $conn->query($query);

// cek apakah edit berhasil
if ($edit) {
  redirect('jenis_barang');
} else {
  var_dump($edit);
  die();
}
