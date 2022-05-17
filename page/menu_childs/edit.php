<?php

// fungsi edit data siswa

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk edit data
$query = "UPDATE child_items SET nav_parent = '$data[nav_parent]', nav_name = '$data[nav_name]', nav_link = '$data[nav_link]' WHERE id = '$data[id]'";

$edit = $conn->query($query);

// cek apakah edit berhasil
if ($edit) {
  redirect('menu_childs');
} else {
  var_dump($edit);
  die();
}
