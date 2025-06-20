<?php
$upload_dir = "uploads/";

// Handle file deletion
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['file'])) {
    $filename = basename($_GET['file']); // Sanitize filename to prevent directory traversal
    $filepath = $upload_dir . $filename;

    if (file_exists($filepath) && is_file($filepath)) {
        if (unlink($filepath)) {
            echo "File '{$filename}' berhasil dihapus.";
        } else {
            echo "Gagal menghapus file '{$filename}'.";
        }
    } else {
        echo "File '{$filename}' tidak ditemukan.";
    }
    exit(); // Stop execution after deletion
}

// Display the list of files
$files = scandir($upload_dir);
$file_list = array_diff($files, array('.', '..')); // Remove . and ..

if (empty($file_list)) {
    echo "<p>Tidak ada file yang diunggah.</p>";
} else {
    echo "<ul class='file-list'>";
    foreach ($file_list as $file) {
        // Sanitize output for display
        $display_filename = htmlspecialchars($file);
        $download_link = urlencode($file); // URL-encode filename for download link

        echo "<li>";
        echo "<span>{$display_filename}</span>";
        echo "<div>";
        echo "<a href='{$upload_dir}{$download_link}' download='{$display_filename}'>Unduh</a>"; // Download link
        echo "<button class='delete-btn' onclick='deleteFile(\"{$display_filename}\")'>Hapus</button>"; // Delete button
        echo "</div>";
        echo "</li>";
    }
    echo "</ul>";
}
?>
