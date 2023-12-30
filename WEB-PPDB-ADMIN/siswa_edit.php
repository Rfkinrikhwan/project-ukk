<?php
    include('auth.php');
    include('./koneksi.php');

    $nisn = $_GET['nisn'];
    $sql = "SELECT * FROM siswa WHERE nisn = '$nisn'";
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($result);

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $nisn = $_POST['nisn'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tmpt_tgl_lahir = $_POST['tmpt_tgl_lahir'];
        $jurusan = $_POST['jurusan'];

        // Periksa apakah ada file foto yang diunggah
        if (!empty($_FILES["foto"]["name"])) {
            $target_dir = "Image/";
            $target_file = $target_dir . basename($_FILES["foto"]["name"]);
            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

            $sql = "UPDATE siswa SET nis='$nis', nama='$nama', alamat='$alamat', tmpt_tgl_lahir='$tmpt_tgl_lahir', jurusan='$jurusan', foto='$target_file' WHERE nisn='$nisn'";
        } else {
            $sql = "UPDATE siswa SET nis='$nis', nama='$nama', alamat='$alamat', tmpt_tgl_lahir='$tmpt_tgl_lahir', jurusan='$jurusan' WHERE nisn='$nisn'";
        }
        

        if(mysqli_query($koneksi, $sql)){
            echo "<script>window.location.href='siswa.php'</script>";
        }        
    }
?>
<div class="container-fluid p-5 bg-light">
    <div class="row justify-content-center shadow-sm rounded-4 p-2 bg-white">
        <div class="col-md-12">
            <div class="p-3 d-flex justify-content-between">
                <div class="">
                    <h3 class="fw-bold">Edit Data Siswa</h3>
                </div>
                <div class="">
                    <a href="siswa.php" class="btn btn-primary">
                        <i class="fa fa-chevron-left"></i>
                        Kembali
                    </a>
                </div>
            </div>
            
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">NISN</label>
                    <input type="text" value="<?= $data['nisn'] ?>" name="nisn" class="form-control" required maxlength="10">
                </div>
                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="text" value="<?= $data['nis'] ?>" name="nis" class="form-control" required maxlength="10">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" value="<?= $data['nama'] ?>" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input value="<?= $data['alamat'] ?>" name="alamat" class="form-control" required></input>
                </div>
                <div class="mb-3">
                    <label class="form-label">TTL</label>
                    <input type="date" value="<?= $data['tmpt_tgl_lahir'] ?>" name="tmpt_tgl_lahir" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <input type="text" value="<?= $data['jurusan'] ?>" name="jurusan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="file" name="foto" class="form-control" accept="image/png, image/jpeg">
                    <div class="d-flex flex-row mb-3">
                        <?php if (!empty($data['foto'])) : ?>
                            <img src="<?= $data['foto'] ?>" alt="Foto Siswa" class="img-fluid mb-2 mt-3 p-2" width="100">
                        <?php endif; ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
