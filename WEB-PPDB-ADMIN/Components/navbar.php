<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg bg-primary shadow-sm">
    <div class="container-fluid">
        <div class="text-white fw-bold mt-1 px-2">
            <img src="Assets/maju.png" alt="" class="navbar-brand fw-bold" style="width: 30px;">
            SMKS YPIS MAJU
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white <?= ($currentPage == 'index.php') ? 'active fw-bold' : ''; ?>" aria-current="page" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= ($currentPage == 'guru.php') ? 'active fw-bold' : ''; ?>" href="guru.php">Guru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= ($currentPage == 'siswa.php') ? 'active fw-bold' : ''; ?>" href="siswa.php">Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= ($currentPage == 'pengumuman.php') ? 'active fw-bold' : ''; ?>" href="pengumuman.php">Pengumuman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= ($currentPage == 'fasilitas.php') ? 'active fw-bold' : ''; ?>" href="fasilitas.php">Jurusan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= ($currentPage == 'admin.php') ? 'active fw-bold' : ''; ?>" href="admin.php">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= ($currentPage == 'pendaftar.php') ? 'active fw-bold' : ''; ?>" href="pendaftar.php">Pendaftar</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 bg-white d-flex justify-content-center align-items-center" style="border-radius: 50%;height: 40px;">
                <li class="nav-item dropdown">
                    <a class="nav-link fw-bold" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw fs-5"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item"><?php echo $_SESSION['login_user']; ?></a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#!"><i class="fa-solid fa-gear"></i> Account</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item text-danger" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>