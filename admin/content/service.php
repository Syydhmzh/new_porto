<?php
include 'config/koneksi.php';
if ($_SESSION['LEVEL'] != 1) {
    echo "<h1> Anda tidak memiliki akses ke halaman ini</h1>";
    echo "<a href= 'dashboard.php' class='btn btn-warning'>Kembali ke Dashboard</a>";
    die;
}
$query = mysqli_query($config, "SELECT * FROM service
ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $querydelete = mysqli_query($config, "DELETE FROM service WHERE id='$id'");
    header('location: service.php?hapus=berhasil');
}

?>
<div class="card-body">
    <div class="table-responsive">
        <div align="right" class="mb-3">
            <a href="?page=tambah-service">Tambah</a>
        </div>
        <table id="table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>keahlian</th>
                    <th>Deskripsi</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($row as $key => $data): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['description'] ?></td>


                        <td>
                            <a href="?page=tambah-service&edit=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a onclick="return confirm('Are You Sure?')" href="service.php" class="btn btn-warning btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>