<?php
include 'config/koneksi.php';
if ($_SESSION['LEVEL'] != 1) {
    echo "<h1> Anda tidak memiliki akses ke halaman ini</h1>";
    echo "<a href= 'dashboard.php' class='btn btn-warning'>Kembali ke Dashboard</a>";
    die;
}


if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $value1 = $_POST['value1'];
    $value2 = $_POST['value2'];
    $total = $value1 + $value2;
    //masukan data ke dalam table user
    $query = mysqli_query($config, "INSERT INTO skill (name, value1, value2, total) VALUES ('$name', '$value1', '$value2', '$total')");
    header("location?page=skill&tambah=berhasil");

    //jika berhasil masukan data ke dalam table user
    // if ($query) {
    //     header('location:tambah-user.php?tambah=berhasil');
    // } else {
    //     echo "Gagal";
    // }
}


$header = isset($_GET['edit']) ? "edit" : "tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : "";
$queryedit = mysqli_query($config, "SELECT * FROM skill WHERE id='$id_user'");
$rowedit = mysqli_fetch_assoc($queryedit);


if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $value1 = $_POST['value1'];
    $value2 = $_POST['value2'];
    $totalBaru = $value1 + $value2;
    $total = $totalBaru;
    //masukan data ke dalam table user
    $queryUpdate = mysqli_query($config, "UPDATE skill SET name='$name', value1='$value1', value2='$value2', total='$total' WHERE id='$id_user'");
    header("location?page=skill&ubah=berhasil");


    // Jika password tidak diubah, update tanpa password
    //  $queryUpdate = mysqli_query($config, "UPDATE skill SET name='$name', value1='$value1', value2='$value2', total='$total' WHERE id='$id_user");
    //     }

    //jika berhasil masukan data ke dalam table user

}

$queryLevel = mysqli_query($config, "SELECT * FROM level ORDER BY id DESC");
$rowLevel = mysqli_fetch_all($queryLevel, MYSQLI_ASSOC);


// $query = mysqli_query($config, "SELECT level.level, users.* FROM users
// LEFT JOIN level ON level.id = users.id_level
// ORDER BY users.id DESC");
// $row = mysqli_fetch_all($query, MYSQLI_ASSOC);

// $joinRole = mysqli_query($config, "SELECT level.level, users.* FROM users LEFT JOIN level ON level.id=users.id_level WHERE id='$id_user'");
// $rowJoinRole = mysqli_fetch_assoc($joinRole);
?>



<form action="" method="post">
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
            <label for="">last Week *</label>
        </div>
        <div class="col-sm-10">
            <input required type="number" class="form-control" id="email" name="value1" placeholder="" value="<?= isset($_GET['edit']) ? $rowedit['value1'] : "" ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">last month *</label>
        </div>
        <div class="col-sm-10">
            <input required type="number" class="form-control" id="email" name="value2" placeholder="" value="<?= isset($_GET['edit']) ? $rowedit['value2'] : "" ?>">
        </div>
    </div>

    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary" name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>"><?= $header ?></button>
    </div>
</form>