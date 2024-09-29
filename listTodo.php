<?php session_start();?> <!-- memulai sesi -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Todo</title>
    <!-- boostrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- boostrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- my css -->
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body>
<h1 class="card-header py-3 text-center text-secondary border-bottom">Data Todo</h1>
<div class="container mt-3">
    <?php
    if (isset($_SESSION['users']) && !empty($_SESSION['users'])) {
        foreach ($_SESSION['users'] as $index => $user) {
            echo '<div class="card mt-3">
                    <div class="card-header">'
                        . $user['name'] . 
                    '</div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>' . $user['pesan'] . '</p>
                            <p class="fs-6">' . $user['date'] . '</p>
                            <footer class="blockquote-footer">' . $user['category'] . '</footer>
                        </blockquote>

                        <div class="d-flex justify-content-center mt-3">
                            <a href="index.php?edit=' . $index . '" class="btn btn-sm btn-dark mx-2"><i class="bi bi-pencil"></i></a>
                            <a href="removeTodo.php?delete=' . $index . '" class="btn btn-sm btn-dark mx-2"><i class="bi bi-trash"></i></a>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo '<div class="alert alert-danger">Tidak ada data</div>';
    }
    ?>
</div>

<div class="mt-3 d-flex justify-content-around">
    <a href="index.php" class="btn btn-primary mx-2">Add new todo</a>
    <a href="clearAll.php" class="btn btn-secondary mx-2">Clear all todo</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>