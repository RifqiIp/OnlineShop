<?php 

session_start();

include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}




?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ask</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
</head>
<body>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="sweetalert2.min.js"></script>
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
    	<div class="container-profil">
            <header>User Detail</header>
            

            <form action="" >
                <div class="form first" >
                    <div class="details personal">
                        <?php 

                        $no = 1;
                        $user = mysqli_query($conn, "SELECT * FROM tb_user ORDER BY user_id DESC");
                        if (mysqli_num_rows($user) > 0){ 
                            $row = mysqli_fetch_array($user);
                        }

                        ?>
                        <div class="fields">
                            <div class="input-field">
                                <label>Nama</label>
                                <input type="text" name="nama" placeholder="Nama" value="<?php echo $row['user_name'] ?>" readonly>                        
                            </div>
                            <div class="input-field">
                                <label>email</label>
                                <input type="email" name="email" placeholder="Email" value="<?php echo $row['user_email'] ?>" readonly>                        
                            </div>
                            <div class="input-field">
                                <label>No Hp/Telp</label>
                                <input type="text" name="hp" placeholder="No HP"  value="<?php echo $row['user_telp'] ?>" readonly>                        
                            </div>
                            <div class="input-field">
                                <label>Ask</label>
                                <textarea name="ask" id="" cols="30" rows="10" placeholder="<?php echo $row['user_ask'] ?>"  readonly></textarea>
                                
                            </div>

                            <div class="back">
                              <button class="btn"><a href="userask.php">Back</a></button>
                          </div>
                          
                      </div>
                  </div>
              </div>
          </form>
          
          
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