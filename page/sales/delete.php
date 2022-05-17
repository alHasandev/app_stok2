<?php

// fungsi hapus data siswa

// ambil id dari parameter di url
$id = $_GET['id'];

// buat query mysql untuk hapus data
$query = "DELETE FROM sales WHERE id = '$id'";

$hapus = $conn->query($query);

// cek jika query hapus berhasil
if ($hapus) {
  redirect('sales');
} else {
  var_dump($hapus);
  die();
}
