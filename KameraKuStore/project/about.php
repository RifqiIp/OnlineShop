<?php


include 'db.php';

$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");

$a = mysqli_fetch_object($kontak);

?>

<!DOCTYPE html>

<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KameraKu | About</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>


</head>
<body>
	<nav class="navbar">
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

	<div class="banner-about">
	</div>


	<section class="about">
		<div class="info">
			<h3>About Us</h3>
			<p>Depot Kamera berdiri sejak 2010 dan melayani ribuan customer dalam 11 tahun terakhir. Dimulai dari berjualan secara online di sebuah garasi kecil, sejak 2013 sampai sekarang kami sudah berkembang dan memiliki Toko Offline sendiri di bekasi</p>
			<p>Sejak awal berdiri, kami berkomitmen untuk memberikan layanan terbaik kepada customer dalam hal pelayanan, harga dan juga konsultasi seputar fotografi & videografi.
			</p>
			<h4>Alamat</h4>
			<p><?php echo $a->admin_address ?></</p>

			<h4>Email</h4>
			<p><?php echo $a->admin_email ?></p>

			<h4>No. HP</h4>
			<p><?php echo $a->admin_telp ?></</p>
		</div>		
		<div class="content">
			
			<div class="icons-container">
				<div class="icons">
					<i class="fa-solid fa-truck-fast"></i>
					<span>Pengiriman ke Seluruh Indonesia</span>
				</div>
				<div class="icons">
					<i class="fa-solid fa-clock-rotate-left"></i>
					<span>Melayani 24 jam</span>
				</div>
				<div class="icons">
					<i class="fa-solid fa-hand-holding-dollar"></i>
					<span>Garansi Uang Kembali</span>
				</div>
			</div>
		</div>
		
	</section>






	


	


	<footer>
		<div class="footer-bottom">
			<p>Copyright &copy by <span>Rifqi IP</span> , 2022 - Camera | all rights reserved! </p>
		</div>
	</footer>





	<script>
		const body = document.querySelector("body");
		const navbar = document.querySelector(".navbar");
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
			this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
		}



	</script>

</body>
</html>
