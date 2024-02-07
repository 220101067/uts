<?php
$mahasiswa = array();
?>


<div class="card shadow mb-3">
    <div class="card-body">
        <h3> Mahasiswa  <i class="fas fa-user-graduate"></i> </h3>
    </div>
</div>

<div class="card shadow bg-white mt-3">
    <div class="card-body">

        <?php if (!isset($_SESSION['level']) || empty($_SESSION['level']) || $_SESSION['level'] !== 'admin') : ?>
            <!-- ini untuk tidak bisa edit/tambah karena bukan admin / hanya user -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="tables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>No_telpon</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $con->query("SELECT * FROM mahasiswa");
                        while ($row = $sql->fetch()) {
                            echo "<tr>
                                    <td> $row[id_mahasiswa]</td>
                                    <td> $row[nim] </td>
                                    <td> $row[nama] </td>
                                    <td> $row[kelas] </td>
                                    <td>$row[no_telpon] </td>
                                    <td>$row[alamat] </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <!-- ini untuk edit dan tambah karena admin yang login -->
            <a href="index.php?halaman=tambah_mahasiswa" class="btn btn-success mb-3 btn-lg">
                <i class="fas fa-user-plus"></i> 
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="tables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>No_telpon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $con->query("SELECT * FROM mahasiswa");
                        while ($row = $sql->fetch()) {
                            echo "<tr>
                                    <td> $row[id_mahasiswa]</td>
                                    <td> $row[nim] </td>
                                    <td> $row[nama] </td>
                                    <td> $row[kelas] </td>
                                    <td>$row[no_telpon] </td>
                                    <td>$row[alamat] </td>
                                    <td>
                                        <a href='index.php?halaman=edit_mahasiswa&id={$row['id_mahasiswa']}' class='btn btn-warning'><i class='bi bi-pencil-square'></i></a>
                                        <a href='index.php?halaman=hapus_mahasiswa&id={$row['id_mahasiswa']}' onclick=\"return confirm('Hapus Data?')\" class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>