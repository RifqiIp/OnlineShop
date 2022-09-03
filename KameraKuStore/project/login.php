
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="sweetalert2.min.js"></script>
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
	
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script src="sweetalert2.min.js"></script>


	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<img src="img/avatar.svg">
				<h2 class="title">Login</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Email</h5>
						<input type="email" name="email" class="input" required>
					</div>
				</div>
				<div class="input-div pass">
					<div class="i"> 
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" name="pass" class="input" required>
					</div>
				</div>
				<p>Belum Punya Akun? <a href="register.php">Register Now</a></p>
				<input type="submit" name="submit" class="btn" value="Login">
			</form>
			<?php 
			if(isset($_POST['submit'])){
				session_start();
				include 'db.php';

				$email = mysqli_escape_string($conn, $_POST['email']);
				$pass = mysqli_escape_string($conn, $_POST['pass']);




				$cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_email = '".$email."' AND password = '".MD5($pass)."'");
				if(mysqli_num_rows($cek)
					> 0){
					$d = mysqli_fetch_object($cek);
				$_SESSION['status_login'] = true;
				$_SESSION['a_global'] = $d;
				$_SESSION['id'] = $d->admin_id;
				echo '<script>window.location="dashboard.php"</script>';
			}else{
				echo '<script>Swal.fire({

					position:"center",
					icon: "error",
					title: "Oops...",
					text: "Username or Password is Wrong!",
				})</script>';

			}
		}


		?>
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