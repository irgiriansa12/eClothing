<?php
    $home = mysqli_query($conn, "SELECT * FROM home");
    $tentang = mysqli_query($conn, "SELECT * FROM tentang");
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pengaturan Halaman</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <h2>Halaman Home</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Deskripsi 1</th>
                    <th>Deskripsi 2</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while ($h = mysqli_fetch_array($home)) {
                ?>
                <tr>
                    <td><?php echo $h['id']; ?></td>
                    <td><?php echo $h['deskripsi_1']; ?></td>
                    <td><?php echo $h['deskripsi_2']; ?></td>
                    <td>
                        <a href="index.php?p=halaman&id_home=<?php echo $h['id']; ?>" class="btn btn-sm btn-outline-secondary"><i class='bx bxs-edit'></i> Edit</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>

<?php
    if (isset($_GET['id_home'])) {
        $result = mysqli_query($conn, "SELECT * FROM home WHERE id='$_GET[id_home]'");
        $data = mysqli_fetch_assoc($result);
?>
        <form action="" method="post">
            <h2>Edit Deskripsi Home</h2>
            <input type="hidden" name="id" value="<?php echo $_GET['id_home']; ?>">
            <div class="mb-3">
                <label class="form-label">Deskripsi 1</label>
                <input type="" class="form-control" name="deskripsi_1" value="<?php echo $data['deskripsi_1']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi 2</label>
                <input type="" class="form-control" name="deskripsi_2" value="<?php echo $data['deskripsi_2']; ?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
            <a href="index.php?p=halaman" class="btn btn-danger">Batal</a>
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $d1 = $_POST['deskripsi_1'];
                $d2 = $_POST['deskripsi_2'];
                
                mysqli_query($conn, "UPDATE home SET deskripsi_1='$d1', deskripsi_2='$d2' WHERE id='$id'");
    
                echo "<script>window.location.href = 'index.php?p=halaman';</script>";
            }
        ?>
<?php
    }
?>
    </div>


    <div class="col-md-6">
        <h2>Halaman Tentang</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while ($t = mysqli_fetch_array($tentang)) {
                ?>
                <tr>
                    <td><?php echo $t['id']; ?></td>
                    <td><?php echo $t['judul']; ?></td>
                    <td><?php echo $t['deskripsi']; ?></td>
                    <td>
                        <a href="index.php?p=halaman&id_tentang=<?php echo $t['id']; ?>" class="btn btn-sm btn-outline-secondary"><i class='bx bxs-edit'></i> Edit</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        <?php
    if (isset($_GET['id_tentang'])) {
        $result = mysqli_query($conn, "SELECT * FROM tentang WHERE id='$_GET[id_tentang]'");
        $data = mysqli_fetch_assoc($result);
?>
        <form action="" method="post">
            <h2>Edit Deskripsi Tentang</h2>
            <input type="hidden" name="id" value="<?php echo $_GET['id_tentang']; ?>">
            <div class="mb-3">
                <label class="form-label">Judul Header</label>
                <input type="" class="form-control" name="judul" value="<?php echo $data['judul']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="" class="form-control" name="deskripsi" value="<?php echo $data['deskripsi']; ?>">
            </div>
            <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            <a href="index.php?p=halaman" class="btn btn-danger">Batal</a>
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $j = $_POST['judul'];
                $d = $_POST['deskripsi'];
                
                mysqli_query($conn, "UPDATE tentang SET judul='$j', deskripsi='$d' WHERE id='$id'");
    
                echo "<script>window.location.href = 'index.php?p=halaman';</script>";
            }
        ?>
<?php
    }
?>        
    </div>
</div>