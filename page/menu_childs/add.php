<?php

// fungsi tambah menu header baru

// ambil data dari form dengan method POST
$data = $_POST;

// buat query mysql untuk tambah data
$query = "INSERT INTO child_items (nav_parent, nav_name, nav_link) VALUE ('$data[nav_parent]', '$data[nav_name]', '$data[nav_link]')";

$tambah = $conn->query($query);

if ($tambah) {
  redirect('child_items');
} else {
  // echo $query;
  var_dump($tambah);
  die();
}
