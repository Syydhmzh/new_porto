<?php
$query = mysqli_query($config, "SELECT * FROM contacts ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $querydelete = mysqli_query($config, "DELETE FROM contacts WHERE id='$id'");
    header('location: user.php?hapus=berhasil');
}

?>
<div class="card-body">
    <table id="table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>subject</th>
                <th>Pesan</th>
                <th>Balasan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($row as $key => $data): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $data['name'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['subject'] ?></td>
                    <td><?= $data['message'] ?></td>
                    <td><a href="?page=balasan&idpesan=<?php echo $data['id'] ?>" class="btn btn-primary">Balas</a></td>
                    
                    <!-- <td>
                            <a href="tambah-user.php" class="btn btn-success btn-sm">Edit</a>
                            <a onclick="return confirm('Are You Sure?')" href="user.php" class="btn btn-warning btn-sm">Delete</a>
                        </td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>