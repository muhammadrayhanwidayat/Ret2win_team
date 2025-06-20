<?php

// Definisikan flag Anda di sini
$flag = "TI404{93l0_b4nG_j@90}";

// Pastikan username dan password dikirim melalui POST
if (isset($_POST['username']) && isset($_POST['pwd'])) {
    
    $user = $_POST['username'];
    $pass = $_POST['pwd'];

    // Menolak input array untuk memaksa solusi Magic Hash
    if (is_array($user) || is_array($pass)) {
        echo "<h1>Login Gagal!</h1><p>Input gaboleh array bro!</p>";
        die();
    }

    if ($user !== $pass) {
        // Kerentanan Magic Hash ada di sini
        if (md5($user) == md5($pass)) {
            echo "<h1>Login Berhasil!</h1><code>$flag</code>";
        } else {
            echo "<h1>Login Gagal!</h1><p>Kombinasi salah.</p>";
        }
    } else {
        echo "<h1>Login Gagal!</h1><p>Input gaboleh sama!</p>";
    }
} else {
    echo "<h1>Akses Ditolak</h1><p>Silakan login melalui form.</p>";
}

?>
