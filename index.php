<?php session_start(); ?> <!-- memulai sesi -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <!-- boostrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- my css -->
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body>
<h1 class="card-header py-3 text-center text-secondary border-bottom">Todo List</h1>

<div class="container mt-4">
    <div class="card">
        <?php
            // Cek apakah kita sedang mengedit data
            $edit_mode = false;
            $edit_id = -1;
            
            if (isset($_GET['edit'])) {
                $edit_id = $_GET['edit'];
                $edit_mode = true;
                $user = $_SESSION['users'][$edit_id];
            }
        ?>

        <div class="card-body">
            <form method="POST" action="register.php">
                <input type="hidden" name="edit_id" value="<?= $edit_mode ? $edit_id : -1; ?>"> <!-- menambahkan input tersembunyi untuk mengirimkan data melalui form tanpa menampilkannya di halaman web-->
                
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $edit_mode ? $user['name'] : '' ?>" required> <!--tambahkan nilai value untuk mode edit -->
                </div>

                <div class="mb-3">
                    <label for="pesan" class="form-label">Masukkan hal yang akan dilakukan</label>
                    <input type="text" class="form-control" name="pesan" value="<?= $edit_mode ? $user['pesan'] : '' ?>" required> <!--tambahkan nilai value untuk mode edit -->
                </div>
                
                <div class="mb-3">
                    <label for="date" class="form-label">Masukkan tanggal harus selesai</label><br>
                    <input type="date" id="date" name="date" class="form-control" value="<?= $edit_mode ? $user['date'] : '' ?>" required> <!--tambahkan nilai value untuk mode edit -->
                </div>
                        
                <div class="mb-3">
                    <label for="name" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select">
                        <option value="default" <?= $edit_mode && $user['category'] == 'default' ? 'selected' : '';?>>default</option> <!--tambahkan nilai value untuk mode edit -->
                        <option value="priority <?= $edit_mode && $user['category'] == 'priority' ? 'selected' : '';?>">Priority</option> <!--tambahkan nilai value untuk mode edit -->
                    </select>
                </div>
                
                <button type="submit" class="btn btn-secondary w-100 mt-2"><?= $edit_mode ? 'Update Todolist' : 'Add Todolist'; ?></button>
            </form>
        </div>
    </div>
        
    <div class="mt-3">
        <a href="listTodo.php" class="btn btn-primary">Lihat data todo</a>
    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>