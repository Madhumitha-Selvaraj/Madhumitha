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
        <h2>View Order Details</h2>

        <table align="center" cellpadding="20" cellspacing="0" border="1" style="text-align:center;">
          <tr><td>Category</td><td>Product name</td><td>Product Size</td><td>Product image</td><td>Price</td><td>Quantity</td></tr>
          <?php
		
$u=mysql_query("select * from product");
		while($y=mysql_fetch_array($u))
		{
$pname=$y['pname'];
$cat=$y['cat'];
$price=$y['med_price'];
$qty=$y['qty'];
$pimage=$y['pimage'];
$psize=$y['psize'];

		?>

          <?php
		
echo "<tr><td>$cat</td><td>$pname</td><td>$psize</td><td><img src='upload/$pimage' width='100px'/></td><td>$price</td><td>$qty</td></tr>";
		  ?>
          
                <?php
				
				}
				?>
                </table>
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
$status=$_GET['status'];
$pid=$_GET['pid'];
if($status=='cancel')
{
mysql_query("update cart set status='cancel' where pid='$pid'");

echo "<script type='text/javascript'>alert('Product order cancelled Successfull');</script>";
echo '<meta http-equiv="refresh" content="0;url=order.php">';
}
include "footer.php";
?>   