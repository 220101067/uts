<?php
// Pastikan ada koneksi ke database ($con) sebelum menggunakan kode ini

$nama = htmlspecialchars($_POST['nama_penerbit']);
$tahun = htmlspecialchars($_POST['tahun_penerbit']);

if (empty($nama) || empty($tahun)) {
    echo "<script>
            alert('Data tidak boleh kosong!');
            window.location.href = 'index.php?halaman=penerbit_buku';
          </script>";
} else {
    try {
        $cek = $con->prepare("SELECT * FROM penerbit_buku WHERE nama_penerbit = ?");
        $cek->bindParam(1, $nama);
        $cek->execute();
        $jml = $cek->rowCount();

        if ($jml == 0) {
            // Perbaiki placeholder VALUES agar sesuai dengan jumlah kolom
            $sql = "INSERT INTO penerbit_buku (nama_penerbit, tahun_penerbit) VALUES (?, ?)";
            $save = $con->prepare($sql);
            $save->bindParam(1, $nama);
            $save->bindParam(2, $tahun);
            $save->execute();

            echo "<script>
                    alert('Data Berhasil disimpan');
                    window.location.href = 'index.php?halaman=penerbit_buku';
                  </script>";
        } else {
            echo "<script>
                    alert('Nama penerbit sudah ada!');
                    window.location.href = 'index.php?halaman=penerbit_buku';
                  </script>";
        }
    } catch (PDOException $e) {
        echo "<script>
                alert('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
                window.location.href = 'index.php?halaman=penerbit_buku';
              </script>";
        // Untuk debugging, bisa juga mencetak pesan kesalahan dengan:
        // echo "Error: " . $e->getMessage();
    }
}
?>
