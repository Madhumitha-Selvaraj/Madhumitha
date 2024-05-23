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
        <br />
        <h1>Welcome to Adhan exports</h1>
		<p>Adhan exports is a leading fabric textile manufacturer located in Karur.The company was started in the year 2017.We are professional excels in manufacturing great quality  products.Our motto is to provide the high quality products on time at the best price to customers.We offer variety of Home Textile products made out of finest cotton fabrics and various other blends in various sizes, innovative designs & attractive colors.Contact us for more details!</p>
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
      <!
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
echo $_SESSION['uname']=$uname=$r['stname'];
//echo '<meta http-equiv="refresh" content="0;url=shop.php">';
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