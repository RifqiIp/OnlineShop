<?php 

session_start();
if ($_SESSION['status_login'] != true) {
  echo '<script>window.location="login.php"</script>';
}


?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
</head>
<body>
  <section class="header">
    <a href="dashboard.php" class="logo">K<i class="fa-solid fa-camera"></i>meraKu</a>
    
    <nav class="navbar">
      <a href="dashboard.php" >Dashboard</a>
      <a href="profil.php">Profil</a>
      <a href="data_kategori.php">Data Kategori</a>
      <a href="data_produk.php">Data Produk</a>
      <a href="userask.php">user asks</a>
      <a href="logout.php" class="login-btn">Log out</a>

    </nav>


    <div id="menu-btn" class="fas fa-bars"></div>

  </section>

  <section>
    <div class="container">
      <h1>Dashboard</h1>
      <div class="box">
        <h2>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?></h2>
      </div>
    </div>
  </section>

  <script src="js/script.js"></script>


  <section class="footer">
    <div>
      <div class="credit">Copyright &copy by Rifqi IP, 2022 - Camera | all rights reserved! </div>
    </div>
  </section>

</body>
</html>