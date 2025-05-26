<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit();
}
include 'db.php';
$data = $conn->query("SELECT * FROM pendaftar ORDER BY tanggal_daftar DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <div class="d-flex justify-content-between mb-4">
      <h2>Dashboard Admin</h2>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
   <!-- Tambah kolom aksi di tabel -->
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Telepon</th>
      <th>Tingkat</th>
      <th>Program Bimbel</th>
      <th>Alamat</th>
      <th>Tanggal Daftar</th>
      <th>Aksi</th> <!-- kolom baru -->
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $data->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($row['nama']) ?></td>
      <td><?= htmlspecialchars($row['telepon']) ?></td>
      <td><?= htmlspecialchars($row['tingkat']) ?></td>
      <td><?= htmlspecialchars($row['mata_pelajaran']) ?></td>
      <td><?= htmlspecialchars($row['alamat']) ?></td>
      <td><?= $row['tanggal_daftar'] ?></td>
      <td>
        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
        <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
           onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

  </div>
</body>
</html>
