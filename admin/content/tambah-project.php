<?php
include 'config/koneksi.php';


if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $filename = uniqid() . "_" . basename($photo);
    $filepath = "img/" . $filename;


    // $insertQ = mysqli_query($config, "INSERT INTO profile  (profile_name, description) VALUES ($profile_name', '$description')");

    $queryprofile = mysqli_query($config, "SELECT * FROM image ORDER BY id DESC");
    if (mysqli_num_rows($queryprofile) > 0) {
        $rowprofile = mysqli_fetch_assoc($queryprofile);
        $id = $rowprofile['id'];


        //jika user upload gambar
        if (!empty($photo)) {
            unlink("img/" . $rowprofile['photo']);
            move_uploaded_file($tmp_name, $filepath);

            $update = mysqli_query($config, "UPDATE image SET name='$name', title='$title',  photo='$filename' WHERE id = '$id'");
            // header("location:?page=manage-profile&ubah=berhasil");
        } else {
            $update = mysqli_query($config, "UPDATE image SET name = '$name', title = '$title' WHERE id = '$id'");
            header("location:?page=tambah-project&ubah=berhasil");
        }

        //perintah update

    } else {
        //perintah insert
        if (!empty($photo)) {
            move_uploaded_file($tmp_name, $filepath);
            $insertQ = mysqli_query($config, "INSERT INTO image  (name, title, photo) VALUES ('$name', '$title', '$filename')");
            header("location:?page=tambah-project&tambah=berhasil");
        } else {
            $insertQ = mysqli_query($config, "INSERT INTO image  (name, title) VALUES ($name', '$title' )");
            header("location:?page=tambah-project&tambah=berhasil");
        }
    }
}
// if ($insertQ) {
//     header("location:dashboard.php");
// }


$selectProfile = mysqli_query($config, "SELECT * FROM image");
$row = mysqli_fetch_assoc($selectProfile);


?>




<form action="" method="post" enctype="multipart/form-data">
    <div class="m-2" style="width: 55%">
        <div class="mb-3">
            <label class="form-label" for="">Judul</label>
            <input value="<?php echo !isset($row['title']) ? '' : $row['title'] ?>" class="form-control" type="text" name="title">
        </div>

        <div class="mb-3">
            <label class="form-label" for="">Nama</label>
            <textarea id="summernote" class="form-control" type="text" name="name" cols="30" rows="5"> <?php echo !isset($row['name']) ? '' : $row['name'] ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Photo</label>
            <input class="form-control" type="file" name="photo">
        </div>
        <img src="uploads/<?php echo $filename ?>" width="150" alt="">
        <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan</button>



    </div>
</form>