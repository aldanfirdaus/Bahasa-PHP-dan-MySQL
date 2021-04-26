<?php
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
include 'koneksi.php';
//mengecek tombol submit diklik dan menyimpan data kedalam variabel
if(isset($_POST["submit"])){
	$nama = $_POST['nama'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$kota = $_POST['kota'];
	$pesan = $_POST['pesan'];
	//query SQL untuk insert data
	$query = "INSERT INTO kontak VALUES ('','$nama','$jenis_kelamin','$email','$alamat','$kota','$pesan')";
	mysqli_query($koneksi, $query);

	if(mysqli_affected_rows($koneksi) >0){ //melakukan kondisi jika ada baris yang terpengaruh 
        echo "<script>
        alert('data berhasil ditambah');
        document.location.href='tampilkontak.php';
        </script>";
    }else{ 
        echo "
		<script>
				alert('data gagal ditambah');
				document.location.href='tampilkontak.php';
		</script>
		";
    }
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Kontak</title>
</head>
<body>
	<center>
	<h2>Tambah Kontak</h2>
	<form method="post" action="">
		<table>
			<tr>
				<td>Nama : </td>
				<td><input type="text" name="nama" required=""></td>
			</tr>
			<tr>
				<td>Jenis Kelamin : </td>
				<td>
					<input type="radio" name="jenis_kelamin" value="L" required="">Laki Laki
					<input type="radio" name="jenis_kelamin" value="P" required="">Perempuan
				</td>
			</tr>
			<tr>
				<td>Email : </td>
				<td><input type="text" name="email" required=""></td>
			</tr>
			<tr>
				<td>Alamat : </td>
				<td><input type="text" name="alamat" required=""></td>
			</tr>
			<tr>
				<td>Kota : </td>
				<td><input type="text" name="kota" required=""></td>
			</tr>
			<tr>
				<td>Pesan : </td>
				<td><textarea name="pesan" style="resize:none;width:300px;height:100px;" required=""></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="submit" value="simpan">SIMPAN</button></td>
			</tr>
		</table>
	</form>
	</center>
</body>
</html>