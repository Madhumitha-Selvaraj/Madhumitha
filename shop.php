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
        <ul>
        <?php
		echo $_SESSION['uname'];
		$cat=$_GET['cat'];
		if($cat!='')
		{
		$t=mysql_query("select * from product where cat='$cat'");
		}
		else
		{
		$t=mysql_query("select * from product");
		}
		while($w=mysql_fetch_array($t))
		{
		$pimage=$w['pimage'];
$pname=$w['pname'];
$pdescp=$w['pdescp'];
$price=$w['med_price'];
$qty=$w['qty'];
$cat=$w['cat'];
$subcat=$w['subcat'];
$psize=$w['psize'];
$pid=$w['pid'];
		?>
         <li> <a href="#"><img src="upload/<?php echo $pimage; ?>" alt="" width="150px" style="text-align:center;"/></a>
            <div class="product-info">
              <h3><?php echo $pname; ?></h3>
              <div class="product-desc">
                <h4><?php echo $pdescp; ?></h4><br/>
                <strong class="price">Rs.<?php echo $price; ?></strong> </div>
                <h3><a href="addtocart.php?pid=<?php echo $pid; ?>"><input type="button" value="Add to cart" /></a></h3>
            </div>
          </li>
        <?php
		}
		?>
        </ul>
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Products -->
    </div>
    <!-- End Content -->
    <!-- Sidebar -->
    <div id="sidebar">
      <!-- Search -->
      
      <!-- End Search -->
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
$uname=$_POST['uname'];
$upass=$_POST['upass'];
$q=mysql_query("select * from user where stname='$uname' and stpass='$upass'")or die(mysql_error());
$n=mysql_num_rows($q);
if($n>0)
{
$r=mysql_fetch_array($q);
$_SESSION['stid']=$stid=$r['stid'];
$_SESSION['uname']=$uname=$r['uname'];
echo '<meta http-equiv="refresh" content="0;url=userdashboard.php">';
}
else
{
echo "<script type='text/javascript'>alert('You are not authorised user');</script>";
}

}
?>         
<?php
include "footer.php";
?>   