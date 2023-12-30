<?php
    include('auth.php');
    include('koneksi.php');

    $sql = "SELECT * FROM guru";
    $data = mysqli_query($koneksi, $sql);

    if (isset($_GET['id_guru'])) {
        $id_guru = $_GET['id_guru'];
        $sql = "DELETE FROM guru WHERE id_guru = $id_guru";
        if(mysqli_query($koneksi, $sql)){
            echo "<script>window.location.href='siswa.php'</script>";
        }   
    }
?>

<body>
    <div class="h-100 bg-light p-5">
        <div class="bg-white rounded-4 table-responsive-sm p-4 shadow-sm">
            <div class="d-flex justify-content-between p-2">
                <div class="">
                    <a href="guru_tambah.php" class="btn btn-primary fw-bold">Tambah Guru <i class="fa-solid fa-plus fw-bold"></i></a>
                </div>
            </div>
            <table class="table table-striped mt-2">
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">NO</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">TANGGAL LAHIR</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">NIK</th>
                        <th scope="col">MAPEL</th>
                        <th scope="col">FOTO</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($data)) : ?>
                        <tr>
                            <td scope="row"><?= $i ?></td>
                            <td><?= $row["nama_guru"]; ?></td>
                            <td><?= $row["tmpt_tgl_lahir"]; ?></td>
                            <td><?= $row["alamat"]; ?></td>
                            <td><?= $row["nik"]; ?></td>
                            <td><?= $row["mapel"]; ?></td>
                            <td><img src="<?= $row['foto']; ?>" width="100"></td>
                            <td>
                                <a href="guru_edit.php?id_guru=<?= $row["id_guru"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="?id_guru=<?= $row["id_guru"]; ?>" onclick="return confirm('Data Siswa Yang di Hapus Tidak Bisa Dikembalikan Lagi!!!');" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
