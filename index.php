<?php


// modules
require_once 'vendor/autoload.php';

// ambil file pendukung
require_once 'app/base.php';
require_once 'app/helpers.php';
require_once 'app/koneksi.php';

// disini berisi konten secara dimanik

// jika page di isi, maka
if (@$_GET['page']) {
  // buat variable page berisi isian page
  $page = $_GET['page'];
} else { // jika tidak, maka

  // buat variable page berisi halaman utama
  $page =  HALAMAN_UTAMA;
}

// jalankan fungsi session
require_once 'app/session.php';

// ambil nilai aksi
$aksi = @$_GET['aksi'];

// jika variable aksi bernilai / ber isi, maka
if ($aksi) {
  // yang akan ditampilkan adalah, page/'nama page'/'nama aksi'.php
  require_once 'page/' . $page . '/' . $aksi . '.php';
} else {
  // templates header & sidebar
  require_once 'templates/header.php';
  require_once 'templates/sidebar.php';

  // buat konten tampil secara dinamik
  require_once 'page/' . $page . '/index.php';

  // templates footer
  require_once 'templates/footer.php';
}
