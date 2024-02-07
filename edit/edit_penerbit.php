<?php
    $id= $_GET['id'];

    $cari = $con->prepare("SELECT * FROM penerbit_buku WHERE id_penerbit = ?");
    $cari->bindParam(1, $id);
    $cari->execute();
    $jml = $cari->rowCount();

    if ($jml == 0) {
        echo "<script>
            alert('ID tidak ada!');
            window.location.href = 'index.php?halaman=penerbit_buku';
        </script>";
    } else {
        $data= $cari->fetch();
        // Lakukan operasi lain dengan $update
    }
?>

<div class="container">
    <div class="card shadow mb-1">
        <div class="card-body">
            <h4>Halaman Edit penerbit</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="card mt-4 mb-4">
                <div class="card-body pe-5 pb-3 shadow border-0">
                    <form action="index.php?halaman=penerbit_buku_update" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">No Penerbit:</label>
                                    <input type="text" class="form-control" id="nama" name="id_penerbit" value="P0<?= $data['id_penerbit'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama penerbit:</label>
                                    <input type="text" class="form-control" id="nama" name="nama_penerbit" value="<?= $data['nama_penerbit'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Tahun penerbit: </label>
                                    <input type="text" class="form-control"  name="tahun_penerbit"value="<?= $data['tahun_penerbit'] ?>">
                                </div>
                            </div>
                        </div>

                        <a href="index.php?halaman=penerbit_buku" class="btn btn-secondary">Batal</a>
                        <button class="btn btn-success" name="update">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

