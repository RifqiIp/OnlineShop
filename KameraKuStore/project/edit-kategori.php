<?php 

session_start();

include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."'");
if (mysqli_num_rows($kategori) == 0) {
 header('Location: data_kategori.php');
}
$k = mysqli_fetch_object($kategori);


?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Produk</title>
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
            <header>Edit Data Kategori</header>


            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form first">
                    <div class="details personal">
                        <span class="title">Edit Form</span>

                        <div class="fields">
                            <div class="input-file">
                                <label >Masukan Gambar <span class="imp">*</span> <small>(png, jpg, jpeg, gif)</small> </label>
                                <img  src="img/<?php echo $k->category_image ?> ">
                                <input type="hidden" name="foto" value="<?php echo $k->category_image ?>">
                                <input type="file" id="file" name="gambar"   >


                            </div>
                            <div class="input-field">
                                <label>Masukan Kategori</label>
                                <input type="text" name="nama"  value="<?php echo $k->category_name ?>" required>                        
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
              $foto = $_POST['foto'];

              $filename = $_FILES['gambar']['name'];
              $tmp_name = $_FILES['gambar']['tmp_name'];

              $type1 = explode('.', $filename);
              $type2 = $type1[1];


              $newname = 'kategori'.time().'.'.$type2;

                // menampunng data format file yang diizinkan
              $tipe_acc = array('jpg', 'jpeg', 'png', 'gif');    



              if ($filename != '') {




                     // validasi format file
                if (!in_array($type2, $tipe_acc)) {
                    echo '<script>Swal.fire({

                        position:"center",
                        icon: "error",
                        title: "Oops...",
                        text: "Format tidak diizinkan!",
                    })</script>';

                }else{
                    unlink('./img/'.$foto);
                    move_uploaded_file($tmp_name, './img/'.$newname);

                    $namagambar = $newname;
                }
            }else{
                    // jika admin tidak ganti gambar
                $namagambar = $foto;
            }

            $update = mysqli_query($conn, "UPDATE tb_category SET 
                category_name = '".$nama."',
                category_image = '".$namagambar."'
                WHERE category_id ='".$k->category_id."' ");

            if ($update) {
             echo '<script>Swal.fire(
             "Data Berhasil Diubah!",
             "You clicked the button!",
             "success"
         )</script>';
         echo "<meta http-equiv='refresh' content='0'>";

     }else{
         echo 'gagal'.mysqli_error($conn);
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