<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'absen_db');
$id = $_GET['id'];

$query = "DELETE FROM tbl_absen WHERE id = $id";
$hapus = mysqli_query($koneksi, $query);

if($hapus){
  echo "<script>
          alert('Data berhasil dihapus!');
          window.location='tampil_absen.php';
        </script>";
} else{
  echo "<script>
          alert('Data gagal dihapus!');
          window.location='tampil_absen.php';
        </script>";
}
?>