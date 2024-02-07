<?php
// Pastikan untuk mendapatkan koneksi ke database ($con)

$id_katalog = $_POST["id_katalog"];
$id_penerbit = $_POST["id_penerbit"];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$jumlah = $_POST['jumlah'];

// Check if a new image file is uploaded
if (!empty($_FILES['gambar']['name'])) {
    // Process the uploaded image
    $gambar = $_FILES['gambar']['name'];
    $gambar_temp = $_FILES['gambar']['tmp_name'];
    $gambar_path = "uploads/" . $gambar;
    // Move the uploaded file to the uploads directory
    move_uploaded_file($gambar_temp, $gambar_path);
} else {
    // If no new image is uploaded, keep the existing image
    $gambar = $_POST['gambar_lama'];  // Update the variable name to match the previous one
}

try {
    $sql = "UPDATE katalog_buku SET id_penerbit = :id_penerbit, judul = :judul, gambar = :gambar, pengarang = :pengarang, jumlah = :jumlah WHERE id_katalog = :id_katalog";

    $save = $con->prepare($sql);
    $save->bindParam(':id_penerbit', $id_penerbit);
    $save->bindParam(':judul', $judul);
    $save->bindParam(':gambar', $gambar); // Updated variable name to match the above assignments
    $save->bindParam(':pengarang', $pengarang);
    $save->bindParam(':jumlah', $jumlah);
    $save->bindParam(':id_katalog', $id_katalog);

    // Eksekusi pernyataan SQL
    if ($save->execute()) {
        echo "<script>
                    alert('Data Berhasil diupdate');
                    window.location.href = 'index.php?halaman=katalog_buku';
                </script>";
    } else {
        echo "<script>
                    alert('Gagal update data');
                    window.location.href = 'index.php?halaman=katalog_buku';
                </script>";
    }
} catch (PDOException $e) {
    echo "<script>
                alert('Terjadi kesalahan: " . $e->getMessage() . "');
                window.location.href = 'index.php?halaman=katalog_buku';
            </script>";
}
?>
