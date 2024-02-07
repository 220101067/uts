<?php
// Assuming $con represents your database connection

$buku = array();
?>

<div class="card shadow mb-3">
    <div class="card-body">
        <h3>Katalog Buku <i class="bi bi-book-half"></i></i> </h3>
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
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Gambar</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Jumlah</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $con->query("SELECT * FROM katalog_buku JOIN penerbit_buku ON katalog_buku.id_penerbit = penerbit_buku.id_penerbit");
                        $counter = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>
                                <td>$counter</td>
                                <td>{$row['judul']}</td>
                                <td><img src='uploads/{$row['gambar']}' alt='{$row['gambar']}' style='max-width: 100px; max-height: 100px;'></td>
                                <td>{$row['pengarang']}</td>
                                <td>{$row['nama_penerbit']}</td>
                                <td>{$row['jumlah']}</td>
                               
                            </tr>";
                            $counter++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <!-- ini untuk edit dan tambah karna  admin yang login -->
            <a href="index.php?halaman=tambah_katalog" class="btn btn-sm btn-success mb-3">  <i class="fas fa-user-plus"></i></a>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="tables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Gambar</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $con->query("SELECT * FROM katalog_buku JOIN penerbit_buku ON katalog_buku.id_penerbit = penerbit_buku.id_penerbit");
                        $counter = 1;
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>
                                <td>$counter</td>
                                <td>{$row['judul']}</td>
                                <td><img src='uploads/{$row['gambar']}' alt='{$row['gambar']}' style='max-width: 100px; max-height: 100px;'></td>
                                <td>{$row['pengarang']}</td>
                                <td>{$row['nama_penerbit']}</td>
                                <td>{$row['jumlah']}</td>
                                <td>
                                    <a href='index.php?halaman=edit_katalog&id={$row['id_katalog']}' class='btn btn-warning'><i class='bi bi-pencil-square'></i></a>
                                    <a href='index.php?halaman=hapus_katalog&id={$row['id_katalog']}' onclick='return confirm(\"Hapus Data?\")' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
                                </td>
                            </tr>";
                            $counter++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>