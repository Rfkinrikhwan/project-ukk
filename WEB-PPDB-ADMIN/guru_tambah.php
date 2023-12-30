<?php
include('auth.php');
include('./koneksi.php'); // Sesuaikan dengan path ke berkas koneksi.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_guru = $_POST['nama_guru'];
    $ttl = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    $nik = $_POST['nik'];
    $mapel = $_POST['mapel'];

    $target_dir = "Image/"; // Sesuaikan dengan folder tempat menyimpan foto
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

    $sql = "INSERT INTO guru (id_guru, nama_guru, tmpt_tgl_lahir, alamat, nik, mapel, foto) VALUES ('', '$nama_guru', '$ttl', '$alamat', '$nik', '$mapel', '$target_file')";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>window.location.href='guru.php'</script>";
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
                    <a href="guru.php" class="btn btn-primary">
                        <i class="fa fa-chevron-left"></i>
                        Kembali
                    </a>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Nama Guru</label>
                    <input type="text" name="nama_guru" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="ttl" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nik</label>
                    <input type="text" name="nik" class="form-control" required></input>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mapel</label>
                    <input type="text" name="mapel" class="form-control" required>
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