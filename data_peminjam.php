<?php
$tanggal_saat_ini = date('Y-m-d'); // Tanggal saat ini
?>

<h4>Halaman Data Peminjam</h4>

<div class="row mt-3 justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                DATA PEMINJAMAN
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="tables">
                        <thead>
                            <tr>
                                <th>No. Pinjam</th>
                                <th>Judul Buku</th>
                                <th>Nama Siswa</th>
                                <th>Tgl. Pinjam</th>
                                <th>Tgl. Kembali</th>
                                <th>Terlambat</th>
                                <th>Kembali</th>
                                <th>Perpanjang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $con->query("SELECT * FROM transaksi_peminjaman 
                                JOIN mahasiswa ON transaksi_peminjaman.id_mahasiswa = mahasiswa.id_mahasiswa
                                JOIN katalog_buku ON transaksi_peminjaman.id_katalog = katalog_buku.id_katalog WHERE status='pinjam'");
                            $counter = 1;

                            while ($data = $sql->fetch()) {

                                $tanggal_pinjam = $data['tgl_pinjam'];
                                $tanggal_kembali_seharusnya = $data['tgl_kembali'];

                                $selisih_hari = max(0, floor((strtotime($tanggal_saat_ini) - strtotime($tanggal_kembali_seharusnya)) / (60 * 60 * 24)));
                                $selisih_hari_text = ($selisih_hari > 0) ? $selisih_hari . ' hari' : '0 hari';

                                echo "<tr>
                                        <td>$counter</td>
                                        <td>{$data['judul']}</td>
                                        <td>{$data['nama']}</td>
                                        <td>{$tanggal_pinjam}</td>
                                        <td>{$tanggal_kembali_seharusnya}</td>
                                        <td>{$selisih_hari_text}</td>
                                        <td>
                                            <a href='index.php?halaman=kembali&id={$data['id_peminjam']}' 
                                                onclick=\"return confirm('Kembalikan Buku Ini?')\" 
                                                title='Kembalikan' class='btn btn-danger'> <i class='fas fa-undo'></i>
                                                
                                            </a>

                                            
                                        </td>
                                        <td>
                                            <a href='index.php?halaman=perpanjang&id={$data['id_peminjam']}' 
                                                class='btn btn-success'>    <i class='fas fa-redo'></i>
                                            
                                            </a>
                                        </td>
                                        
                                    </tr>";
                                $counter++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2 mb-2">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <small class="text-danger">
                    <h6>Jika lewat dari 1 hari, denda sebesar 15.000.</h6>
                </small>
            </div>
        </div>
    </div>
</div>