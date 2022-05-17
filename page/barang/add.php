<?php

// fungsi tambah menu header baru

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk tambah data
$query = "INSERT INTO barang (nama_barang, id_jenis, harga, stok, keterangan) VALUE ('$data[nama_barang]', '$data[id_jenis]', '$data[harga]', '$data[stok]', '$data[keterangan]')";

$tambah = $conn->query($query);

if ($tambah) {
  redirect('barang');
} else {
  // echo $query;
  var_dump($tambah);
  die();
}
