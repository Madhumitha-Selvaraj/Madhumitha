<?php
include "config.php";
include "header.php";
if($_SESSION['stid']=='')
{
echo "<script type='text/javascript'>alert('Please login to view the page');</script>";
echo '<meta http-equiv="refresh" content="0;url=index.php">';
}
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
        <h2>Add to cart Details</h2>
        <form action="" method="post">
         <?php
		 $pid=$_GET['pid'];
		$t=mysql_query("select * from product where pid=$pid");
		while($w=mysql_fetch_array($t))
		{
		$pimage=$w['pimage'];
$pname=$w['pname'];
$pdescp=$w['pdescp'];
$price=$w['med_price'];
$psize=$w['psize'];
$qty=$w['qty'];
		?>
        <table align="left" cellpadding="10" cellspacing="0" border="1">
          <tr><td>Product image</td><td>Product name</td><td>Size</td><td>Price</td><td>Needed Size</td><td>Qty</td></tr>
          <?php
echo "<tr><td><img src='upload/$pimage' height='50px' /></td><td>$pname</td><td>$psize</td><td>$price</td><td>";
echo '<input type="text" name="psize" required >';
echo "</td><td><input type='text' name='qty' required ></td></tr>";
		  ?>
          </table>
		  
		  Address : <br/><input type='text' name='addr' required ><br/>
		  Payment: <br/> COD <br>
		  <input type='submit' name='checkout' value='Checkout' >
		  
		  
                </form>
                <?php
				}
				?>
            </div>
       
        
      </div>
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Products -->
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
	
 <?php
if(isset($_POST['checkout']))
{
$stid=$_SESSION['stid'];
$uname=$_SESSION['uname'];
$pid=$_GET['pid'];
$qty=$_POST['qty'];
$size=$_POST['psize'];
$date=date("Y-m-d");

$ddate=date("Y-m-d", strtotime('+7 days'));


$addr=$_POST['addr'];



$u=mysql_query("select * from product where pid='$pid' and qty>=$qty");
$n=mysql_num_rows($u);
if($n==1)
{
while($r=mysql_fetch_array($u))
{
$pimage=$r['pimage'];
$pname=$r['pname'];
$cat=$r['cat'];

$med_price=$r['med_price'];
	
$cost=$total=$med_price*$qty;
	
mysql_query("insert into cart(stid,pid,qty,size,date,ddate,addr)values('$stid','$pid','$qty','$size','$date','$ddate','$addr')")or die(mysql_error());
mysql_query("update product set qty=qty-$qty where pid='$pid'");

echo "<div class='content'><h3>Name : $uname</h3>";
echo "<h3>Order Date : $date</h3></div>";
echo "<h3>Address : $addr</h3></div>";

echo "<div class='box'><table align='center' cellpadding='10' cellspacing='0' border='1' width='95%' class='mnu_table'>
<tr class='table'><td>Product</td><td>Size</td><td>Category</td><td>Image</td><td>Price</td><td>Quantity</td><td>Cost</td></tr>
";

echo "<tr><td>$pname</td><td>$size</td><td>$cat</td><td><img src='upload/$pimage' width='100px' /></td><td>$price</td><td>$qty</td><td>$cost</td></tr>";

echo "<tr><td colspan='5'></td><td>Total</td><td>$total</td></tr>";
echo "</table></div>";

echo "<script type='text/javascript'>alert('Product ordered Successfully, Your order has been placed, It will be delivered within one week');</script>";
//echo '<meta http-equiv="refresh" content="10;url=order.php">';
}
}
else
{

echo "<script type='text/javascript'>alert('Product Quantity is out of stock');</script>";
}
}
?> 
    <div class="cl">&nbsp;</div>

  </div>
  <!-- End Main -->  
    <div class="cl">&nbsp;</div>
      
<?php
include "footer.php";
?>   