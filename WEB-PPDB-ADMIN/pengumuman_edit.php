<?php
    include('auth.php');
    include('./koneksi.php');

    $id_p = $_GET['id'];
    $sql = "SELECT * FROM pengumuman WHERE id = '$id_p'";
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($result);

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $id_p = $_POST['id'];
        $tanggal = $_POST['tanggal'];
        $deskripsi = $_POST['deskripsi'];
        
        $sql = "UPDATE pengumuman SET tanggal ='$tanggal', deskripsi ='$deskripsi' WHERE id = $id_p";

        if(mysqli_query($koneksi, $sql)){
            echo "<script>window.location.href='pengumuman.php'</script>";
        }        
    }
?>
<div class="container-fluid p-5 bg-light">
    <div class="row justify-content-center shadow-sm rounded-4 p-2 bg-white">
        <div class="col-md-12">
            <div class="p-3 d-flex justify-content-between">
                <div class="">
                    <h3 class="fw-bold">Edit Pengumuman</h3>
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
                    <input type="hidden" value="<?= $data['id'] ?>" name="id">
                    <input type="date" value="<?= $data['tanggal'] ?>" name="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" value="<?= $data['deskripsi'] ?>" name="deskripsi" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
