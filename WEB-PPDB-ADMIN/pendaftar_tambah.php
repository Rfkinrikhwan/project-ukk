<?php
    include('auth.php');
    include('./koneksi.php'); // Sesuaikan dengan path ke berkas koneksi.php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        $alamat = $_POST['alamat'];
        $pilihan_jurusan = $_POST['pilihan_jurusan'];
        $asal_sekolah = $_POST['asal_sekolah'];
        $alasan = $_POST['alasan'];

        $sql = "INSERT INTO pendaftaran (id, nama, nik, alamat, pilihan_jurusan, asal_sekolah, alasan) VALUES ('', '$nama', '$nik', '$alamat','$pilihan_jurusan','$asal_sekolah','$alasan')";

        if(mysqli_query($koneksi, $sql)){
            echo "<script>window.location.href='pendaftar.php'</script>";
        }   
    }
?>


<div class="container-fluid p-5 bg-light">
    <div class="row justify-content-center shadow-sm rounded-4 p-2 bg-white">
        <div class="col-md-12">
            <div class="p-3 d-flex justify-content-between">
                <div class="">
                    <h3 class="fw-bold">Tambah Pendaftar</h3>
                </div>
                <div class="">
                    <a href="pendaftar.php" class="btn btn-primary">
                        <i class="fa fa-chevron-left"></i>
                        Kembali
                    </a>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                    <label class="form-label">NAMA</label>
                    <input type="hidden" value="<?= $data['id'] ?>" name="id">
                    <input type="text" value="<?= $data['nama'] ?>" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" value="<?= $data['nik'] ?>" name="nik" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ALAMAT</label>
                    <input type="text" value="<?= $data['alamat'] ?>" name="alamat" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">PILIHAN JURUSAN</label>
                    <input type="text" value="<?= $data['pilihan_jurusan'] ?>" name="pilihan_jurusan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ASAL SEKOLAH</label>
                    <input type="text" value="<?= $data['asal_sekolah'] ?>" name="asal_sekolah" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ALASAN</label>
                    <input type="text" value="<?= $data['alasan'] ?>" name="alasan" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>