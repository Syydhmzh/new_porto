<?php
include 'config/koneksi.php';
if ($_SESSION['LEVEL'] != 1) {
    echo "<h1> Anda tidak memiliki akses ke halaman ini</h1>";
    echo "<a href= 'dashboard.php' class='btn btn-warning'>Kembali ke Dashboard</a>";
    die;
}


if (isset($_POST['simpan'])) {
    // $name = $_POST['name'];
    $email = $_POST['email'];
    $id_level = $_POST['id_level']; // Default to level 2 if not set
    $password = sha1($_POST['password']);

    //masukan data ke dalam table user
    $query = mysqli_query($config, "INSERT INTO users (name, email, password, id_level) VALUES ('$name', '$email', '$password', '$id_level')");

    //jika berhasil masukan data ke dalam table user
    // if ($query) {
    //     header('location:tambah-user.php?tambah=berhasil');
    // } else {
    //     echo "Gagal";
    // }
}


$header = isset($_GET['edit']) ? "edit" : "tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : "";
$queryedit = mysqli_query($config, "SELECT * FROM users WHERE id='$id_user'");
$rowedit = mysqli_fetch_assoc($queryedit);


if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id_level = $_POST['id_level'];
    $password = sha1($_POST['password']);

    //masukan data ke dalam table user
    $queryUpdate = mysqli_query($config, "UPDATE users SET id_level='$id_level' name='$name', email='$email', password='$password' WHERE id='$id_user'");

    if ($password == "") {
        // Jika password tidak diubah, update tanpa password
        $queryUpdate = mysqli_query($config, "UPDATE users SET id_level='$id_level', name='$name', email='$email' WHERE id='$id_user'");
    }

    //jika berhasil masukan data ke dalam table user
    if ($queryUpdate) {
        header("location:user.php?ubah=berhasil");
    }
}

$queryLevel = mysqli_query($config, "SELECT * FROM level ORDER BY id DESC");
$rowLevel = mysqli_fetch_all($queryLevel, MYSQLI_ASSOC);

?>



<form action="" method="post">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama Level *</label>
        </div>
        <div class="col-sm-10">
            <select name="id_level" class="form-control" id="">
                <option value="">Pilih Salah Satu</option>
                <!-- data option diambil dari table level -->
                <?php foreach ($rowLevel as $level) : ?>
                    <option value="<?php echo $level['id'] ?>"><?php echo $level['level'] ?></option>
                <?php endforeach; ?>
                <!-- endoption -->
            </select>
            <!-- <input required type="text" class="form-control" id="nama" name="name" placeholder="Masukan Nama Anda" value="<?= isset($_GET['edit']) ? $rowedit['name'] : "" ?>"> -->
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama *</label>
        </div>
        <div class="col-sm-10">
            <input required type="text" class="form-control" id="nama" name="name" placeholder="Masukan Nama Anda" value="<?= isset($_GET['edit']) ? $rowedit['name'] : "" ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Email *</label>
        </div>
        <div class="col-sm-10">
            <input required type="email" class="form-control" id="email" name="email" placeholder="Masukan Email Anda" value="<?= isset($_GET['edit']) ? $rowedit['email'] : "" ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Password *</label>
        </div>
        <div class="col-sm-10">
            <input required type="password" class="form-control" id="password" name="password" placeholder="Masukan Password Anda">
        </div>
    </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary" name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>"><?= $header ?></button>
    </div>
</form>