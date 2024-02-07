<?php 
$nomor_peminjaman = 'P00';
?>

<h4>Transaksi Peminjaman</h4>

<div class="row m-3 justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                TRANSAKSI PEMINJAMAN
            </div>
            <div class="card-body" style="padding-left: 3rem; padding-right: 5rem;">
                <form action="index.php?halaman=transaksi_peminjam_save" method="post">

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">No. Pinjam</label>
                        <div class="col-sm-9">
                            <input type="text" name="id_peminjaman" class="form-control" value="<?php echo $nomor_peminjaman ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <input type="text" name="status" class="form-control" value="pinjam" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Siswa</label>
                        <div class="col-sm-9">
                            <select name="id_mahasiswa" class="form-control" id="namaSiswa" required>
                                <option selected disabled>-- Pilih Nama Siswa --</option>
                                <?php
                                $result_mahasiswa = $con->query("SELECT * FROM mahasiswa");
                                while ($data_mahasiswa = $result_mahasiswa->fetch()) {
                                    echo "<option value='{$data_mahasiswa['id_mahasiswa']}'>{$data_mahasiswa['nama']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Judul Buku</label>
                        <div class="col-sm-9">
                            <select name="id_katalog" class="form-control" id="judulBuku" required>
                                <option selected disabled>-- Pilih Judul Buku --</option>
                                <?php
                                $result_katalog = $con->query("SELECT * FROM katalog_buku");
                                while ($data_katalog = $result_katalog->fetch()) {
                                    echo "<option value='{$data_katalog['id_katalog']}'>{$data_katalog['judul']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-9">
                            <input type="date" id="tgl_pinjam" name="tgl_pinjam" class="form-control border-0 bg-transparent">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Kembali</label>
                        <div class="col-sm-9">
                            <input type="date" id="tgl_kembali" name="tgl_kembali" class="form-control border-0 bg-transparent">
                        </div>
                    </div>

                    <a href="index.php?halaman=dashboard" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-success" type="submit" name="kirim">Kirim</button>

                </form>
            </div>
        </div>
    </div>
</div>
