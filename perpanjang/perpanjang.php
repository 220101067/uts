<?php

$id = $_GET['id'];

// Assuming there is a database connection $con

$cek = $con->prepare("SELECT * FROM transaksi_peminjaman WHERE id_peminjam = :id");
$cek->bindParam(':id', $id);
$cek->execute();
$update = $cek->fetch();

?>

<h4 class="mb-3">Perpanjang peminjaman</h4>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Perpanjang</label>
                        <div class="col-sm-9">
                            <input type="date" name="tgl_kembali" class="form-control" value="<?php echo date("Y-m-d", strtotime($update['tgl_kembali'])); ?>">
                        </div>
                    </div>
                    <a href="index.php?halaman=data_peminjam" class="  mt-3 btn btn-secondary">Kembali</a>
                    <button class="btn btn-success mt-3" name="perpanjang">Perpanjang</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['perpanjang'])) {
    $perpanjang = $_POST['tgl_kembali'];

    // Ensure the date is in the correct format for MySQL (YYYY-MM-DD)
    $formattedDate = date('Y-m-d', strtotime($perpanjang));

    $updateQuery = $con->prepare("UPDATE transaksi_peminjaman SET tgl_kembali = :tgl_kembali WHERE id_peminjam = :id");
    $updateQuery->bindParam(':tgl_kembali', $formattedDate);
    $updateQuery->bindParam(':id', $id);
    $updateQuery->execute();

    // Data berhasil ditambahkan ke database, tampilkan pesan sukses
    echo '<script>
                Swal.fire({
                    title: "Sukses",
                    text: "Berhasil di perpanjang.",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(function() {
                    window.location.href = "index.php?halaman=data_peminjam&id=' . $id . '";
                });
         </script>';
}
?>
