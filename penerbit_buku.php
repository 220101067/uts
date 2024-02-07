<?php
$penerbit_buku = array();
?>

<div class="card shadow mb-3">
    <div class="card-body">
        <h3>penerbit buku <i class="fas fa-building"></i></h3>
    </div>
</div>

<div class="card shadow bg-white mt-3">
    <div class="card-body">

        <?php if (!isset($_SESSION['level']) || empty($_SESSION['level']) || $_SESSION['level'] !== 'admin') : ?>
            <!-- ini untu tida bisa edit/tambah karna bukan admin / cuma user  -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="tables">
                    <thead>
                        <tr>

                            <th>Kode Penerbit</th>
                            <th>Nama penerbit</th>
                            <th>tahun terbit</th>
                           
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        $sql = $con->query("SELECT * FROM penerbit_buku");
                        while ($row = $sql->fetch()) {



                            echo " <tr>
                           
                            <td>P0$row[id_penerbit]  </td>
                            <td>$row[nama_penerbit] </td>
                            <td>$row[tahun_penerbit] </td>
                            
                                
                            
                            </tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        <?php else : ?>
            <!-- ini untuk edit dan tambah karna  admin yang login -->
            <a href="index.php?halaman=tambah_penerbit" class="btn btm-sm btn-success mb-3">   <i class="fas fa-user-plus"></i> </a>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="tables">
                    <thead>
                        <tr>

                            <th>Kode Penerbit</th>
                            <th>Nama penerbit</th>
                            <th>tahun terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        $sql = $con->query("SELECT * FROM penerbit_buku");
                        while ($row = $sql->fetch()) {



                            echo " <tr>
                           
                            <td>P0$row[id_penerbit]  </td>
                            <td>$row[nama_penerbit] </td>
                            <td>$row[tahun_penerbit] </td>
                            <td>
                                
                            <!-- Kolom untuk tombol Edit dan Delete -->
                            <a href='index.php?halaman=edit_penerbit&id={$row['id_penerbit']}'class='btn btn-warning'><i class='bi bi-pencil-square'></i></a>
                            <a href='index.php?halaman=hapus_penerbit&id={$row['id_penerbit']}' onclick=\"return confirm('Hapus Data?')\" class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
            
                            </td>
                            </tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        <?php endif; ?>
    </div>
</div>