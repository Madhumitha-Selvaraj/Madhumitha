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
		
		<form name="" action="" method="post">
				
Start Date : <br>
				<input type="text" name="adate" value="<?php echo date("Y-m-d"); ?>" /><br>

				EndDate : <br>
				<input type="text" name="edate" value="<?php echo date("Y-m-d"); ?>" /><br>
				<br>
				
				<span class='submit'><input type="submit" name="search" value="Search" /></span>
				</form>
				
				<br>

        <table align="center" cellpadding="20" cellspacing="0" border="1" style="text-align:center;">
          <tr><td>Order date</td><td>Address</td><td>User</td><td>Product name</td><td>Price Per unit </td><td>Qty sold</td><td>Total Amount</td><td>Status</td></tr>
          <?php
		  if(isset($_POST['search']))
		 {
		 $adate=$_POST['adate'];
		 $edate=$_POST['edate'];

		$t=mysql_query("select * from cart where date between '$adate' and '$edate'")or die(mysql_error());

		 }
		 else
		 {
		$t=mysql_query("select * from cart");
		 }
		while($w=mysql_fetch_array($t))
		{
$pid=$w['pid'];
$stid=$w['stid'];
$status=$w['status'];
$addr=$w['addr'];
if($status=='')
{
$status='Pending';
}
else
{
$status='Cancelled';
}
$cqty=$w['qty'];
$date=$w['date'];
$u=mysql_query("select * from product where pid=$pid");
		while($y=mysql_fetch_array($u))
		{

$pname=$y['pname'];
$pcode=$y['pcode'];
$price=$y['med_price'];


$p=mysql_query("select * from user where stid='$stid'");
$f=mysql_fetch_array($p);
		

$uname=$f['stname'];


		?>

          <?php
		  $tot=($cqty*$price);
echo "<tr><td>$date</td><td>$addr</td><td>$uname</td><td>$pname</td><td>$price</td><td>$cqty</td><td>$tot</td><td>$status</td></tr>";
		  ?>
          
                <?php
				}
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