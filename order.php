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

        <table align="left" cellpadding="20" cellspacing="0" border="1">
          <tr><td>Product image</td><td>Product name</td><td>Price</td><td>Qty</td><td>Size</td><td>Total Price</td><td>Order date</td><td>Delivery date</td><td>Status</td></tr>
          <?php
		$stid=$_SESSION['stid'];
		$t=mysql_query("select * from cart where stid=$stid");
		while($w=mysql_fetch_array($t))
		{
$pid=$w['pid'];
$cid=$w['cid'];
$status=$w['status'];
$qty=$w['qty'];
$size=$w['size'];
$date=$w['date'];
$ddate=$w['ddate'];
$u=mysql_query("select * from product where pid=$pid");
		while($y=mysql_fetch_array($u))
		{

		$pimage=$y['pimage'];
$pname=$y['pname'];
$pdescp=$y['pdescp'];
$price=$y['med_price'];


		?>

          <?php
		  $tot=($qty*$price);
		  if($status=='')
		  {
echo "<tr><td><img src='upload/$pimage' height='50px' /></td><td>$pname</td><td>$price</td><td>$qty</td><td>$size</td><td>$tot</td><td>$date</td><td>$ddate</td><td><a href=order.php?cid=$cid&status=cancel>Cancel</a></td></tr>";
}
else
{
echo "<tr><td><img src='upload/$pimage' height='50px' /></td><td>$pname</td><td>$price</td><td>$qty</td><td>$size</td><td>$tot</td><td>$date</td><td>$ddate</td><td>$status</td></tr>";

}
		  ?>
          
                <?php
				}
				}
				?>
                </table>
            </div>
       
        
      </div>
        <div class="cl">&nbsp;</div>
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
$cid=$_GET['cid'];
if($status=='cancel')
{
mysql_query("update cart set status='cancel' where cid='$cid'");

$t=mysql_query("select * from cart where cid=$cid");
		while($w=mysql_fetch_array($t))
		{
$pid=$w['pid'];
$cid=$w['cid'];
$status=$w['status'];
$qty=$w['qty'];
mysql_query("update product set qty=qty+$qty where pid='$pid'");
}

echo "<script type='text/javascript'>alert('Product order cancelled Successfull');</script>";
echo '<meta http-equiv="refresh" content="0;url=order.php">';
}
include "footer.php";
?>   