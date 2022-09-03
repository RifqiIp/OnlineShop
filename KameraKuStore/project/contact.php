<?php


include 'db.php';


?>

<!DOCTYPE html>

<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KameraKu | Contact</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>


</head>
<body>
	<nav class="navbar2">
		<div class="content">
			<div class="logo"><a href="index.php" class="logo">K<i class="fa-solid fa-camera"></i>meraKu</a></div>
			<ul class="menu-list">
				<div class="icon cancel-btn">
					<i class="fas fa-times"></i>
				</div>
				<li><a href="index.php">Home</a></li>
				<li><a href="produk.php">Product</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>

			</ul>
			<div class="icon menu-btn">
				<i class="fas fa-bars"></i>
			</div>
		</div>
	</nav>






	<section>
		<div class="container-profil">
			<header>Contact Us</header>


			<form action="" method="POST" >
				<div class="form first" >
					<div class="details personal">

						<div class="fields">
							<div class="input-field">
								<label>Nama</label>
								<input type="text" name="nama" placeholder="Nama"  required>                        
							</div>
							<div class="input-field">
								<label>email</label>
								<input type="email" name="email" placeholder="Email"  required>                        
							</div>
							<div class="input-field">
								<label>No Hp/Telp</label>
								<input type="text" name="hp" placeholder="No HP"  required>                        
							</div>
							<div class="input-field">
								<label>Ask</label>
								<textarea name="ask" id="" cols="30" rows="10" placeholder="deskripsi"  required></textarea>

							</div>

							<div>
								<input type="submit" name="submit" class="btn" value="Send">
							</div>

						</div>
					</div>
				</div>
			</form>
			<?php
			if (isset($_POST['submit'])) {
				$nama = ucwords($_POST['nama']);
				$email = $_POST['email'];
				$hp = $_POST['hp'];
				$ask = $_POST['ask'];

				$insert = mysqli_query($conn, "INSERT INTO tb_user(user_name, user_email, user_telp, user_ask) VALUES (
					'".$nama." ',
					'".$email." ',
					'".$hp." ',
					'".$ask." '
				) ");

				if ($insert) {
					echo '<script>Swal.fire(
					"Data berhasil diubah!",
					"You clicked the button!",
					"success"

				)</script>';
				echo "<meta http-equiv='refresh' content='0'>";
			}else{
				echo "gagal".mysqli_error($conn);
			}
		}


		?>

	</div>
</section>





<footer>
	<div class="footer-bottom">
		<p>Copyright &copy by <span>Rifqi IP</span> , 2022 - Camera | all rights reserved! </p>
	</div>
</footer>





<script>
	const body = document.querySelector("body");
	const navbar = document.querySelector(".navbar2");
	const menu = document.querySelector(".menu-list");
	const menuBtn = document.querySelector(".menu-btn");
	const cancelBtn = document.querySelector(".cancel-btn");
	menuBtn.onclick = ()=>{
		menu.classList.add("active");
		menuBtn.classList.add("hide");
		cancelBtn.classList.add("show");
		body.classList.add("disabledScroll");
	}
	cancelBtn.onclick = ()=>{
		menu.classList.remove("active");
		menuBtn.classList.remove("hide");
		cancelBtn.classList.remove("show");
		body.classList.remove("disabledScroll");
	}

	window.onscroll = ()=>{
		this.scrollY > 20 ? navbar2.classList.add("sticky") : navbar2.classList.remove("sticky");
	}


</script>

</body>
</html>
