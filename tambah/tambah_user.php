<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Include Font Awesome CSS -->
    <title>Your Page Title</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card mt-5 mb-5">
                    <div class="card-body ps-5 pe-5 pb-5 shadow border-0">
                        <center>
                            <h4>Form Register User</h4>
                        </center>
                        <form action="index.php?halaman=user_save" method="post">
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control" required>
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary"
                                                onclick="togglePasswordVisibility('password')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="confirm_password" class="col-sm-3 col-form-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="password" name="confirm_password" class="form-control" required>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="level" class="col-sm-3 col-form-label">Level</label>
                                <div class="col-sm-9">
                                    <select name="level" class="form-control" required>
                                        <option value="" disabled selected>-Pilih-</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-9 offset-sm-3">
                                    <a href="index.php?halaman=dashboard" class="btn btn-sm btn-success mb-1">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>

</html>



<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped" id="tables">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Level</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = $con->query("SELECT * FROM user");
            while ($row = $sql->fetch()) {

                echo "<tr>
                <td>$no</td>
                <td>$row[username]</td>
                <td>$row[level]</td>
               
            </tr>";
                $no++;
            }
            ?>



        </tbody>
    </table>
</div>