<?php
    // ambil data dari gambar
    $nama_file = $_FILES['gambar']['name'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $type_file = $_FILES['gambar']['type'];

    // set path penyimpanan folder gambar
    $path = '../assets/images/'.$nama_file;
?>