<?php
include('auth.php');
include('koneksi.php');

$sql = "SELECT * FROM fasilitas";
$data = mysqli_query($koneksi, $sql);

if (isset($_GET['id_fasilitas'])) {
    $id_fasilitas = $_GET['id_fasilitas'];
    $sql = "DELETE FROM fasilitas WHERE id_fasilitas = $id_fasilitas";
    if (mysqli_query($koneksi, $sql)) {
        echo "<script>window.location.href='fasilitas.php'</script>";
    }
}

?>

<body>
    <div class="h-100 bg-light p-5">
        <div class="bg-white rounded-4 table-responsive-sm p-4 shadow-sm">
            <div class="d-flex justify-content-between p-2">
                <div class="">
                    <a href="fasilitas_tambah.php" class="btn btn-primary fw-bold">Tambah Jurusan <i class="fa-solid fa-plus fw-bold"></i></a>
                </div>
            </div>
            <table class="table table-striped mt-2">
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">NO</th>
                        <th scope="col">JURUSAN</th>
                        <th scope="col">DESKRIPSI</th>
                        <th scope="col">FOTO</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($data)) : ?>
                        <tr>
                            <td scope="row"><?= $i ?></td>
                            <td><?= $row["nama_fasilitas"]; ?></td>
                            <td><?= $row["deskripsi"]; ?></td>
                            <td><img src="<?= $row['foto']; ?>" width="100"></td>
                            <td>
                                <a href="fasilitas_edit.php?id_fasilitas=<?= $row["id_fasilitas"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="?id_fasilitas=<?= $row["id_fasilitas"]; ?>" onclick="return confirm('Data Siswa Yang di Hapus Tidak Bisa Dikembalikan Lagi!!!');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>