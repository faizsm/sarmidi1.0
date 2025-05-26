<?php
include 'db.php';

$nama = $_POST['nama'];
$telepon = $_POST['telepon'];
$tingkat = $_POST['tingkat'];
$mata = $_POST['mataPelajaran'];
$alamat = $_POST['alamat'];

$sql = "INSERT INTO pendaftar (nama, telepon, tingkat, mata_pelajaran, alamat)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nama, $telepon, $tingkat, $mata, $alamat);

if ($stmt->execute()) {
    echo "<script>alert('Pendaftaran berhasil!'); window.location.href='index.php';</script>";
} else {
    echo "Gagal menyimpan: " . $conn->error;
}
?>
