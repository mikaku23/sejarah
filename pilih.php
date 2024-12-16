<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="dist/img/logo3.png">
    <link rel="stylesheet" href="dist/css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.js" nomodule></script>
</head>
<body>
    <div class="wrapper">
        <div class="form-box login">
            <!-- Pastikan method="post" dan action sesuai -->
            <form action="db/db.pilih.php?action=pilih" method="post">
                <h2>Login</h2>
                <h4>Anda login sebagai:</h4>
                
                <!-- Dropdown untuk memilih tipe pengguna -->
                <select name="userType">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                
                <!-- Button submit -->
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>

    <script src="dist/js/login.js"></script>
</body>
</html>
