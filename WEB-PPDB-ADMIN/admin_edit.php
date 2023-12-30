<?php
    include('auth.php');
    include('./koneksi.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM admin WHERE id = '$id'";
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($result);

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $id = $_POST['id'];
        $nama_admin = $_POST['nama_admin'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $foto = $_POST['foto'];
        

        // Periksa apakah ada file foto yang diunggah
        if (!empty($_FILES["foto"]["name"])) {
            $target_dir = "Image/";
            $target_file = $target_dir . basename($_FILES["foto"]["name"]);
            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

            $sql = mysqli_query($koneksi,"UPDATE admin SET nama_admin='$nama_admin', username='$username', password='$password', foto='$target_file' WHERE id='$id'");
        } else {
            $sql = mysqli_query($koneksi,"UPDATE admin SET nama_admin='$nama_admin', username='$username', password='$password', foto='$target_file' WHERE id='$id'");
        }
        

        if($sql){
            echo "<script>window.location.href='admin.php'</script>";
        }           
    }
?>
<div class="container-fluid p-5 bg-light">
    <div class="row justify-content-center shadow-sm rounded-4 p-2 bg-white">
        <div class="col-md-12">
            <div class="p-3 d-flex justify-content-between">
                <div class="">
                    <h3 class="fw-bold">Edit Data admin</h3>
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
                    <label class="form-label">Nama admin</label>
                    <input type="hidden" value="<?= $data['id'] ?>" name="id" class="form-control" >
                    <input type="text" value="<?= $data['nama_admin'] ?>" name="nama_admin" class="form-control" required maxlength="10">
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" value="<?= $data['username'] ?>" name="username" class="form-control" required maxlength="10">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" value="<?= $data['password'] ?>" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="file" name="foto" class="form-control" accept="image/png, image/jpeg">
                    <div class="d-flex flex-row mb-3">
                        <?php if (!empty($data['foto'])) : ?>
                            <img src="<?= $data['foto'] ?>" alt="Foto admin" class="img-fluid mb-2 mt-3 p-2" width="100">
                        <?php endif; ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>