<?php
session_start();
require_once 'koneksi/koneksi.php';



if (isset($_SESSION['level']) && !empty($_SESSION['level'])) {
    if ($_SESSION['level'] == 'admin') {
        header('Location: admin_dashboard.php');
        exit();
    } elseif ($_SESSION['level'] == 'user') {
        header('Location: user_dashboard.php');
        exit();
    }
}



?>

<!DOCTYPE html>
<html>

<head>
    <title>Aneka-Perpus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        /* Add your custom styles here */
    </style>
</head>

<body>
    <div class="row justify-content-center mt-5">
        <div class="col-md-9">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-5 d-none d-lg-block ">
                            <img style="width: 480px; height: 420px; padding-left: 30px;" src="assets/gambar/login.png">
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5 mt-4 p-4">
                            <h2 class="text-center mb-2">Login</h2>
                            <form action="" method="POST" class="p-3">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="user" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="pass" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="login" class="btn text-light btn-block" style="background-color: #8E81FF">Login</button>

                                <br> <a href="#">lupa password?</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to toggle password visibility -->
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleButton = document.querySelector(".input-group-append button");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.type = "password";
                toggleButton.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }
    </script>
    <!-- alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
// cek login
if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['pass']);

    if (empty($username) || empty($password)) {
        echo "<script>
                alert('Data tidak boleh kosong!');
                window.location.href = 'login.php';
              </script>";
    } else {
        //cek username
        $stmt = $con->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $jml = $stmt->rowCount();

        if ($jml > 0) {
            #user ada 
            $user_info = $stmt->fetch(PDO::FETCH_ASSOC);
            # cek password
            if ($user_info && password_verify($password, $user_info['password'])) {
                 # password benar, buat session
                $_SESSION['level'] = $user_info['level'];
                $_SESSION['username'] = $user_info['username'];

                if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'user') {
                    echo "<script>
                            Swal.fire({
                                title: 'Login sukses!',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                window.location.href = 'index.php?halaman=dashboard';
                            });
                          </script>";
                    exit;
                }
            } else {
                echo "<script>
                        alert('Username atau password salah');
                        window.location.href = 'login.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Username tidak ditemukan');
                    window.location.href = 'login.php';
                  </script>";
        }
    }
}
?>
