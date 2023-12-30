<?php
include('./Components/header.php');
include('koneksi.php');
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = '$myusername'";
    $result = mysqli_query($koneksi, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];

        if (password_verify($mypassword, $storedPassword)) {
            $_SESSION['login_user'] = $myusername;

            echo '<script>
                alert("Selamat Datang ' . $myusername . '");
                window.location.href="index.php";
                </script>';
        } else {
            $error = "Username / Password kamu salah, Tolong coba lagi ya";
            echo '<script>
                   alert("' . $error . '");
                   window.location.href="login.php";
                   </script>';
            die();
        }
    } else {
        $error = "Username / Password kamu salah, Tolong coba lagi ya";
        echo '<script>
               alert("' . $error . '");
               window.location.href="login.php";
               </script>';
        die();
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid mx-auto border p-3 bg-primary justify-content-center align-items-center" style="height: 100vh; display: flex;">
        <div class="card p-5 shadow rounded-4" style="width: 70vh;">
            <div class="p-3 mx-auto" style="width: max-content;">
                <img src="Assets/maju.png" alt="" width="70px">
            </div>
            <h3 class="text-center fw-bold mt-3">Login</h3>
            <form action="" method="post" class="mt-3">
                <div class="mb-3 form-floating">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
                    <label for="floatingInput">username</label>
                </div>
                <div class="mb-3 form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Username" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" id="tombol" class="btn btn-primary text-white fw-bold mt-4">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
