<?php 

include 'db.php';



session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" href="css/register.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="sweetalert2.min.js"></script>
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script src="sweetalert2.min.js"></script>

	<div class="container">
		
		<div class="register-content">
			<form action="" method="POST">
				<img src="img/avatar.svg">
				<h2 class="title">Register</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Nama</h5>
						<input type="text" name="nama"  class="input" required>
					</div>

				</div>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Username</h5>
						<input type="text" class="input" name="username" required>
					</div>
				</div>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>No. Telp</h5>
						<input type="text" class="input" name="telp"  required>
					</div>
				</div>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Email</h5>
						<input type="email" class="input" name="email"  required>
					</div>
				</div>

				<div class="input-div pass">
					<div class="i"> 
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" class="input" name="password" v required>
					</div>
				</div>
				<div class="input-div pass">
					<div class="i"> 
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Confirm Password</h5>
						<input type="password" class="input" name="cpassword"  required>
					</div>
				</div>
				<p>Sudah Punya Akun? <a href="login.php">Login Now</a></p>
				<input type="submit" name="submit" class="btn" value="Registrasi">
			</form>
			<?php 
			
			if (isset($_POST['submit'])) {
				$nama = ucwords($_POST['nama']);
				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = md5($_POST['password']);
				$cpassword = md5($_POST['cpassword']);
				$telp =  $_POST['telp'];

				if ($password == $cpassword) {
					$sql = "SELECT * FROM tb_admin WHERE admin_email='$email'";
					$result = mysqli_query($conn, $sql);
					if (!$result->num_rows > 0) {
						$sql = "INSERT INTO tb_admin (admin_name, username, admin_telp, admin_email, password)
						VALUES ('$nama', '$username','$telp', '$email', '$password')";
						$result = mysqli_query($conn, $sql);
						if ($result) {
							$username = "";
							$email = "";
							$_POST['password'] = "";
							$_POST['cpassword'] = "";
							echo "<script>alert('Selamat, registrasi berhasil!')</script>";
							echo "<script>window.location='login.php'</script>";
						} else {
							echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
						}
					} else {
						echo '<script>Swal.fire({
							position:"center",
							icon: "error",
							title: "Oops...",
							text: "Email sudah terdaftar!",
						})</script>';
					}

				} else {
					echo '<script>Swal.fire({

						position:"center",
						icon: "error",
						title: "Oops...",
						text: "Password Tidak Sesuai",
					})</script>';
				}
			}

			?>
		</div>
		<div class="img">
			<img src="img/bg.svg">
		</div>
	</div>

	<script>
		const inputs = document.querySelectorAll(".input");


		function addcl(){
			let parent = this.parentNode.parentNode;
			parent.classList.add("focus");
		}

		function remcl(){
			let parent = this.parentNode.parentNode;
			if(this.value == ""){
				parent.classList.remove("focus");
			}
		}


		inputs.forEach(input => {
			input.addEventListener("focus", addcl);
			input.addEventListener("blur", remcl);
		});

	</script>
</body>
</html>