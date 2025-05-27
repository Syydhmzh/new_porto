<?php
include 'config/koneksi.php';
if ($_SESSION['LEVEL'] != 1) {
    echo "<h1> Anda tidak memiliki akses ke halaman ini</h1>";
    echo "<a href= 'dashboard.php' class='btn btn-warning'>Kembali ke Dashboard</a>";
    die;
}
$query = mysqli_query($config, "SELECT level.level, users.* FROM users
LEFT JOIN level ON level.id = users.id_level
ORDER BY users.id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $querydelete = mysqli_query($config, "DELETE FROM users WHERE id='$id'");
    header('location:user.php?hapus=berhasil');
}

?>
<div class="card-body">
    <div class="table-responsive">
        <div align="right" class="mb-3">
            <a href="?page=tambah-user">Tambah</a>
        </div>
        <table id="table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Level</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($row as $key => $data): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $data['level'] ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td>
                            <a href="?page=tambah-user&edit=<?php echo $data['id']?>" class="btn btn-success btn-sm">Edit</a>
                            <a onclick="return confirm('Are You Sure?')" href="user.php" class="btn btn-warning btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>