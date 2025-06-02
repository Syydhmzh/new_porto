<?php 
$getid = $_GET['idpesan'];
$selectpesan = mysqli_query($config, "SELECT * fROM contacts WHERE id = $getid");
$rowpesan = mysqli_fetch_assoc($selectpesan);
if (isset($_POST['kirim_pesan'])){
$subject = $_POST ['subject'];
$message = $_POST ['message'];
$email = $_POST ['email'];

$headers = "From: sayyidhamzah23@gmail.com\r\n".
"Reply-To: sayyidhamzah23@gmail.com\r\n".
"content-type: text/plain; charset=UTF-81\r\n".
"MIME-Version: 1.0\r\n";
if(mail($email, $subject, $message, $headers)){
header("location:?page=balasan");
exit();
}

}
?>


<div class="m-2">
    <ul>
        <li>
            <div class="row">
                <div class="col-2">Name</div>
                <div class="col-7">: <?php echo $rowpesan ['name'] ?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-2">Email</div>
                <div class="col-7">: <?php echo $rowpesan['email'] ?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-2">Subject</div>
                <div class="col-7">: <?php echo $rowpesan['subject'] ?></div>
            </div>
        </li>


    </ul>
</div>



<form action="" method="POST">
<div class="M-2" style="width: 75%;">
    <label for="" class="form-label">Subject</label>
    <input type="text" class="form-control" name="subject">

    <label for="" class="form-label">Massage</label>
    <input type="text" id="summernote" class="form-control" name="message">


    <button type="submit" name="kirim_pesan" class="btn btn-primary mt-2">Kirim Pesan</button>

</div>


</form>