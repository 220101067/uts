<?php
try {
    $id = $_GET['id'];

    $sql_ubah = "UPDATE transaksi_peminjaman SET status='kembali' WHERE id_peminjam=:id";
    $stmt =  $con->prepare($sql_ubah);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();

    echo '
    <script>
        Swal.fire({
          title: "Sukses",
          text: "Data berhasil dikembalikan.",
          icon: "success",
          confirmButtonText: "OK"
        }).then(() => {
            window.location.href = "index.php?halaman=data_peminjam";
        });
    </script>';
} catch (PDOException $e) {
    echo '
    <script>
        Swal.fire({
          title: "Error",
          text: "Terjadi kesalahan: ' . $e->getMessage() . '",
          icon: "error",
          confirmButtonText: "OK"
        });
    </script>';
}
?>
