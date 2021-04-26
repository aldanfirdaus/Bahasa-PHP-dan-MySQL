<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?pesan=belum_login");
	}
 ?>
<br>
<a href="tambahkontak.php">Tambah Data Kontak</a> <br><br>
<a href="logout.php">Logout</a>
<center>
<h2>List Kontak</h2>
<table border="1" cellspacing="0" cellpadding="10">
	<tr>
		<th>NO</th>
		<th>NAMA</th>
		<th>JENIS KELAMIN</th>
		<th>EMAIL</th>
		<th>ALAMAT</th>
		<th>KOTA</th>
		<th>PESAN</th>
	</tr>
	<?php 
	include 'koneksi.php';
	$kontak = mysqli_query($koneksi, "SELECT * from kontak");
	$no=1;
	foreach ($kontak as $row) {
		echo "<tr>
				<td>$no</td>
				<td>".$row['Nama']."</td>
				<td>".$row['jkel']."</td>
				<td>".$row['Email']."</td>
				<td>".$row['Alamat']."</td>
				<td>".$row['Kota']."</td>
				<td>".$row['Pesan']."</td>
			</tr>";
		$no++;
	}
	
	 ?>
</table>
</center>