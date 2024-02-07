<?php
    $id = $_GET['id'];

    $cari = $con->prepare("SELECT * FROM mahasiswa WHERE id_mahasiswa = ?");
    $cari->bindParam(1, $id);
    $cari->execute();
    $jml = $cari->rowCount();

    if ($jml == 0) {
        echo "<script>
            alert('ID tidak ada!');
            window.location.href = 'index.php?halaman=mahasiswa';
        </script>";
    } else {
        $data= $cari->fetch();
        // Lakukan operasi lain dengan $update
    }
?>



<div class="container ">
    <div class="card shadow mb-1">
        <div class="card-body">
            <h4>Halaman Edit Mahasiswa</h4>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-10 ">
            <div class="card mt-4 mb-4 ">
                <div class="card-body  pe-5 pb-3 shadow border-0">
                    <form action="index.php?halaman=mahasiswa_update" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nim" class="form-label">id: </label>
                                    <input type="text" class="form-control" id="id_mahasiswa" name="id_mahasiswa" value="<?= $data['id_mahasiswa'] ?>"readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nim" class="form-label">nim: </label>
                                    <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>"readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama : </label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kelas" class="form-label"> Kelas :</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $data['kelas'] ?>">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nohp" class="form-label">Nomor telpon : </label>
                                    <input type="number" class="form-control" id="no_tlfon" name="no_telpon" value="<?= $data['no_telpon'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">alamat : </label>
                            <textarea class="form-control" name="alamat" id="" cols="10" rows="2"><?= $data['alamat'] ?></textarea>
                        </div>
                        <a href="index.php?halaman=mahasiswa" class="btn btn-secondary">Batal</a>
                        <button class="btn btn-success" name="update">Updet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

