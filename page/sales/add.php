<?php

// fungsi tambah menu header baru

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk tambah data
$query = "INSERT INTO sales (nama_sales, gender, tgl_lahir, kontak, image) VALUE ('$data[nama_sales]', '$data[gender]', '$data[tgl_lahir]', '$data[kontak]', 'default.png')";

$tambah = $conn->query($query);

if ($tambah) {
  redirect('sales');
} else {
  // echo $query;
  var_dump($tambah);
  die();
}
