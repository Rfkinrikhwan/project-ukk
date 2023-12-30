<?php
    include('auth.php');
    include('./koneksi.php');

    $id_guru = $_GET['id_guru'];
    $sql = "SELECT * FROM guru WHERE id_guru = '$id_guru'";
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($result);

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $id_guru = $_POST['id_guru'];
        $nama_guru = $_POST['nama_guru'];
        $ttl = $_POST['tmpt_tgl_lahir'];
        $alamat = $_POST['alamat'];
        $nik = $_POST['nik'];
        $mapel = $_POST['mapel'];

        // Periksa apakah ada file foto yang diunggah
        if (!empty($_FILES["foto"]["name"])) {
            $target_dir = "Image/";
            $target_file = $target_dir . basename($_FILES["foto"]["name"]);
            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

            $sql = "UPDATE guru SET nama_guru='$nama_guru', tmpt_tgl_lahir='$ttl', alamat='$alamat', nik='$nik', mapel='$mapel', foto='$target_file' WHERE id_guru='$id_guru'";
        } else {
            $sql = "UPDATE guru SET nama_guru='$nama_guru', tmpt_tgl_lahir='$ttl', alamat='$alamat', nik='$nik', mapel='$mapel' WHERE id_guru='$id_guru'";
        }
        

        if(mysqli_query($koneksi, $sql)){
            echo "<script>window.location.href='guru.php'</script>";
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
                    <label class="form-label">Nama Guru</label>
                    <input type="hidden" name="id_guru" value="<?= $data['id_guru'] ?>">
                    <input type="text" value="<?= $data['nama_guru'] ?>" name="nama_guru" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" value="<?= $data['tmpt_tgl_lahir'] ?>" name="tmpt_tgl_lahir" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input value="<?= $data['alamat'] ?>" name="alamat" class="form-control" required></input>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nik</label>
                    <input type="number" value="<?= $data['nik'] ?>" name="nik" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mapel</label>
                    <input type="text" value="<?= $data['mapel'] ?>" name="mapel" class="form-control" required>
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
