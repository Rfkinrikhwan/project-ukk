<?php
include('auth.php');
include('./koneksi.php'); // Sesuaikan dengan path ke berkas koneksi.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_fasilitas = $_POST['nama_fasilitas'];
    $deskripsi = $_POST['deskripsi'];

    $target_dir = "Image/"; // Sesuaikan dengan folder tempat menyimpan foto
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

    $sql = "INSERT INTO fasilitas (id_fasilitas, nama_fasilitas, deskripsi, foto) VALUES ('', '$nama_fasilitas', '$deskripsi', '$target_file')";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>window.location.href='fasilitas.php'</script>";
    }
}
?>


<div class="container-fluid p-5 bg-light">
    <div class="row justify-content-center shadow-sm rounded-4 p-2 bg-white">
        <div class="col-md-12">
            <div class="p-3 d-flex justify-content-between">
                <div class="">
                    <h3 class="fw-bold">Tambah Jurusan</h3>
                </div>
                <div class="">
                    <a href="fasilitas.php" class="btn btn-primary">
                        <i class="fa fa-chevron-left"></i>
                        Kembali
                    </a>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Nama Jurusan</label>
                    <input type="text" name="nama_fasilitas" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" required>
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