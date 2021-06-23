<?php
    $kontak = mysqli_query($conn, "SELECT * FROM kontak");
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pengaturan Kontak</h1>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Alamat</th>
            <th>Telpon</th>
            <th>Jam Buka</th>
            <th>Jam Tutup</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            while ($h = mysqli_fetch_array($kontak)) {
        ?>
        <tr>
            <td><?php echo $h['id']; ?></td>
            <td><?php echo $h['alamat']; ?></td>
            <td><?php echo $h['telpon']; ?></td>
            <td><?php echo $h['jam_kerja_buka']; ?></td>
            <td><?php echo $h['jam_kerja_tutup']; ?></td>
            <td><?php echo $h['email']; ?></td>
            <td>
                <a href="index.php?p=kontak&id_kontak=<?php echo $h['id']; ?>" class="btn btn-sm btn-outline-secondary"><i class='bx bxs-edit'></i> Edit</a>
            </td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>

<?php
    if (isset($_GET['id_kontak'])) {
        $result = mysqli_query($conn, "SELECT * FROM kontak WHERE id='$_GET[id_kontak]'");
        $data = mysqli_fetch_assoc($result);
?>
        <form action="" method="post">
            <h2>Edit Kontak</h2>
            <input type="hidden" name="id" value="<?php echo $_GET['id_kontak']; ?>">
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Telpon</label>
                <input type="telp" class="form-control" name="telpon" value="<?php echo $data['telpon']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Jam Buka</label>
                <input type="time" class="form-control" name="jam_kerja_buka" value="<?php echo $data['jam_kerja_buka']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Jam Tutup</label>
                <input type="time" class="form-control" name="jam_kerja_tutup" value="<?php echo $data['jam_kerja_tutup']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
            <a href="index.php?p=kontak" class="btn btn-danger">Batal</a>
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $a = $_POST['alamat'];                
                $t = $_POST['telpon'];
                $jb = $_POST['jam_kerja_buka'];
                $jt = $_POST['jam_kerja_tutup'];
                $e = $_POST['email'];

                mysqli_query($conn, "UPDATE kontak SET alamat='$a',  telpon='$t', jam_kerja_buka='$jb', jam_kerja_tutup='$jt', email='$e' WHERE id='$id'");
    
                echo "<script>window.location.href = 'index.php?p=kontak';</script>";
            }
        ?>
<?php
    }
?>