<?php 

session_start();

include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id ='".$_SESSION['id']."' ");
$d = mysqli_fetch_object($query);


?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
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
            <a href="logout.php" class="login-btn">Log out</a>

        </nav>


        <div id="menu-btn" class="fas fa-bars"></div>

    </section>


    <section>
        <div class="container-profil">
            <header>Profil</header>
            

            <form action="" method="POST">
                <div class="form first">
                    <div class="details personal">
                        <span class="title">Personal Details</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Full Name</label>
                                <input type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $d->admin_name ?>" >                        
                            </div>

                            <div class="input-field">
                                <label>Username</label>
                                <input type="text" name="user" placeholder="Username" value="<?php echo $d->username ?>  ">
                            </div>

                            <div class="input-field">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Email" value="<?php echo $d->admin_email ?>" >
                            </div>

                            <div class="input-field">
                                <label>Mobile Number</label>
                                <input type="text" name="hp" placeholder="Nomor HP" value="<?php echo $d->admin_telp ?>" required>
                            </div>

                            <div class="input-field">
                                <label>Alamat</label>
                                <input type="text" name="alamat" placeholder="alamat Lengkap" value="<?php echo $d->admin_address ?>">
                            </div>

                            <div>
                              <input type="submit" name="submit" class="btn" value="Update">
                          </div>
                          
                      </div>
                  </div>
              </div>
          </form>
          <?php
          if (isset($_POST['submit'])) {
              $nama = ucwords($_POST['nama']);
              $user = $_POST['user'];
              $email = $_POST['email'];
              $hp = $_POST['hp'];
              $alamat = ucwords($_POST['alamat']);
              
              $update = mysqli_query($conn, "UPDATE tb_admin SET 
                admin_name = '".$nama."',
                username = '".$user."',
                admin_email = '".$email."',
                admin_telp = '".$hp."',
                admin_address = '".$alamat."'
                WHERE admin_id ='".$d->admin_id."' ");

              if ($update) {
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
    

    <form action="" method="POST">
        <div class="form first">
            <div class="details personal">
                <span class="title">Ubah Password</span>

                <div class="fields">
                    <div class="input-field">
                        <label>Masukan Password Baru</label>
                        <input type="Password" name="pass1" placeholder="Password Baru" required>                        
                    </div>

                    <div class="input-field">
                        <label>Konfirmasi Ulang Passwprd</label>
                        <input type="Password" name="pass2" placeholder="konfirmasi password"  required>
                    </div>


                    <div>
                      <input type="submit" name="ubah_pass" class="btn" value="Ubah Password">
                  </div>
                  
              </div>
          </div>
      </div>
  </form>
  <?php
  if (isset($_POST['ubah_pass'])) {
      
      $pass1 = $_POST['pass1'];
      $pass2 = $_POST['pass2'];
      
      if ($pass2 != $pass1) {
        echo '<script>Swal.fire({
            
            position:"center",
            icon: "error",
            title: "Oops...",
            text: "Password yang dimasukan tidak sesuai",
        })</script>';
    }else{
        $u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
            password = '".MD5($pass1)."'
            WHERE admin_id ='".$d->admin_id."' ");
        if ($u_pass) {
          echo '<script>Swal.fire(
          "Password berhasil diubah!",
          "You clicked the button!",
          "success"

      )</script>';

  }else{
      echo "gagal".mysqli_error($conn);
  }
}

}


?>

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