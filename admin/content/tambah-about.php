<?php
include 'config/koneksi.php';
// if ($_SESSION['LEVEL'] != 1) {
//     echo "<h1> Anda tidak memiliki akses ke halaman ini</h1>";
//     echo "<a href= 'dashboard.php' class='btn btn-warning'>Kembali ke Dashboard</a>";
//     die;
// }


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    // $id_level = $_POST['id_level'];
    $photo = $_FILES['photo']['name'];
    $status = $_POST['status'];

    // .png, jpg, jpeg
    $ekstensi = array('png', 'jpg', 'jpeg');
    //apakah user mengapload gambar dengan ekstensi tersebut, jika iya masukan gambar ke table dan folder, jika tidak
    // error, ekstensi tidak ditemukan
    // in arrray = 
    $ext = pathinfo($photo, PATHINFO_EXTENSION);
    if (!in_array($ext, $ekstensi)) {
        echo "Ekstensi tidak ditemukan";
        die;
    } else {
        $query = mysqli_query($config, "INSERT INTO about (name,  address, date, email, photo, status) VALUES ('$name',  '$address', '$date', '$email', '$photo', '$status')");

        //jika berhasil masukan data ke dalam table user
        if ($query) {
            header("location:?page=about&tambah=berhasil");
        } else {
            echo "Gagal";
        }
    }
}

//masukan data ke dalam table user



$header = isset($_GET['edit']) ? "edit" : "tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : "";
$queryedit = mysqli_query($config, "SELECT * FROM about WHERE id='$id_user'");
$rowedit = mysqli_fetch_assoc($queryedit);


if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $email = $_POST['email'];

    $photo = $_FILES['photo']['name'];
    $status = $_POST['status'];

    $ekstensi = array('png', 'jpg', 'jpeg');
    //apakah user mengapload gambar dengan ekstensi tersebut, jika iya masukan gambar ke table dan folder, jika tidak
    // error, ekstensi tidak ditemukan
    // in arrray = 
    $ext = pathinfo($photo, PATHINFO_EXTENSION);
    if (!in_array($ext, $ekstensi)) {
        echo "Ekstensi tidak ditemukan";
        die;
    } else {
        $query = mysqli_query($config, "INSERT INTO about (name,  address, date, email, photo, status) VALUES ('$name',  '$address', '$date', '$email', '$photo', '$status')");

        //jika berhasil masukan data ke dalam table user
        if ($query) {
            header("location:?page=about&tambah=berhasil");
        } else {
            echo "Gagal";
        }
    }
    //masukan data ke dalam table user
    $queryUpdate = mysqli_query($config, "UPDATE about SET  name='$name', id_level='$id_level,  email='$email', address='$address', date='$date', photo='$photo', status='$status' WHERE id='$id_user'");

    if ($password == "") {
        // Jika password tidak diubah, update tanpa password
        $queryUpdate = mysqli_query($config, "UPDATE about SET id_level='$id_level', name='$name',   email='$email', address='$address', date='$date', photo='$photo', status='$status' WHERE id='$id_user'");
    }

    //jika berhasil masukan data ke dalam table user
    if ($queryUpdate) {
        header("location:?page=about&ubah=berhasil");
    }
}

// if (isset($_POST['edit'])) {
//     $name = $_POST['name'];
//     $date = $_POST['date'];
//     $email = $_POST['email'];
//     $photo = $_FILES['photo']['name'];
//     $status = $_POST['status'];



//     //masukan data ke dalam t able user
//     $queryUpdate = mysqli_query($config, "UPDATE about SET name='$name', date='$date', email='$email', photo='$photo' WHERE id='$id_user'");

//     //jika berhasil masukan data ke dalam table user
//     if ($queryUpdate) {
//         header("location:?page=about&ubah=berhasil");
//     }
// }

?>



<form action="" method="post" enctype="multipart/form-data">
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
            <label for="">Alamat *</label>
        </div>
        <div class="col-sm-10">
            <textarea required type="text" class="form-control" id="alamat" name="address" placeholder="Masukan alamat Anda"><?= isset($_GET['edit']) ? $rowedit['address'] : "" ?></textarea>
        </div>
    </div>


    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Tanggal Lahir *</label>
        </div>
        <div class="col-sm-10">
            <input required type="date" class="form-control" name="date" value="<?= isset($_GET['edit']) ? $rowedit['date'] : "" ?>">
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
            <label for="">foto </label>
        </div>
        <div class="col-sm-10">
            <input type="file" name="photo" placeholder="Masukan Foto Anda">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Status</label>
        </div>
        <div class="col-sm-10">
            <input type="radio" name="status" value="1" checked> Publish
            <input type="radio" name="status" value="0"> Draft
        </div>
    </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary" name="<?= isset($_GET['edit']) ? 'edit' : 'submit'; ?>"><?= $header ?></button>

    </div>
</form>