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
    <title>Tambah Data Kategori</title>
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
            <a href="userask.php">user asks</a>
            <a href="logout.php" class="login-btn">Log out</a>

        </nav>


        <div id="menu-btn" class="fas fa-bars"></div>

    </section>


    <section>
        <div class="container-profil">
            <header>Tambah Data Kategori</header>


            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form first">
                    <div class="details personal">
                        <span class="title">Add Category</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Masukan Kategori</label>
                                <input type="text" name="nama" placeholder="Nama Kategori"  required>                        
                            </div>
                            <div class="input-file">
                                <label >Masukan Gambar <span class="imp">*</span> <small>(png, jpg, jpeg, gif)</small> </label>
                                <input type="file" id="file" name="gambar"  required>

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




              $filename = $_FILES['gambar']['name'];
              $tmp_name = $_FILES['gambar']['tmp_name'];

              $type1 = explode('.', $filename);
              $type2 = $type1[1];

              $newname = 'kategori'.time().'.'.$type2;

              $tipe_acc = array('jpg', 'jpeg', 'png', 'gif');



              if (!in_array($type2, $tipe_acc)) {
                echo '<script>Swal.fire({

                    position:"center",
                    icon: "error",
                    title: "Oops...",
                    text: "Format tidak diizinkan!",
                })</script>';

            }else{
                move_uploaded_file($tmp_name, './img/'.$newname);

                $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
                 null,
                 '".$nama."',
                 '".$newname."
                 ') ");
                if ($insert) {
                   echo '<script>Swal.fire(
                   "Data berhasil ditambah!",
                   "You clicked the button!",
                   "success"
               )</script>';           
           }else{
               echo 'gagal'.mysqli_error($conn);
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