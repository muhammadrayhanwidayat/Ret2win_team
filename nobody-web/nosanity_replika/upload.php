<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// ❌ Blokir file PHP dan sejenisnya
$forbidden_extensions = ['php', 'php3', 'php4', 'phtml'];
if (in_array($fileType, $forbidden_extensions)) {
    echo "Maaf, file dengan ekstensi .$fileType tidak diperbolehkan.";
    $uploadOk = 0;
}

// Periksa apakah berkas sudah ada
if (file_exists($target_file)) {
    echo "Maaf, berkas sudah ada.";
    $uploadOk = 0;
}

// Periksa ukuran berkas (500 KB)
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Maaf, berkas Anda terlalu besar.";
    $uploadOk = 0;
}

// Upload file jika semua pengecekan lolos
if ($uploadOk == 0) {
    echo "Maaf, berkas Anda tidak dapat diunggah.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Berkas ". htmlspecialchars( basename($_FILES["fileToUpload"]["name"])). " telah diunggah.";
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah berkas Anda.";
    }
}
?>
