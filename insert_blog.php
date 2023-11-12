<?php 
// memanggil function tgl
include ('function_tanggal.php');

$koneksi = mysqli_connect('localhost','root','','asset_db');

$nama_tipe = $_POST['nama_tipe'];
$brand = $_POST['brand'];
$detail_tipe = $_POST['detail_tipe'];
$nomor_serial = $_POST['nomor_serial'];
// $pengirim = $_POST['pengirim'];
// $penerima = $_POST['penerima'];
// $posisi = $_POST['posisi'];
$tgl_beli = $_POST['tgl_beli'];  
// mengkonversi ke database
// $tanggalBeli = inpttgl($tgl_beli);
// $lokasi = $_POST['lokasi'];
$kondisi = $_POST['kondisi'];
$User = $_POST['User'];
$deskripsi = $_POST['deskripsi'];

// validasi serial
$query = "SELECT nomor_serial FROM tbl_barang WHERE nomor_serial='$nomor_serial' ";
$ada = mysqli_query($koneksi, $query);

if (mysqli_num_rows($ada) > 0) {
    echo "<script>
        alert('Error! Nomor Serial sudah terdaftar!');
        history.go(-1);
        </script>";
} else {
$query = "INSERT INTO tbl_barang(nama_tipe, brand, detail_tipe, nomor_serial, tgl_beli, kondisi, User, deskripsi) 
            VALUES ('$nama_tipe','$brand','$detail_tipe','$nomor_serial','$tgl_beli', '$kondisi','$User','$deskripsi')";

mysqli_query($koneksi, $query);
echo "<script>
        alert('Data sudah di tambahkan');
        window.location='halaman.php';
    </script>"; 
}