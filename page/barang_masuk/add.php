<?php

// fungsi tambah menu header baru

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk tambah data
$query = "INSERT INTO barang_masuk (id_barang, tgl_masuk, jumlah) VALUE ('$data[id_barang]', '$data[tgl_masuk]', '$data[jumlah]')";

$tambah = $conn->query($query);

if ($tambah) {
  redirect('barang_masuk');
} else {
  // echo $query;
  var_dump($tambah);
  die();
}
