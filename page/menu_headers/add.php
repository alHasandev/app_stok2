<?php

// fungsi tambah menu header baru

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk tambah data
$query = "INSERT INTO nav_headers (header_name, header_text, order_place) VALUE ('$data[header_name]', '$data[header_text]', '$data[order_place]')";

$tambah = $conn->query($query);

if ($tambah) {
  redirect('menu_headers');
} else {
  // echo $query;
  var_dump($tambah);
  die();
}
