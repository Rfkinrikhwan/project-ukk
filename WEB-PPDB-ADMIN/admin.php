<?php
    include('auth.php');
    include('koneksi.php');

    $sql = "SELECT * FROM admin";
    $data = mysqli_query($koneksi, $sql);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM admin WHERE id = $id";
        if(mysqli_query($koneksi, $sql)){
            echo "<script>window.location.href='admin.php'</script>";
        }   
    }

?>

<body>
    <div class="h-100 bg-light p-5">
        <div class="bg-white rounded-4 table-responsive-sm p-4 shadow-sm">
            <div class="d-flex justify-content-between p-2">
                <div class="">
                    <a href="admin_tambah.php" class="btn btn-primary fw-bold">Tambah Admin <i class="fa-solid fa-plus fw-bold"></i></a>
                </div>
            </div>
            <table class="table table-striped mt-2">
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">NO</th>
                        <th scope="col">NAMA ADMIN</th>
                        <th scope="col">USERNAME</th>
                        <th scope="col">FOTO</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($data)) : ?>
                        <tr>
                            <td scope="row"><?= $i ?></td>
                            <td><?= $row["nama_admin"]; ?></td>
                            <td><?= $row["username"]; ?></td>
                            <td><img src="<?= $row['foto']; ?>" width="100"></td>
                            <td>
                                <a href="admin_edit.php?id=<?= $row["id"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="?id=<?= $row["id"]; ?>" onclick="return confirm('Data Siswa Yang di Hapus Tidak Bisa Dikembalikan Lagi!!!');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
