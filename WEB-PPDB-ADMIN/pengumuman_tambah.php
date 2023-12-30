<?php
    include('auth.php');
    include('koneksi.php'); // Sesuaikan dengan path ke berkas koneksi.php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $tanggal = $_POST['tanggal'];
        $pengumuman = $_POST['deskripsi'];

        $sql = "INSERT INTO `pengumuman` (`id`, `tanggal`, `deskripsi`) VALUES (NULL, '$tanggal', '$pengumuman')";

        if(mysqli_query($koneksi, $sql)){
            echo "<script>location.href='pengumuman.php'</script>";
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
                    <a href="pengumuman.php" class="btn btn-primary">
                        <i class="fa fa-chevron-left"></i>
                        Kembali
                    </a>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>