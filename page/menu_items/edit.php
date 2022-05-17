<?php

// fungsi edit data siswa

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk edit data
$query = "UPDATE nav_items SET nav_header = '$data[nav_header]', nav_name = '$data[nav_name]', nav_icon = '$data[nav_icon]', nav_link = '$data[nav_link]', child_item = '$data[child_item]' WHERE id = '$data[id]'";

$edit = $conn->query($query);

// cek apakah edit berhasil
if ($edit) {
  redirect('menu_items');
} else {
  var_dump($edit);
  die();
}
