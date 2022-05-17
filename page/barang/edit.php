<?php

// fungsi edit data siswa

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk edit data
$query = "UPDATE barang SET nama_barang = '$data[nama_barang]', id_jenis = '$data[id_jenis]', harga = '$data[harga]', stok = '$data[stok]', keterangan = '$data[keterangan]' WHERE id = '$data[id]'";

$edit = $conn->query($query);

// cek apakah edit berhasil
if ($edit) {
  redirect('barang');
} else {
  var_dump($edit);
  die();
}
