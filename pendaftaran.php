<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Form Pendaftaran Les</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body, html {
      height: 100%;
    }
    .form-wrapper {
      height: calc(100vh - 56px); /* dikurangi tinggi navbar */
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Les AHE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Kembali ke Beranda</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Form di tengah -->
<div class="d-flex justify-content-center align-items-center form-wrapper bg-light">
  <div class="card shadow p-4" style="width: 100%; max-width: 480px;">
    <h3 class="mb-4 text-center">Form Pendaftaran Les Privat</h3>
    <form action="simpan.php" method="POST">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" class="form-control" required />
      </div>
      <div class="mb-3">
        <label for="telepon" class="form-label">Nomor Telepon</label>
        <input type="tel" id="telepon" name="telepon" class="form-control" required />
      </div>
      <div class="mb-3">
        <label for="tingkat" class="form-label">Tingkat Pendidikan</label>
        <select id="tingkat" name="tingkat" class="form-select" required>
          <option value="">-- Pilih Tingkat --</option>
          <option value="TK">TK</option>
          <option value="SD">SD</option>
          <option value="SMP">SMP</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="mataPelajaran" class="form-label">Program Bimbel AHE Mitra Asik Asik He</label>
        <select id="mataPelajaran" name="mataPelajaran" class="form-select" required>
            <option value="">-- Pilih Program --</option>
            <option value="Baca Tulis">Les Baca Dan Tulis</option>
            <option value="Menghitung">Les Hitung</option>
            <option value="Bahasa Inggris">Les Bahasa Inggris</option>
            <option value="Mengaji">Les Mengaji</option>
            <option value="Mata pelajaran Mulai dari 3 SD">Les Mata Pelajaran Mulai Kelas 3 SD</option>
            <option value="Matematika">Les Matematika</option>
            </select>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea id="alamat" name="alamat" class="form-control" rows="3" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
