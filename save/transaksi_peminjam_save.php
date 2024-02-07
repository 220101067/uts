<?php
// Pastikan ada koneksi ke database ($con) sebelum menggunakan kode ini

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    
    $id_mahasiswa = htmlspecialchars($_POST['id_mahasiswa']);
    $id_katalog = htmlspecialchars($_POST['id_katalog']);
    $tgl_pinjam = htmlspecialchars($_POST['tgl_pinjam']);
    $tgl_kembali = htmlspecialchars($_POST['tgl_kembali']);
    $status = htmlspecialchars($_POST['status']);

    // Memastikan tidak ada data yang kosong
    if (empty($id_mahasiswa) || empty($id_katalog) || empty($tgl_pinjam) || empty($tgl_kembali) || empty($status)) {
        echo "<script>
                alert('Data tidak boleh kosong!');
                window.location.href = 'index.php?halaman=transaksi_peminjaman';
              </script>";
    } else {
        try {
            // Mengecek apakah id_peminjam sudah ada di database
            $cek = $con->prepare("SELECT * FROM transaksi_peminjaman WHERE id_peminjam = :id_peminjam");
            $cek->bindParam(':id_peminjam', $id_peminjam);
            $cek->execute();
            $jml = $cek->rowCount();

            if ($jml == 0) {
                // Jika id_peminjam belum ada, maka lakukan insert data baru
                $sql = "INSERT INTO transaksi_peminjaman (id_peminjam, id_mahasiswa, id_katalog, tgl_pinjam, tgl_kembali, status) VALUES (:id_peminjam, :id_mahasiswa, :id_katalog, :tgl_pinjam, :tgl_kembali, :status)";
                $save = $con->prepare($sql);
                $save->bindParam(':id_peminjam', $id_peminjam);
                $save->bindParam(':id_mahasiswa', $id_mahasiswa);
                $save->bindParam(':id_katalog', $id_katalog);
                $save->bindParam(':tgl_pinjam', $tgl_pinjam);
                $save->bindParam(':tgl_kembali', $tgl_kembali);
                $save->bindParam(':status', $status);
                $save->execute();


                echo "<script>
                Swal.fire({
                    title: 'Data Berhasil disimpan',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.href = 'index.php?halaman=transaksi_peminjaman';
                });
              </script>";
                exit;

              
            } else {
                // Jika id_peminjam sudah ada, beri peringatan
                echo "<script>
                        alert('ID peminjam sudah ada!');
                        window.location.href = 'index.php?halaman=transaksi_peminjaman';
                      </script>";
            }
        } catch (PDOException $e) {
            // Menangani kesalahan saat menyimpan data
            echo "<script>
                    alert('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
                    window.location.href = 'index.php?halaman=transaksi_peminjaman';
                  </script>";
        }
    }
}
