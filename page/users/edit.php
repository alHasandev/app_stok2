<?php

// ambil data dari form dengan method POST
$data = $_POST;

// Siapkan data user lama
$user = $conn->query("SELECT * FROM users WHERE id = '$data[id]'")->fetch_assoc();

// check if password and confirm password is same
if ($data['password1'] !== $data['password2']) {
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
  $filename = $user['image'];
}

// buat query mysql untuk edit data
$query = "UPDATE users SET username = '$data[username]', password = '$hashed_password', image = '$filename' WHERE id = '$data[id]'";

$edit = $conn->query($query);

// cek apakah edit berhasil
if ($edit) {
  // Jika yang di edit adalah data dirinya sendiri
  if ($auth['id'] === $data['id']) {
    // Update session
    $_SESSION['auth']['image'] = $filename;
    $_SESSION['auth']['username'] = $data['username'];
  }
  redirect('users');
} else {
  var_dump($edit);
  die();
}
