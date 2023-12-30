<?php
    include('auth.php');
    include('koneksi.php');

    $sql = "SELECT * FROM pengumuman";
    $data = mysqli_query($koneksi, $sql);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM pengumuman WHERE id = $id";
        if(mysqli_query($koneksi, $sql)){
            echo "<script>window.location.href='pengumuman.php'</script>";
        }   
    }

?>

<body>
    <div class="h-100 bg-light p-5">
        <div class="bg-white rounded-4 table-responsive-sm p-4 shadow-sm">
            <div class="d-flex justify-content-between p-2">
                <div class="">
                    <a href="pengumuman_tambah.php" class="btn btn-primary fw-bold">Tambah Pengumuman <i class="fa-solid fa-plus fw-bold"></i></a>
                </div>
            </div>
            <table class="table table-striped mt-2">
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">NO</th>
                        <th scope="col">TANGGAL</th>
                        <th scope="col">DESKRIPSI</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($data)) : ?>
                        <tr>
                            <td scope="row"><?= $i ?></td>
                            <td><?= $row["tanggal"]; ?></td>
                            <td><?= $row["deskripsi"]; ?></td>
                            <td>
                                <a href="pengumuman_edit.php?id=<?= $row["id"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="?id=<?= $row["id"]; ?>" onclick="return confirm('Data pengumuman Yang di Hapus Tidak Bisa Dikembalikan Lagi!!!');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
