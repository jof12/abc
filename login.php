<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>login Cafe</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/log-1.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="">
					<span class="login100-form-title">
						Selamat datang di Cafe RYJF
					</span>

					<div class="wrap-input100 validate-input" data-validate="Username harus di isi">
						<input class="input100" type="text" name="username" placeholder="username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="password harus di isi">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="container-login100-form-btn">
						<button type="reset" name="reset" class="btn btn-danger">
							reset
						</button>
					</div>
					<div class="text-center p-t-136">
						<a class="txt2" href="register.php">
							Buat Akun Anda!
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Eksekusi Form Login -->
	<?php
	if (isset($_POST['submit'])) {
		$user = $_POST['username'];
		$password = $_POST['password'];

		// Query untuk memilih tabel
		$cek_data = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user' AND password = '$password'");
		$hasil = mysqli_fetch_array($cek_data);
		$status = $hasil['status'];
		$login_user = $hasil['username'];
		$row = mysqli_num_rows($cek_data);

		// Pengecekan Kondisi Login Berhasil/Tidak
		if ($row > 0) {
			session_start();
			$_SESSION['login_user'] = $login_user;

			if ($status == 'admin') {
				header('location: admin.php');
			} elseif ($status == 'user') {
				header('location: user.php');
			}
		} else {
			header("location: login.php");
		}
	}
	?>
	</div>
	<!-- Akhir Eksekusi Form Login -->



	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>