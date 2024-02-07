<?php
$id = $_GET['id'];

$cari = $con->prepare("SELECT * FROM katalog_buku JOIN penerbit_buku ON katalog_buku.id_penerbit = penerbit_buku.id_penerbit  WHERE id_katalog = ?");
$cari->bindParam(1, $id);
$cari->execute();
$jml = $cari->rowCount();

if ($jml == 0) {
    echo "<script>
            alert('ID tidak ada!');
            window.location.href = 'index.php?halaman=katalog_buku';
        </script>";
} else {
    $data = $cari->fetch();
    // Lakukan operasi lain dengan $update
}
?>

<div class="card shadow mb-1">
    <div class="card-body">
        <h4>Halaman edit katalog buku</h4>
    </div>
</div>
<div class="row ">
    <div class="col-md-10 ">
        <div class="card mt-4 mb-4 ">
            <div class="card-body ps-5 pe-5 pb-3 shadow border-0">
                <form action="index.php?halaman=katalog_buku_update" method="post"enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="judul" class="form-label">id </label>
                                <input type="text" class="form-control" name="id_katalog" value="<?= $data['id_katalog'] ?>" readonly>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="judul" class="form-label">judul buku: </label>
                                <input type="text" class="form-control" id="judul" name="judul" value="<?= $data['judul'] ?>">
                            </div>

                        </div>
                        <div for="col-md-3">
                            <label for="gambar" class="form-label">Gambar Buku:</label>
                            <input type="file" class="form-control" name="gambar" accept="image/*">
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pengarang" class="form-label"> pengarang:</label>
                                <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= $data['pengarang'] ?>">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="inlineFormSelectPref">Penerbit</label>
                                <select name="id_penerbit" class="form-control" id="inlineFormSelectPref" required>
                                    <option value="<?= $data['id_penerbit'] ?>"><?= $data['nama_penerbit'] ?></option>

                                    <!-- perluangkan dengan forech / tampilkan data (menampilkan data dokter) -->
                                    <?php
                                    $x = $con->query("SELECT * FROM penerbit_buku");
                                    while ($j = $x->fetch()) {
                                        echo "<option value='$j[id_penerbit]'' >$j[nama_penerbit]</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">jumlah: </label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $data['jumlah'] ?>">
                            </div>
                        </div>
                    </div>
                    <a href="index.php?halaman=katalog_buku" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-success" name="update">Update</button>
            </div>

        </div>


        </form>
    </div>
</div>
</div>
</div>