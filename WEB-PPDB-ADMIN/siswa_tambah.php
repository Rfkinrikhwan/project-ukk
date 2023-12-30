<?php
    include('auth.php');
    include('./koneksi.php'); // Sesuaikan dengan path ke berkas koneksi.php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tmpt_tgl_lahir = $_POST['tmpt_tgl_lahir'];
    $jurusan = $_POST['jurusan'];

    $target_dir = "Image/"; // Sesuaikan dengan folder tempat menyimpan foto
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

    $sql = "INSERT INTO siswa (nisn, nis, nama, alamat, tmpt_tgl_lahir, jurusan, foto) VALUES ('$nisn', '$nis', '$nama', '$alamat', '$tmpt_tgl_lahir', '$jurusan', '$target_file')";

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
                    <h3 class="fw-bold">Tambah Siswa</h3>
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
                    <input type="text" name="nisn" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="text" name="nis" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">TTL</label>
                    <input type="date" name="tmpt_tgl_lahir" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" required>
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