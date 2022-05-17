<?php

// fungsi edit data siswa

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk edit data
$query = "UPDATE nav_headers SET header_name = '$data[header_name]', header_text = '$data[header_text]', order_place = '$data[order_place]' WHERE id = '$data[id]'";

$edit = $conn->query($query);

// cek apakah edit berhasil
if ($edit) {
  redirect('menu_headers');
} else {
  var_dump($edit);
  die();
}
