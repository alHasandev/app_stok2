<?php

// fungsi tambah menu header baru

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk tambah data
$query = "INSERT INTO jenis (nama_jenis) VALUE ('$data[nama_jenis]')";

$tambah = $conn->query($query);

if ($tambah) {
  redirect('jenis_barang');
} else {
  // echo $query;
  var_dump($tambah);
  die();
}
