<?php

$id_penerbit = $_POST["id_penerbit"];
$nama_penerbit = $_POST['nama_penerbit'];
$tahun_penerbit = $_POST['tahun_penerbit'];
 //echo var_dump($id_penerbit,$nama_penerbit,$tahun_penerbit)

// Periksa apakah nilai id ada dan valid sebelum melakukan update

$sql = "UPDATE penerbit_buku SET nama_penerbit = :nama_penerbit, tahun_penerbit = :tahun_penerbit WHERE id_penerbit= :id_penerbit";

$save = $con->prepare($sql);
$save->bindParam(':nama_penerbit', $nama_penerbit);
$save->bindParam(':tahun_penerbit', $tahun_penerbit);
$save->bindParam(':id_penerbit', $id_penerbit);


// Eksekusi pernyataan SQL
if ($save->execute()) {
  echo "<script>
              alert('Data Berhasil di update');
              window.location.href = 'index.php?halaman=penerbit_buku';
            </script>";
} else {
  echo "<script>
              alert('Gagal update data');
              window.location.href = 'index.php?halaman=penerbit_buku';
            </script>";
}
?>