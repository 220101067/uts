<style>
  body {
    font-family: Arial, sans-serif;
    text-align: center;

  }

  h1 {
    color: #333;
    animation: slideIn 2s ease-in-out;
  }

  @keyframes slideIn {
    from {
      transform: translateY(-50px);
      opacity: 0;
    }

    to {
      transform: translateY(0);
      opacity: 1;
    }
  }
</style>

<body>
  <center>
    <h1>Selamat Datang di Website Saya</h1>
  </center>
  <center>
    <p>Terima kasih telah mengunjungi situs web ini. Silakan jelajahi halaman-halaman kami.</p>
  </center>
</body>

</html>


<?php


try {
  $stmt = $con->prepare("SELECT COUNT(*) FROM mahasiswa");
  $stmt->execute();
  $totalMahasiswa = $stmt->fetchColumn();

  $stmt = $con->prepare("SELECT COUNT(*) FROM katalog_buku");
  $stmt->execute();
  $totalBuku = $stmt->fetchColumn();

  $stmt = $con->prepare("SELECT COUNT(*) FROM transaksi_peminjaman");
  $stmt->execute();
  $totalPeminjam = $stmt->fetchColumn();
} catch (PDOException $e) {
  die("Kesalahan saat mengambil data: " . $e->getMessage());
}


?>




<body>



  <div class="container mt-5">

    <div class="row mt-5">
      <div class="col-md-4">
        <div class="card rounded">
          <div class="card-body">
            <h4 class="card-title">Total <br>Mahasiswa <i class="fas fa-user-graduate"></i> </h4>
            <p class='card-text'><?php echo $totalMahasiswa; ?></p>
            <a href="index.php?halaman=mahasiswa" class="btn btn-primary"><i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i> Detail </a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Total <br> Buku <i class="fas fa-book-open"></i></h4>
            <p class='card-text'><?php echo $totalBuku; ?></p>
            <a href="index.php?halaman=katalog_buku" class="btn btn-primary"><i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>Detail</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Total <br>Peminjam  <i class="bi bi-people-fill"></i></h4>
            <p class='card-text'><?php echo $totalPeminjam; ?></p>
            <a href="index.php?halaman=data_peminjam" class="btn btn-primary"><i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i> Detail</a>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>

</html>


