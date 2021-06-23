<?php
    $tim = mysqli_query($conn, "SELECT * FROM tim");
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pengaturan Tim</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="index.php?p=tim&act=add" class="btn btn-sm btn-outline-primary">
            Tambah Tim
        </a>
    </div>
</div>

<?php
    if (isset($_GET['id_tim'])) {
        if (isset($_GET['act']) == 'delete') {
            mysqli_query($conn, "DELETE FROM tim WHERE id='$_GET[id_tim]'");
            unlink('../assets/images/'.$_GET['gmbr']);
            echo "<script>window.location.href = 'index.php?p=tim';</script>";
        } else {
            $result = mysqli_query($conn, "SELECT * FROM tim WHERE id='$_GET[id_tim]'");
            $data = mysqli_fetch_assoc($result);
?>
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Edit Tim</h2>
            <input type="hidden" name="id" value="<?php echo $_GET['id_tim']; ?>">
            <input type="hidden" name="gmbr_lama" value="<?php echo $data['gambar']; ?>">
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim" value="<?php echo $data['nim']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="telp" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Tugas</label>
                <input type="text" class="form-control" name="tugas" value="<?php echo $data['tugas']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" class="form-control" name="gambar">
            </div>
            <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
            <a href="index.php?p=tim" class="btn btn-danger">Batal</a>
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];                
                $tugas = $_POST['tugas'];

                if ($_FILES['gambar']['name'] == null) {
                    mysqli_query($conn, "UPDATE tim SET nim='$nim', nama='$nama', tugas='$tugas' WHERE id='$id'");
                } else{
                    // fungsi tambah gambar dan memindah gambar
                    include 'upload_gambar.php';
                    if ($type_file == "image/jpeg" || $type_file == "image/png") {
                        if (move_uploaded_file($tmp_file, $path)) {
                            mysqli_query($conn, "UPDATE tim SET nim='$nim', nama='$nama', tugas='$tugas', gambar='$nama_file' WHERE id='$id'");
                        }
                        unlink('../assets/images/'.$_POST['gmbr_lama']);
                    }
                }
                echo "<script>window.location.href = 'index.php?p=tim';</script>";
            }
        ?>
<?php
        }
    } elseif (isset($_GET['act']) == 'add') {
?>
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Tambah Tim</h2>
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="telp" class="form-control" name="nama">
            </div>
            <div class="mb-3">
                <label class="form-label">Tugas</label>
                <input type="text" class="form-control" name="tugas">
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" class="form-control" name="gambar" required>
            </div>
            <input type="submit" class="btn btn-success" value="Tambah" name="submit">
            <a href="index.php?p=tim" class="btn btn-danger">Batal</a>
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];                
                $tugas = $_POST['tugas'];

                // fungsi tambah gambar dan memindah gambar
                include 'upload_gambar.php';

                if ($type_file == "image/jpeg" || $type_file == "image/png") {
                    if (move_uploaded_file($tmp_file, $path)) {
                        mysqli_query($conn, "INSERT INTO tim (nim, nama, tugas, gambar) VALUES ('$nim', '$nama', '$tugas', '$nama_file')");
                    }
                }
    
                echo "<script>window.location.href = 'index.php?p=tim';</script>";
            }
        ?>
<?php
    }
?>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tugas</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            while ($t = mysqli_fetch_array($tim)) {
        ?>
        <tr>
            <td><?php echo $t['id']; ?></td>
            <td><?php echo $t['nim']; ?></td>
            <td><?php echo $t['nama']; ?></td>
            <td><?php echo $t['tugas']; ?></td>
            <td><img src="../assets/images/<?php echo $t['gambar']; ?>" class="img-thumbnail" width="200"></td>
            <td>
                <div class="btn-group">
                    <a href="index.php?p=tim&id_tim=<?php echo $t['id']; ?>" class="btn btn-sm btn-outline-secondary"><i class='bx bxs-edit'></i></a>
                    <a href="index.php?p=tim&act=delete&id_tim=<?php echo $t['id']; ?>&gmbr=<?php echo $t['gambar']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus <?php echo $t['nama']; ?>');"><i class='bx bxs-trash'></i></a>
                </div>
            </td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>