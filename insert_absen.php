<?php
// memanggil function tgl
include ('function_tanggal.php');
$koneksi = mysqli_connect('localhost','root','','absen_db');

// Memeriksa apakah koneksi berhasil dilakukan atau tidak
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$deskripsi = $_POST['deskripsi'];

// Upload gambar
$allowed = array('png', 'jpg', 'jpeg');
$lokasi_file = $_FILES['foto']['tmp_name'];
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$folder = "img/$filename";

if ($filename == "") {
    echo "Silahkan pilih gambar terlebih dahulu!";
} elseif (!in_array($ext, $allowed)) {
    echo "Format gambar tidak diizinkan!";
} else {
    // Pindahkan gambar ke folder img
    move_uploaded_file($lokasi_file, $folder);

    // Masukkan data ke dalam tabel
    $query = "INSERT INTO tbl_absen (nama, tanggal, deskripsi, foto)
              VALUES ('$nama', '$tanggal', '$deskripsi', '$filename')";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        echo "<script>
        alert('Absens berhasil');
        window.location='tampil_absen.php';
              </script>"; 
    } else {
        echo "<script>
        alert('absen gagal');
        window.location='create_absen.php';
        </script>"; 
    }
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>
