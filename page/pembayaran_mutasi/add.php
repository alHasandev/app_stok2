<?php

// fungsi tambah menu header baru

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk tambah data
$query = "INSERT INTO pembayaran_mutasi (id_mutasi, tgl_pembayaran, nominal) VALUE ('$data[id_mutasi]', '$data[tgl_pembayaran]', '$data[nominal]')";

$tambah = $conn->query($query);

if ($tambah) {
  redirect('mutasi_barang');
} else {
  echo $query;
  echo $conn->error;
  var_dump($tambah);
  die();
}
