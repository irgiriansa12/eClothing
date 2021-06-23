<?php
    $produk = mysqli_query($conn, "SELECT * FROM produk");
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pengaturan Produk</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="index.php?p=produk&act=add" class="btn btn-sm btn-outline-primary">
            Tambah produk
        </a>
    </div>
</div>

<?php
    if (isset($_GET['id_produk'])) {
        if (isset($_GET['act']) == 'delete') {
            mysqli_query($conn, "DELETE FROM produk WHERE id='$_GET[id_produk]'");
            unlink('../assets/images/'.$_GET['gmbr']);
            echo "<script>window.location.href = 'index.php?p=produk';</script>";
        } else {
            $result = mysqli_query($conn, "SELECT * FROM produk WHERE id='$_GET[id_produk]'");
            $data = mysqli_fetch_assoc($result);
?>
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Edit produk</h2>
            <input type="hidden" name="id" value="<?php echo $_GET['id_produk']; ?>">
            <input type="hidden" name="gmbr_lama" value="<?php echo $data['gambar']; ?>">
            <div class="mb-3">
                <label class="form-label">nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">jenis</label>
                <select name="jenis" class="form-select form-control">
                    <option value="<?php echo $data['jenis']; ?>"><?php echo $data['jenis']; ?></option>
                    <option value="men">Men</option>
                    <option value="women">Women</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">harga</label>
                <input type="number" class="form-control" name="harga" value="<?php echo $data['harga']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" class="form-control" name="gambar">
            </div>
            <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
            <a href="index.php?p=produk" class="btn btn-danger">Batal</a>
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $nama = $_POST['nama'];
                $jenis = $_POST['jenis'];                
                $harga = $_POST['harga'];

                if ($_FILES['gambar']['name'] == null) {
                    mysqli_query($conn, "UPDATE produk SET nama='$nama', jenis='$jenis', harga='$harga' WHERE id='$id'");
                } else{
                    // fungsi tambah gambar dan memindah gambar
                    include 'upload_gambar.php';
                    if ($type_file == "image/jpeg" || $type_file == "image/png") {
                        if (move_uploaded_file($tmp_file, $path)) {
                            mysqli_query($conn, "UPDATE produk SET nama='$nama', jenis='$jenis', harga='$harga', gambar='$nama_file' WHERE id='$id'");
                        }
                        unlink('../assets/images/'.$_POST['gmbr_lama']);
                    }
                }
                echo "<script>window.location.href = 'index.php?p=produk';</script>";
            }
        ?>
<?php
        }
    } elseif (isset($_GET['act']) == 'add') {
?>
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Tambah produk</h2>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis</label>
                <select name="jenis" class="form-select form-control">
                    <option value="men">Men</option>
                    <option value="women">Women</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga">
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" class="form-control" name="gambar" required>
            </div>
            <input type="submit" class="btn btn-success" value="Tambah" name="submit">
            <a href="index.php?p=produk" class="btn btn-danger">Batal</a>
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $nama = $_POST['nama'];                
                $jenis = $_POST['jenis'];
                $harga = $_POST['harga'];

                // fungsi tambah gambar dan memindah gambar
                include 'upload_gambar.php';

                if ($type_file == "image/jpeg" || $type_file == "image/png") {
                    if (move_uploaded_file($tmp_file, $path)) {
                        mysqli_query($conn, "INSERT INTO produk (nama, jenis, harga, gambar) VALUES ('$nama', '$jenis', '$harga', '$nama_file')");
                    }
                }
    
                echo "<script>window.location.href = 'index.php?p=produk';</script>";
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
            <th>Jenis</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
            while ($t = mysqli_fetch_array($produk)) {
        ?>
        <tr>
            <td><?php echo $t['id']; ?></td>
            <td><?php echo $t['nama']; ?></td>
            <td><?php echo $t['jenis']; ?></td>
            <td><?php echo $t['harga']; ?></td>
            <td><img src="../assets/images/<?php echo $t['gambar']; ?>" class="img-thumbnail" width="200"></td>
            <td>
                <div class="btn-group">
                    <a href="index.php?p=produk&id_produk=<?php echo $t['id']; ?>" class="btn btn-sm btn-outline-secondary"><i class='bx bxs-edit'></i></a>
                    <a href="index.php?p=produk&act=delete&id_produk=<?php echo $t['id']; ?>&gmbr=<?php echo $t['gambar']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus <?php echo $t['nama']; ?>');"><i class='bx bxs-trash'></i></a>
                </div>
            </td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>