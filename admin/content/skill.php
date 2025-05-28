<?php
include 'config/koneksi.php';
if ($_SESSION['LEVEL'] != 1) {
    echo "<h1> Anda tidak memiliki akses ke halaman ini</h1>";
    echo "<a href= 'dashboard.php' class='btn btn-warning'>Kembali ke Dashboard</a>";
    die;
}
$query = mysqli_query($config, "SELECT * FROM skill
ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $querydelete = mysqli_query($config, "DELETE FROM skill WHERE id='$id'");
    header('location: skill.php?hapus=berhasil');
}

?>
<div class="card-body">
    <div class="table-responsive">
        <div align="right" class="mb-3">
            <a href="?page=tambah-skill">Tambah</a>
        </div>
        <table id="table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>keahlian</th>
                    <th>last Week</th>
                    <th>last month</th>
                    <th>value</th>
                    <th>total</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($row as $key => $data): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['value1'] ?></td>
                        <td><?= $data['value2'] ?></td>
                        <td><?= $data['total'] ?></td>
                        <td></td>

                        <td>
                            <a href="?page=tambah-skill&edit=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                            <a onclick="return confirm('Are You Sure?')" href="skill.php" class="btn btn-warning btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>