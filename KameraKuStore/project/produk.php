<?php

error_reporting(0);
include 'db.php';

?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KameraKu | Product</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>


</head>
<body>
	<nav class="navbar2">
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


<!-- search start -->
<section class="product-search">
  <div class="search-box">
   <form action="produk.php" class="search-bar" method="GET">
    <input type="text" name="search" placeholder="Cari Produk" class="search" value="<?php echo $_GET['search'] ?>">
    <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>  	
  </form>
</div>

</section>
<!-- search end -->



<section class="product-list">

 <div class="container">

   <h3 class="title"> Produk</h3>

   <div class="products-container">
     <?php 

     if ($_GET['search'] != '' || $_GET['kat'] != '') {
      $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
    }

    $no = 1;

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
    if(mysqli_num_rows($produk) > 0 ){

     while ($p = mysqli_fetch_array($produk)) {

       ?>
       <div class="product" data-name="<?php echo "p-".$no++ ?>">
         <img src="produk/<?php echo $p['product_image'] ?>" alt="">
         <h3><?php echo $p['product_name'] ?></h3>
         <div class="price">Rp. <?php echo number_format($p['product_price']) ?></div>
       </div>

     <?php }}else{ ?>
      <p>Produk Tidak ada</p>
    <?php } ?>


  </div>



</div>

<div class="products-preview">
 <?php 

 if ($_GET['search'] != '' || $_GET['kat'] != '') {
  $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
}

$no = 1;
$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
if(mysqli_num_rows($produk) > 0 ){

 while ($p = mysqli_fetch_array($produk)) {

   ?>

   <div class="preview" data-target="<?php echo "p-".$no++ ?>">
    <i class="fas fa-times"></i>
    <img src="produk/<?php echo $p['product_image'] ?>" alt="">
    <h3><?php echo $p['product_name'] ?></h3>
    <div class="stars">
     <i class="fas fa-star"></i>
     <i class="fas fa-star"></i>
     <i class="fas fa-star"></i>
     <i class="fas fa-star"></i>
     <i class="fas fa-star-half-alt"></i>
     <span>(<i class="fa-solid fa-users"></i> 250 )</span>
   </div>
   <p><?php echo $p['product_description'] ?></p>
   <div class="price">Rp. <?php echo number_format($p['product_price']) ?></div>
   <div class="buttons">
     <a href="https://wa.me/6285891129040?text=Saya%20tertarik%20dengan%20produk%20Anda%20yang%20dijual" class="buy" target="_blank"><i class="fa-brands fa-whatsapp"></i> order now by whatsapp</a>
   </div>
 </div>

<?php }}else{ ?>
  <p>Produk Tidak ada</p>
<?php } ?>


</div>
</section>


<footer>

  <div class="footer-bottom">
    <p>Copyright &copy by <span>Rifqi IP</span> , 2022 - Camera | all rights reserved! </p>
  </div>
</footer>





<script>

  const navbar = document.querySelector(".navbar2");
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
    this.scrollY > 20 ? navbar2.classList.add("sticky") : navbar2.classList.remove("sticky");
  }

  let preveiwContainer = document.querySelector('.products-preview');
  let previewBox = preveiwContainer.querySelectorAll('.preview');

  document.querySelectorAll('.products-container .product').forEach(product =>{
   product.onclick = () =>{
     preveiwContainer.style.display = 'flex';
     let name = product.getAttribute('data-name');
     previewBox.forEach(preview =>{
       let target = preview.getAttribute('data-target');
       if(name == target){
         preview.classList.add('active');
       }
     });
   };
 });

  previewBox.forEach(close =>{
   close.querySelector('.fa-times').onclick = () =>{
     close.classList.remove('active');
     preveiwContainer.style.display = 'none';
   };
 });
</script>



</body>
</html>
