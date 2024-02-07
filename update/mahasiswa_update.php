<?php
   
    // Pastikan id tersedia dan valid sebelum melakukan update
  
        $id_mahasiswa = $_POST['id_mahasiswa'];
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $no_telpon = $_POST['no_telpon'];
        $alamat = $_POST['alamat'];

        // echo var_dump($id_mahasiswa,$nim, $nama, $kelas, $no_telpon, $alamat);

        // Perbarui sintaks query untuk menggunakan id dalam kondisi WHERE
        $sql = "UPDATE mahasiswa SET nim = :nim, nama = :nama, kelas = :kelas, no_telpon = :no_telpon, alamat = :alamat WHERE id_mahasiswa= :id_mahasiswa";

        // Persiapkan statement SQL
        $save = $con->prepare($sql);
        $save->bindParam(':nim', $nim);
        $save->bindParam(':nama', $nama);
        $save->bindParam(':kelas', $kelas);
        $save->bindParam(':no_telpon', $no_telpon);
        $save->bindParam(':alamat', $alamat);
        $save->bindParam(':id_mahasiswa', $id_mahasiswa);

     

        // Eksekusi pernyataan SQL
        if ($save->execute()) {
            echo "<script>
                  alert('Data Berhasil diupdate');
                  window.location.href = 'index.php?halaman=mahasiswa';
                </script>";
        } else {
            echo "<script>
                  alert('Gagal update data');
                  window.location.href = 'index.php?halaman=mahasiswa';
                </script>";
        }
    
?>
