<?php
include('auth.php');
include('./koneksi.php');

$id_fasilitas = $_GET['id_fasilitas'];
$sql = "SELECT * FROM fasilitas WHERE id_fasilitas = '$id_fasilitas'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id_fasilitas = $_POST['id_fasilitas'];
    $nama_fasilitas = $_POST['nama_fasilitas'];
    $deskripsi = $_POST['deskripsi'];

    // Periksa apakah ada file foto yang diunggah
    if (!empty($_FILES["foto"]["name"])) {
        $target_dir = "Image/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

        $sql = "UPDATE fasilitas SET nama_fasilitas = '$nama_fasilitas', deskripsi = '$deskripsi', foto='$target_file' WHERE id_fasilitas='$id_fasilitas'";
    } else {
        $sql = "UPDATE fasilitas SET nama_fasilitas = '$nama_fasilitas', deskripsi = '$deskripsi' WHERE id_fasilitas='$id_fasilitas'";
    }


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
                    <h3 class="fw-bold">Edit Jurusan</h3>
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
                    <label class="form-label">Nama Jurusan</label>
                    <input type="hidden" name="id_fasilitas" value="<?= $data['id_fasilitas'] ?>">
                    <input type="text" value="<?= $data['nama_fasilitas'] ?>" name="nama_fasilitas" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" value="<?= $data['deskripsi'] ?>" name="deskripsi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control mt-2" accept="image/png, image/jpeg">
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