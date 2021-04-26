<?php  
session_start();
require 'koneksi.php';
if (isset($_POST["login"])) {
	$username =  mysqli_real_escape_string($koneksi, $_POST["username"]);
	$password =  mysqli_real_escape_string($koneksi, $_POST["password"]);

	$result = mysqli_query($koneksi,"SELECT * FROM login WHERE username = '$username' and password ='$password'");

	$cek = mysqli_num_rows($result);

	if($cek > 0){
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "login";
		header("location:tampilkontak.php");
	}else{
		$error = true;
	}
		
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<center>
	<h1>Silakan Login</h1>
	<?php if(isset($error)) : ?>
		<p style="color: red; font-style: italic;">Username / Password salah</p>
	<?php endif; ?>
	<form method="post" action="">
		<table>
			<tr>
				<td>Username : </td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password : </td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td><button type="submit" name="login">LOGIN</button></td>
			</tr>
		</table>
	</form>
	</center>
</body>
</html>