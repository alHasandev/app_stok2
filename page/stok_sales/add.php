<?php

// fungsi tambah menu header baru

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk tambah data
$query = "INSERT INTO mutasi_barang (tgl_mutasi, id_barang, id_sales, jumlah, pembayaran) VALUE ('$data[tgl_mutasi]', '$data[id_barang]', '$data[id_sales]', '$data[jumlah]', '$data[pembayaran]')";

$tambah = $conn->query($query);

if ($tambah) {
  redirect('mutasi_barang');
} else {
  echo $query;
  echo $conn->error;
  var_dump($tambah);
  die();
}
