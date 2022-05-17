<?php

$data = $_POST;

// check if username exist
$query = "SELECT * FROM detail_users WHERE username = '$data[username]'";

$result = $conn->query($query);

// create error message 
$errors = [
  'error' => 'Authentication Error',
  'message' => 'Username atau password salah !!'
];

if ($result->num_rows) {
  // check if password correct
  $user = $result->fetch_assoc();
  if (password_verify($data['password'], $user['password'])) {
    // create session login
    $_SESSION['auth'] = [
      'id' => $user['id'],
      'username' => $user['username'],
      'privilege' => $user['privilege'],
      'image' => $user['image']
    ];

    redirect('home');
  } else {
    $_SESSION['errors'] = $errors;
    header('location: ' . page('auth', 'login'));
  }
} else {
  $_SESSION['errors'] = $errors;
  header('location: ' . page('auth', 'login'));
}
