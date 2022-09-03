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
    <title>Kategori</title>
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
        <div class="container-kategori">
          <h1 class="heading-title">Data Kategori</h1>
          <div class="header_fixed">
            <div class="add-btn">
                <a href="tambah-kategori.php" class="add-data-btn"><i class="fa-solid fa-plus"></i> Add New Data</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th width="210px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  

                    $no = 1;
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");

                    if (mysqli_num_rows($kategori) > 0){ 
                        while($row = mysqli_fetch_array($kategori)){


                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td> <?php echo $row['category_name'] ?></td>
                                <td><a href="img/<?php echo $row['category_image'] ?>" target="_blank" ><img src="img/<?php echo $row['category_image'] ?>" alt="" width="50px"></a></td>
                                <td>
                                    <div class="aksi-btn">
                                        <a href="edit-kategori.php?id=<?php echo $row['category_id'] ?>" class="btn-edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                                        <a href="delete-proses.php?idk=<?php echo $row['category_id'] ?>" class="btn-delete" onclick="return confirm('yakin ingin menghapus ?')" ><i class="fa-solid fa-trash-can"></i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php  }}else{ ?>

                            <tr>
                                <td colspan="8">Tidak Ada Data</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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