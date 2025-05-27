<?php
include 'config/koneksi.php';


if (isset($_POST['simpan'])) {
    $profile_name = $_POST['profile_name'];
    $description = $_POST['description'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $filename = uniqid() . "_" . basename($photo);
    $filepath = "uploads/" . $filename;


    // $insertQ = mysqli_query($config, "INSERT INTO profile  (profile_name, description) VALUES ($profile_name', '$description')");

    $queryprofile = mysqli_query($config, "SELECT * FROM profile ORDER BY id DESC");
    if (mysqli_num_rows($queryprofile) > 0) {
        $rowprofile = mysqli_fetch_assoc($queryprofile);
        $id = $rowprofile['id'];


        //jika user upload gambar
        if (!empty($photo)) {
            unlink("uploads/" . $rowprofile['photo']);
            move_uploaded_file($tmp_name, $filepath);

            $update = mysqli_query($config, "UPDATE profile SET profile_name = '$profile_name', description ='$description', photo='$filename' WHERE id = '$id'");
            // header("location:?page=manage-profile&ubah=berhasil");
        } else {
            $update = mysqli_query($config, "UPDATE profile SET profile_name = '$profile_name', description = '$description' WHERE id = '$id'");
            header("location:?page=manage-profile&ubah=berhasil");
        }

        //perintah update

    } else {
        //perintah insert
        if (!empty($photo)) {
            move_uploaded_file($tmp_name, $filepath);
            $insertQ = mysqli_query($config, "INSERT INTO profile  (profile_name, description, photo) VALUES ('$profile_name', '$description', '$filename')");
            header("location:?page=manage-profile&tambah=berhasil");
        } else {
            $insertQ = mysqli_query($config, "INSERT INTO profile  (profile_name, description) VALUES ($profile_name', '$description' )");
            header("location:?page=manage-profile&tambah=berhasil");
        }
    }
}
// if ($insertQ) {
//     header("location:dashboard.php");
// }


$selectProfile = mysqli_query($config, "SELECT * FROM profile");
$row = mysqli_fetch_assoc($selectProfile);


?>




<form action="" method="post"  enctype="multipart/form-data">
    <div class="m-2" style="width: 55%">
        <div class="mb-3">
            <label class="form-label" for="">Judul</label>
            <input value="<?php echo !isset($row['profile_name']) ? '' : $row['profile_name'] ?>" class="form-control" type="text" name="profile_name">
        </div>

        <div class="mb-3">
            <label class="form-label" for="">Description</label>
            <textarea id="summernote" class="form-control" type="text" name="description" cols="30" rows="5"> <?php echo !isset($row['description']) ? '' : $row['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="">Photo</label>
            <input class="form-control" type="file" name="photo">
        </div>
        <img src="uploads/<?php echo $filename ?>" width="150" alt="">
        <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan</button>



    </div>
</form>