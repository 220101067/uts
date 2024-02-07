<?php

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$confirm_password = htmlspecialchars($_POST['confirm_password']); // Add this line
$level = htmlspecialchars($_POST['level']);
$pass_hash = password_hash($password, PASSWORD_DEFAULT);

// empty() -> cek var kosong / tidak
// isset() -> cek var ada / tidak

if (empty($username) || empty($password) || empty($confirm_password)) {
    echo "<script>
                alert('Data tidak boleh kosong!');
                window.location.href = 'index.php?halaman=tambah_user';
        </script>";
} elseif ($password !== $confirm_password) {
    echo "<script>
                alert('Password dan Konfirmasi Password tidak sesuai!');
                window.location.href = 'index.php?halaman=tambah_user';
        </script>";
} else {
    //cek username
    $cek = $con->prepare("SELECT * FROM user WHERE username = ?");
    $cek->bindParam(1, $username);
    $cek->execute();
    $jml = $cek->rowCount();

    if ($jml == 0) {
        //simpan
        $sql = "INSERT INTO user (username, password, level) VALUES (:username, :password, :level)";

        $save = $con->prepare($sql);
        //bind
        $save->bindParam('username', $username);
        $save->bindParam('password', $pass_hash);
        $save->bindParam('level', $level);
        //exec
        $save->execute();

        echo "<script>
                    Swal.fire({
                        title: 'Data Berhasil disimpan!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        window.location.href = 'index.php?halaman=tambah_user';
                    });
                </script>";
    } else {
        // username exists
        echo "<script>
                        alert('Username sudah ada!!');
                        window.location.href = 'index.php?halaman=tambah_user';
                </script>";
    }
}
