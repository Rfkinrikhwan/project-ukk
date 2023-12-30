<?php
    include('auth.php');
    include('./koneksi.php'); // Sesuaikan dengan path ke berkas koneksi.php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama_admin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $target_dir = "Image/"; // Sesuaikan dengan folder tempat menyimpan foto
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

    $sql = "INSERT INTO admin (id, nama_admin, username, password, foto) VALUES ('', '$nama_admin', '$username', '$password', '$target_file')";

    if(mysqli_query($koneksi, $sql)){
        echo "<script>window.location.href='admin.php'</script>";
    }   
}
?>


<div class="container-fluid p-5 bg-light">
    <div class="row justify-content-center shadow-sm rounded-4 p-2 bg-white">
        <div class="col-md-12">
            <div class="p-3 d-flex justify-content-between">
                <div class="">
                    <h3 class="fw-bold">Tambah Siswa</h3>
                </div>
                <div class="">
                    <a href="admin.php" class="btn btn-primary">
                        <i class="fa fa-chevron-left"></i>
                        Kembali
                    </a>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Nama Admin</label>
                    <input type="text" name="nama_admin" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>