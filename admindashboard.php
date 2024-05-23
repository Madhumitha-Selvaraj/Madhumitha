<?php
include "config.php";
include "header.php";

?>
  <!-- Main -->
  <div id="main">
    <div class="cl">&nbsp;</div>
    <!-- Content -->
    <div id="content">
      <!-- Content Slider -->
      <div id="slider" class="box">
        <div id="slider-holder">
          <ul>
            <li><a href="#"><img src="css\images\slide2.jpg" alt="" /></a></li>
            <li><a href="#"><img src="css\images\slide1.jpg" alt="" /></a></li>
            <li><a href="#"><img src="css\images\slide3.jpg" alt="" /></a></li>
			<li><a href="#"><img src="css\images\slide4.jpg" alt="" /></a></li>
			<li><a href="#"><img src="css\images\slide5.jpg" alt="" /></a></li>
          </ul>
        </div>
        <div id="slider-nav"> <a href="#" class="active">1</a> <a href="#">2</a> <a href="#">3</a><a href="#">4</a><a href="#">5</a> </div>
      </div>

      <!-- End Content Slider -->
      <!-- Products -->
      <div class="products">
        <div class="cl">&nbsp;</div>
          <div class="box search">
        <h2>Add Product</h2>
        <div class="box-content">
          <form action="" method="post" enctype="multipart/form-data">
            <label>Category</label>
			<select name="cat" class="field" required>
			<option value="">select category</option>
			<option value="towel">towel</option>
			<option value="bedsheet">bedsheet</option>
			<option value="screen">screen</option>
			<option value="doormate">doormate</option>
			<option value="pillow-cover">pillow cover"</option>
			</select>

            <label>Product name</label>
            <input type="text" class="field" name="pname" required />

            <label>Product Description</label>
            <input type="text" class="field" name="pdescp"  required />
            
            <label>Product Size</label>
			 <input type="text" class="field" name="psize" />


            <label>Product image</label>
            <input type="file" class="field" name="pimg" required />
            
            <label>Price</label>
            <input type="text" class="field" name="med_price"  required />

            <label>Quantity</label>
            <input type="text" class="field" name="qty" required />
            
            <input type="submit" name='submit' class="search-submit" value="Add Product" />
          </form>
        </div>
      </div>
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Products -->
    </div>
    <!-- End Content -->
    <!-- Sidebar -->
    <div id="sidebar">
      <!-- Categories -->
       <?php
	  include "sidebar.php";
	  ?>
      
      <!-- End Categories -->
    </div>
    <!-- End Sidebar -->
    <div class="cl">&nbsp;</div>
  </div>
  <!-- End Main -->  


 <?php
if(isset($_POST['submit']))
{
$pimage=$_FILES['pimg']['name'];
$pname=mysql_real_escape_string($_POST['pname']);
$cat=$_POST['cat'];
$psize=$_POST['psize'];
$pdescp=$_POST['pdescp'];
$med_price=$_POST['med_price'];
$qty=$_POST['qty'];

mysql_query("insert into product(pname,cat,med_price,qty,pimage,pdescp,psize)values('$pname','$cat','$med_price','$qty','$pimage','$pdescp','$psize')")or die(mysql_error());
move_uploaded_file($_FILES['pimg']['tmp_name'],"upload/$pimage");
echo "<script type='text/javascript'>alert('Product added Successfull');</script>";
echo '<meta http-equiv="refresh" content="0;url=admindashboard.php">';
}
?>       
<?php
include "footer.php";
?>   