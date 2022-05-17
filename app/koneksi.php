<?php

// buat koneksi kedatabase
$conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME) or die('Koneksi ke Database Gagal !!');

// fungsi ambil data
function data_table($table)
{
  global $conn;
  $data = $conn->query('SELECT * FROM ' . $table);

  return $data;
}
