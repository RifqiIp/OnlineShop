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
    <title>User Ask</title>
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
        <div class="container-produk">
          <h1 class="heading-title">User ASK</h1>
          <div class="header_fixed">
            <table>
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>nama</th>
                        <th>Date Created</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  

                    $no = 1;
                    $user = mysqli_query($conn, "SELECT * FROM tb_user ORDER BY user_id DESC");

                    if (mysqli_num_rows($user) > 0){ 
                        while($row = mysqli_fetch_array($user)){


                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['user_name'] ?></td>
                                <td><?php echo $row['date_created'] ?></td>
                                
                                <td>
                                    <div class="view-btn">
                                        <a href="viewask.php?id=<?php echo $row['user_id'] ?>" class="btn-detail"><i class="fa-solid fa-pen-to-square"></i>View</a>
                                    </div>
                                </td>
                            </tr>
                        <?php  }}else{ ?>

                            <tr>
                                <td colspan="6">Tidak Ada Data</td>
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