<?php
session_start();
include "../koneksi.php"; // Sesuaikan dengan file koneksi kamu

// Ambil nilai userType dari POST
$userType = $_POST['userType'];

// Logika pengalihan berdasarkan pilihan
if ($userType == "user") {
        $_SESSION['status_login2'] = true;
    header("Location: ../user.php"); // Arahkan ke halaman user

} elseif($userType=="none"){
echo "Error: Pilihan tidak valid.";
    exit();
}
else{
    header("Location: ../login.php"); // Arahkan ke halaman login admin
    exit();
} 
?>
