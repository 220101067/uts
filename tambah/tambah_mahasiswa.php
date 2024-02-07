<div class="container ">
    <div class="card shadow mb-1">
        <div class="card-body">
            <h4>Halaman Tmabah Mahasiswa</h4>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-10 ">
            <div class="card mt-4 mb-4 ">
                <div class="card-body ps-5 pe-5 pb-3 shadow border-0">
                    <form action="index.php?halaman=mahasiswa_save.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nim" class="form-label">nim: </label>
                                    <input type="text" class="form-control" id="nim" name="nim">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama : </label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kelas" class="form-label"> Kelas :</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nohp" class="form-label">Nomor telfon : </label>
                                    <input type="number" class="form-control" id="no_tlfon" name="no_telpon">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">alamat : </label>
                            <textarea class="form-control" name="alamat" id="" cols="10" rows="2"></textarea>
                        </div>
                        <a href="index.php?halaman=mahasiswa" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success" name="save">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// if (isset($_POST['submit'])) {
//     $nim = htmlspecialchars($_POST['nim']);
//     $nama = htmlspecialchars($_POST['nama']);
//     $kelas = htmlspecialchars($_POST['kelas']);
//     $no_telpon = htmlspecialchars($_POST['no_telpon']);
//     $alamat = htmlspecialchars($_POST['alamat']);

//     // Prepare the SELECT statement to check for existing records
//     $check_query = "SELECT * FROM mahasiswa WHERE nim=?";
//     $stmt_check = $conn->prepare($check_query);
//     $stmt_check->bind_param("s", $nim);
//     $stmt_check->execute();
//     $result_check = $stmt_check->get_result();

//     if ($result_check->num_rows > 0) {
//         // If a record with the same NIM already exists, show an error message
//         echo '<script>
//           Swal.fire({
//             title: "Error",
//             text: "Nama atau Nim sudah ada.",
//             icon: "error",
//             confirmButtonText: "OK"
//           });
//       </script>';
//     } else {
//         // If there's no existing record with the same NIM, proceed with data insertion
//         $insert_query = "INSERT INTO mahasiswa (nim, nama, kelas, no_telpon, alamat ) VALUES (?, ?, ?, ?, ?)";
//         $stmt_insert = $conn->prepare($insert_query);
//         $stmt_insert->bind_param("sssss", $nim, $nama, $kelas, $no_telpon, $alamat);

//         if ($stmt_insert->execute()) {
//             // Data successfully added to the database, show a success message
//             echo '<script>
//             Swal.fire({
//               title: "Sukses",
//               text: "Data berhasil ditambahkan.",
//               icon: "success",
//               confirmButtonText: "OK"
//             }).then(() => {
//                 window.location.href = "index.php?halaman=mahasiswa";
//             });
//         </script>';
//         } else {
//             // Error occurred while adding data
//             echo '<script>
//             Swal.fire({
//               title: "Error",
//               text: "Terjadi kesalahan: ' . $stmt_insert->error . '",
//               icon: "error",
//               confirmButtonText: "OK"
//             });
//         </script>';
//         }
//     }

//     // Close prepared statements
//     $stmt_check->close();
//     $stmt_insert->close();
// }

?>