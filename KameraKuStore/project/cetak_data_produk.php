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
    <title>Produk</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
</head>
<body>

  <section>
    <div class="container-produk">
      <h1 class="heading-title">Data Produk</h1>
      <div class="header_fixed">
        <table>
            <thead>
                <tr>
                    <th width="60px">No</th>
                    <th>Kategori</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th width="200px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php  

                $no = 1;
                $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
                if (mysqli_num_rows($produk) > 0) {
                        	// code...

                    while($row = mysqli_fetch_array($produk)){


                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['product_name'] ?></td>
                            <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                            <td><a href="produk/<?php echo $row['product_image'] ?>" target="_blank" ><img src="produk/<?php echo $row['product_image'] ?>" alt="" width="50px"></a></td>
                            <td><?php echo ($row['product_status'] == 0)? 'Tidak Aktif':'Aktif'; ?></td>

                            <td>
                                <div class="aksi-btn">
                                    <a href="edit-produk.php?id=<?php echo $row['product_id'] ?>" class="btn-edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                                    <a href="delete-proses.php?idp=<?php echo $row['product_id'] ?>" class="btn-delete" onclick="return confirm('yakin ingin menghapus ?')" ><i class="fa-solid fa-trash-can"></i> Delete</a>
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


<script>
  window.print();
</script>



</body>
</html>