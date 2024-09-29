<?php
session_start(); // Mulai sesi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $edit_id = $_POST['edit_id'] ?? -1; // cari tau apakah sedang dalam mode edit atau tambah data baru dengan menggunakan nilai -1 sebagai nilai default untuk mode tambah.

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

    if ($edit_id != -1 && isset($_SESSION['users'][$edit_id])) {
        // Jika sedang mengedit, update user di index yang sesuai
        $_SESSION['users'][$edit_id] = $user;
        $_SESSION['type'] = 'success';
        $_SESSION['message'] = 'Data user berhasil diperbarui!';
    } else {
        // Cek apakah $_SESSION['users'] sudah ada, jika belum buat array kosong
        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = [];
        }

        // Tambahkan data baru ke $_SESSION['users']
        $_SESSION['users'][] = $user;
        $_SESSION['type'] = "success";
        $_SESSION['message'] = "Data user berhasil ditambahkan";
    }

    // Redirect kembali ke index.php
    header("Location: index.php");
    exit();
}
?>
