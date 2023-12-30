<?php
    include('auth.php');
    include('koneksi.php');

    $sql = "SELECT * FROM pendaftaran";
    $data = mysqli_query($koneksi, $sql);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM pendaftaran WHERE id = $id";
        if(mysqli_query($koneksi, $sql)){
            echo "<script>window.location.href='pendaftar.php'</script>";
        }   
    }

?>

<body>
    <div class="p-5">
        <div class="mx-auto rounded-3 shadow-md p-5 bg-primary d-flex justify-content-center align-items-center gap-3" style="box-shadow: 15px 15px 0px -3px rgba(0,0,0,0.1);">
            <img src="Assets/maju.png" alt="" width="80">
            <h1 class="text-center text-white fw-bold">Data Pendaftar SMK YPIS MAJU</h1>
        </div>
    </div>
    <div class="h-100 bg-light p-5">
        <div class="bg-white rounded-4 table-responsive-sm p-4 shadow-sm">
            <table class="table table-striped mt-2">
                
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">NO</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">NIK</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">PILIHAN JURUSAN</th>
                        <th scope="col">ASAL SEKOLAH</th>
                        <th scope="col">ALASAN</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($data)) : ?>
                        <tr>
                            <td scope="row"><?= $i ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["nik"]; ?></td>
                            <td><?= $row["alamat"]; ?></td>
                            <td><?= $row["pilihan_jurusan"]; ?></td>
                            <td><?= $row["asal_sekolah"]; ?></td>
                            <td><?= $row["alasan"]; ?></td>
                            <td>
                                <a href="pendaftar_edit.php?id=<?= $row["id"]; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
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