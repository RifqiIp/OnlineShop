<?php 

session_start();

include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
$p = mysqli_fetch_object($produk);


?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kategori</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    
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
            <a href="userask.php">user asks</a>            <a href="logout.php" class="login-btn">Log out</a>

        </nav>


        <div id="menu-btn" class="fas fa-bars"></div>

    </section>


    <section>
        <div class="container-profil">
            <header>Edit Data Produk</header>
            

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form first">
                    <div class="details personal">
                        <span class="title">Add Product Data</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Kategori</label>
                                <select name="kategori" required>
                                    <option disabled selected>Select Category</option>
                                    <?php
                                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                                    while ($r = mysqli_fetch_array($kategori)) {

                                     ?>
                                     <option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id)? 'selected':''; ?>><?php echo $r['category_name']; ?></option>


                                 <?php } ?>
                                 
                                 
                             </select>
                         </div>
                         <div class="input-field">
                            <label>Nama Produk</label>
                            <input type="text" name="nama" placeholder="Nama Produk" value="<?php echo $p->product_name ?>" required>                        
                        </div>
                        <div class="input-field">
                            <label>Harga</label>
                            <input type="number" name="harga" placeholder="harga" value="<?php echo $p->product_price ?>" required>                        
                        </div>
                        <div class="input-file">
                            <label >Masukan Gambar <span class="imp">*</span> <small>(png, jpg, jpeg, gif)</small> </label>
                            <img  src="produk/<?php echo $p->product_image ?> ">
                            <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
                            <input type="file" id="file" name="gambar"   >


                        </div>
                        <div class="input-field">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" id="" cols="30" rows="10" placeholder="deskripsi"  required><?php echo $p->product_description ?></textarea>
                            
                        </div>
                        <div class="input-field">
                            <label>Status</label>
                            <select required name="status">
                                <option disabled selected>Select status</option>
                                <option value="1" <?php echo ($p->product_status == 1)? 'selected':''; ?> >Aktif</option>
                                <option value="0" <?php echo ($p->product_status == 0)? 'selected':''; ?>>Tidak Aktif</option>                            
                            </select>
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
                // data inputan dari form
        $kategori   = $_POST['kategori'];
        $nama       = $_POST['nama'];
        $harga      = $_POST['harga'];
        $deskripsi  = $_POST['deskripsi'];
        $status     = $_POST['status'];
        $foto       = $_POST['foto'];
        

                // data gambar yang baru

        $filename = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];

        $type1 = explode('.', $filename);
        $type2 = $type1[1];

        
        $newname = 'produk'.time().'.'.$type2;

                    // menampunng data format file yang diizinkan
        $tipe_acc = array('jpg', 'jpeg', 'png', 'gif');
        

                // jika ganti gambar
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
                unlink('./produk/'.$foto);
                move_uploaded_file($tmp_name, './produk/'.$newname);

                $namagambar = $newname;
            }
        }else{
                    // jika admin tidak ganti gambar
            $namagambar = $foto;
        }

                // query update data produk
        $update = mysqli_query($conn, "UPDATE tb_product SET 
            category_id         = '".$kategori."',
            product_name        = '".$nama."', 
            product_price       = '".$harga."', 
            product_description = '".$deskripsi."', 
            product_image       = '".$namagambar."',
            product_status      = '".$status."'
            WHERE product_id = '".$p->product_id."'  ");
        if($update){
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

<script>
    CKEDITOR.replace( 'deskripsi' );
</script>


</body>
</html>