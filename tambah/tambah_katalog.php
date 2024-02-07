<?php
$penerbit = array();


?>

<div class="card shadow mb-1">
    <div class="card-body">
        <h4>Halaman Tambah Katalog Buku</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <div class="card mt-4 mb-4">
            <div class="card-body ps-5 pe-5 pb-3 shadow border-0">
                <form action="index.php?halaman=katalog_buku_save" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="judul" class="form-label">Judul Buku:</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div for="col-md-3">
                            <label for="gambar" class="form-label">Gambar Buku:</label>
                            <input type="file" class="form-control" name="gambar" accept="image/*">
                        </div>


                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pengarang" class="form-label">Pengarang:</label>
                            <input type="text" class="form-control" id="pengarang" name="pengarang" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="inlineFormSelectPref">Penerbit:</label>
                            <select name="id_penerbit" class="form-control" id="inlineFormSelectPref" required>
                                <option selected disabled>Pilih Penerbit</option>

                                <?php
                                $x = $con->query("SELECT * FROM penerbit_buku");
                                while ($j = $x->fetch()) {
                                    echo "<option value='$j[id_penerbit]'>$j[nama_penerbit]</option>";
                                }
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="jumlah" class="form-label">Jumlah:</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="index.php?halaman=katalog_buku" class="btn btn-secondary">Batal</a>
                            <button class="btn btn-success" name="submit">Submit</button>
                        </div>
                      
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>