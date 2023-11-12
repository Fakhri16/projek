<?php
//koneksi ke database
$conn = mysqli_connect('localhost','root','','akun_db');

//cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//menyimpan data dari form ke dalam tabel users
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO tbl_akun (email, password) VALUES ('$email', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Login Berhasil!');
        window.location='index.php';
              </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>