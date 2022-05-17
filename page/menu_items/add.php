<?php

// fungsi tambah menu header baru

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk tambah data
$query = "INSERT INTO nav_items (nav_header, nav_name, nav_icon, nav_link, child_item) VALUE ('$data[nav_header]', '$data[nav_name]', '$data[nav_icon]', '$data[nav_link]', '$data[child_item]')";

$tambah = $conn->query($query);

if ($tambah) {
  redirect('menu_items');
} else {
  // echo $query;
  var_dump($tambah);
  die();
}
