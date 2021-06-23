<?php
    $pengguna = mysqli_query($conn, "SELECT * FROM login");
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pengaturan Admin Pengguna</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="index.php?p=pengguna&act=add" class="btn btn-sm btn-outline-primary">
            Tambah Pengguna
        </a>
    </div>
</div>

<?php
    if (isset($_GET['id_pengguna'])) {
        if (isset($_GET['act']) == 'delete') {
            mysqli_query($conn, "DELETE FROM login WHERE id='$_GET[id_pengguna]'");
            echo "<script>window.location.href = 'index.php?p=pengguna';</script>";
        } else {
            $result = mysqli_query($conn, "SELECT * FROM login WHERE id='$_GET[id_pengguna]'");
            $data = mysqli_fetch_assoc($result);
?>
        <form action="" method="post">
            <h2>Edit pengguna</h2>
            <input type="hidden" name="id" value="<?php echo $_GET['id_pengguna']; ?>">
            <input type="hidden" name="gmbr_lama" value="<?php echo $data['gambar']; ?>">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" name="password" placeholder="Kosongkan jika tidak diubah...">
            </div>
            <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
            <a href="index.php?p=pengguna" class="btn btn-danger">Batal</a>
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $nama = $_POST['nama'];                
                $username = $_POST['username'];

                if (empty($_POST['password'])) {
                    mysqli_query($conn, "UPDATE login SET nama='$nama', username='$username' WHERE id='$id'");
                } else{
                    $password = md5($_POST['password']);
                    mysqli_query($conn, "UPDATE login SET nama='$nama', username='$username', password='$password' WHERE id='$id'");
                }
                echo "<script>window.location.href = 'index.php?p=pengguna';</script>";
            }
        ?>
<?php
        }
    } elseif (isset($_GET['act']) == 'add') {
?>
        <form action="" method="post">
            <h2>Tambah pengguna</h2>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <input type="submit" class="btn btn-success" value="Tambah" name="submit">
            <a href="index.php?p=pengguna" class="btn btn-danger">Batal</a>
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $nama = $_POST['nama'];                
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                mysqli_query($conn, "INSERT INTO login (nama, username, password) VALUES ('$nama', '$username', '$password')");
    
                echo "<script>window.location.href = 'index.php?p=pengguna';</script>";
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
            <th>Nama</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            while ($t = mysqli_fetch_array($pengguna)) {
        ?>
        <tr>
            <td><?php echo $t['id']; ?></td>
            <td><?php echo $t['nama']; ?></td>
            <td><?php echo $t['username']; ?></td>
            <td>
                <div class="btn-group">
                    <a href="index.php?p=pengguna&id_pengguna=<?php echo $t['id']; ?>" class="btn btn-sm btn-outline-secondary"><i class='bx bxs-edit'></i></a>
                    <a href="index.php?p=pengguna&act=delete&id_pengguna=<?php echo $t['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus <?php echo $t['nama']; ?>');"><i class='bx bxs-trash'></i></a>
                </div>
            </td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>