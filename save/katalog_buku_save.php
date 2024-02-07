<?php
// Pastikan ada koneksi ke database ($con) sebelum menggunakan kode ini

if(isset($_POST['submit'])){
    
    $id_katalog = $_POST["id_katalog"];
    $id_penerbit = htmlspecialchars($_POST['id_penerbit']);
    $judul = htmlspecialchars($_POST['judul']);
    $pengarang = htmlspecialchars($_POST['pengarang']);
    $jumlah = htmlspecialchars($_POST['jumlah']);
    $nama_file = $_FILES['gambar']['name'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $tipe_file = $_FILES['gambar']['type'];
    $size_file = $_FILES['gambar']['size'];
   
    //echo var_dump( $id_katalog, $id_penerbit, $judul, $pengarang, $jumlah, $nama_file);

    if (!empty($nama_file)) {
        if ($tipe_file != "image/png" && $tipe_file != "image/jpg" && $tipe_file != "image/jpeg") {
            echo "<script>
                  alert('File tidak didukung');
                  window.location.href = 'index.php?hal=katalog_buku';
                  </script>";
        } elseif ($size_file > 2000000) { // Ubah batas ukuran menjadi 2MB (2000000 bytes)
            echo "<script>
                  alert('Ukuran file tidak boleh > 2MB');
                  window.location.href = 'index.php?hal=katalog_buku';
                  </script>";
        } else {
            // Process the uploaded image
            $gambar = $_FILES['gambar']['name'];
            $gambar_temp = $_FILES['gambar']['tmp_name'];
            $gambar_path = "uploads/" . $gambar;
            // Move the uploaded file to the uploads directory
            move_uploaded_file($gambar_temp, $gambar_path);

            // Insert new data into the database
            try {
                $sql = $con->prepare("INSERT INTO katalog_buku (id_penerbit, judul, pengarang, jumlah, gambar) VALUES (:id_penerbit, :judul, :pengarang, :jumlah, :gambar)");
                
                $sql->bindParam(':id_penerbit', $id_penerbit);
                $sql->bindParam(':judul', $judul);
                $sql->bindParam(':pengarang', $pengarang);
                $sql->bindParam(':jumlah', $jumlah);
                $sql->bindParam(':gambar', $gambar);

                $sql->execute();

                move_uploaded_file($tmp_file, "uploads/" . $nama_file);

                echo "<script>
                      alert('Berhasil');
                      window.location.href = 'index.php?halaman=katalog_buku';
                      </script>";
            } catch (PDOException $e) {
                echo "<script>
                        alert('Terjadi kesalahan: " . $e->getMessage() . "');
                        window.location.href = 'index.php?halaman=katalog_buku';
                      </script>";
            }
        }
    } else {
        echo "<script>
              alert('File kosong');
              window.location.href = 'index.php?halaman=katalog_buku';
              </script>";
    }
}
?>
