<?php
function validateNIM($nim) {
    return preg_match('/^[0-9]+$/', $nim);
}

$nim = htmlspecialchars($_POST['nim']);
$nama = htmlspecialchars($_POST['nama']);
$kelas = htmlspecialchars($_POST['kelas']);
$no_telpon = htmlspecialchars($_POST['no_telpon']);
$alamat = htmlspecialchars($_POST['alamat']);

if (empty($nim) || empty($nama) || empty($kelas) || empty($no_telpon) || empty($alamat)) {
    echo "<script>
            alert('Data tidak boleh kosong!');
            window.location.href = 'index.php?halaman=mahasiswa';
          </script>";
} else if (!validateNIM($nim)) {
    echo "<script>
            alert('Format NIM tidak valid! Hanya boleh berisi angka.');
            window.location.href = 'index.php?halaman=mahasiswa';
          </script>";
} else {
    try {
        $cek = $con->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
        $cek->bindParam(1, $nim);
        $cek->execute();
        $jml = $cek->rowCount();

        if ($jml == 0) {
            $sql = "INSERT INTO mahasiswa (nim, nama, kelas, no_telpon, alamat) VALUES (?, ?, ?, ?, ?)";
            $save = $con->prepare($sql);
            $save->bindParam(1, $nim);
            $save->bindParam(2, $nama);
            $save->bindParam(3, $kelas);
            $save->bindParam(4, $no_telpon);
            $save->bindParam(5, $alamat);
            $save->execute();

            echo "<script>
                    alert('Data Berhasil disimpan');
                    window.location.href = 'index.php?halaman=mahasiswa';
                  </script>";
        } else {
            echo "<script>
                    alert('NIM sudah ada!!');
                    window.location.href = 'index.php?halaman=mahasiswa';
                  </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
