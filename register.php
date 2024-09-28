<?php
session_start(); // Mulai sesi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $pesan = $_POST['pesan'];
    $date = $_POST['date'];
    $category = $_POST['category'];

    // Buat array untuk menyimpan data baru
    $user = [
        "name" => $name,
        "pesan" => $pesan,
        "date" => $date,
        "category" => $category
    ];

    // Cek apakah $_SESSION['users'] sudah ada, jika belum buat array kosong
    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = [];
    }

    // Tambahkan data baru ke $_SESSION['users']
    $_SESSION['users'][] = $user;
    $_SESSION['type'] = "success";
    $_SESSION['message'] = "Data user berhasil ditambahkan";

    // Redirect kembali ke index.php
    header("Location: index.php");
    exit();
}
?>
