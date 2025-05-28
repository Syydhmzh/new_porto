<?php
include 'config/koneksi.php';
if ($_SESSION['LEVEL'] != 1) {
    echo "<h1> Anda tidak memiliki akses ke halaman ini</h1>";
    echo "<a href= 'dashboard.php' class='btn btn-warning'>Kembali ke Dashboard</a>";
    die;
}


if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    //masukan data ke dalam table user
    $query = mysqli_query($config, "INSERT INTO service (name, description) VALUES ('$name', '$description')");
    if($query){
        header("location:?page=service&tambah=berhasil");
    }
    

    //jika berhasil masukan data ke dalam table user
    // if ($query) {
    //     header('location:tambah-user.php?tambah=berhasil');
    // } else {
    //     echo "Gagal";
    // }
}


$header = isset($_GET['edit']) ? "edit" : "tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : "";
$queryedit = mysqli_query($config, "SELECT * FROM service WHERE id='$id_user'");
$rowedit = mysqli_fetch_assoc($queryedit);


if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    //masukan data ke dalam table user
    $queryUpdate = mysqli_query($config, "UPDATE service SET name='$name', description='$description' WHERE id='$id_user'");
    if($queryUpdate){
    header("location:?page=service&ubah=berhasil");
    }


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
            <input required type="text" class="form-control" name="name" placeholder="Masukan Nama Anda" value="<?= isset($_GET['edit']) ? $rowedit['name'] : "" ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Deskripsi *</label>
        </div>
        <div class="col-sm-10">
            <input required type="text" class="form-control" name="description" placeholder="" value="<?= isset($_GET['edit']) ? $rowedit['description'] : "" ?>">
        </div>
    </div>
    
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary" name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>"><?= $header ?></button>
    </div>
</form>