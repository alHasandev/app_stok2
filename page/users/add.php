<?php

// fungsi tambah menu header baru

// ambil data dari form dengan method POST
$data = $_POST;

// check if password and confirm password is same
if ($$data['password1'] !== $data['password2']) {
  $_SESSION['errors'] = [
    'error' => 'Password tidak sama!',
    'message' => 'Tolong isi password dan confirm password dengan benar'
  ];

  redirect('users');
}

// hash password
$hashed_password = password_hash($data['password1'], PASSWORD_DEFAULT);

// Upload foto
$target_dir = "assets/img/profiles/";
if (@$_FILES['image']['tmp_name']) {
  $filename = uploadFoto(@$_FILES['image'], $target_dir, $_FILES['username']);
} else {
  $filename = $target_dir . "default.png";
}

// buat query mysql untuk tambah data
$query = "INSERT INTO users (username, password, privilege, image) VALUE ('$data[username]', '$hashed_password', '$data[privilege]', '$filename')";

$tambah = $conn->query($query);

if ($tambah) {
  redirect('users');
} else {
  // echo $query;
  var_dump($tambah);
  die();
}
