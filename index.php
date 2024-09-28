<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO LIST</title>
    <!-- boostrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
        <div class="card">
            <div class="card-header bg-dark text-white">Todo List</div>
                <div class="card-body">
                    <form method="POST" action="register.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Masukkan hal yang akan dilakukan</label>
                            <input type="text" class="form-control" name="pesan" required>
                        </div>
                        <div class="mb-3">
                            <label for="date">Masukkan tanggal harus selesai</label><br>
                            <input type="date" id="date" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Category</label>
                            <select name="category" id="category" class="form-select">
                                <option value="default">default</option>
                                <option value="priority">Priority</option>
                            </select>
                        </div>
                
                        <button type="submit" class="btn btn-primary w-100 mt-2"><?= $edit_mode ? 'Update' : 'Daftar'; ?></button>
                    </form>
                </div>
        </div>
        <div class="mt-3">
            <a href="listUsers.php" class="btn btn-secondary">Lihat data todo</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>