<?php
include 'db.php';

if (!isset($_GET['id'])) {
  header("Location: dashboard.php");
  exit();
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM pendaftar WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
  echo "Data tidak ditemukan.";
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = $_POST['nama'];
  $telepon = $_POST['telepon'];
  $tingkat = $_POST['tingkat'];
  $mata = $_POST['mataPelajaran'];
  $alamat = $_POST['alamat'];

  $stmt = $conn->prepare("UPDATE pendaftar SET nama=?, telepon=?, tingkat=?, mata_pelajaran=?, alamat=? WHERE id=?");
  $stmt->bind_param("sssssi", $nama, $telepon, $tingkat, $mata, $alamat, $id);
  $stmt->execute();

  header("Location: dashboard.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h3>Edit Data Pendaftar</h3>
  <form method="POST">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Telepon</label>
      <input type="text" name="telepon" value="<?= htmlspecialchars($data['telepon']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Tingkat</label>
      <select name="tingkat" class="form-select" required>
        <option value="TK" <?= $data['tingkat'] == 'TK' ? 'selected' : '' ?>>TK</option>
        <option value="SD" <?= $data['tingkat'] == 'SD' ? 'selected' : '' ?>>SD</option>
        <option value="SMP" <?= $data['tingkat'] == 'SMP' ? 'selected' : '' ?>>SMP</option>
      </select>
    </div>
   <div class="mb-3">
  <label>Program Bimbel AHE Mitra Asik Asik He</label>
  <select name="mataPelajaran" class="form-select" required>
    <option value="Baca Tulis" <?= $data['mata_pelajaran'] == 'bacatulis' ? 'selected' : '' ?>>Les Baca Dan Tulis</option>
    <option value="Menghitung" <?= $data['mata_pelajaran'] == 'hitung' ? 'selected' : '' ?>>Les Hitung</option>
    <option value="Bahasa Inggris" <?= $data['mata_pelajaran'] == 'inggris' ? 'selected' : '' ?>>Les Bahasa Inggris</option>
    <option value="Mengaji" <?= $data['mata_pelajaran'] == 'mengaji' ? 'selected' : '' ?>>Les Mengaji</option>
    <option value="Mata pelajaran Mulai dari 3 SD" <?= $data['mata_pelajaran'] == 'matpel mulai 3 sd' ? 'selected' : '' ?>>Les Mata Pelajaran Mulai Kelas 3 SD</option>
    <option value="Matematika" <?= $data['mata_pelajaran'] == 'matematika' ? 'selected' : '' ?>>Les Matematika</option>
  </select>
</div>

    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control" rows="3" required><?= htmlspecialchars($data['alamat']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="dashboard.php" class="btn btn-secondary">Batal</a>
  </form>
</div>
</body>
</html>
