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
        <h2>Register </h2>
        <div class="box-content">
          <form action="" method="post">
            <label>Firstname</label>
            <input type="text" class="field" name="fname"  required />
             <label>Lastname</label>
            <input type="text" class="field" name="lname" required />
            <label>Email</label>
            <input type="email" class="field" name="email"  required />
			
			<label>Phone</label>
            <input type="text" class="field" name="phone" required  pattern="[1-9]{1}[0-9]{9}"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" />
			
			<label>Address</label>
            <input type="text" class="field" name="addr" required />
			
			
            <label>Username</label>
            <input type="text" class="field" name="uname" required />
            <label>Password</label>
            <input type="password" class="field" name="upass" required />
            <input type="submit" name='submit' class="search-submit" value="Register" />
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
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$uname=$_POST['uname'];
$upass=$_POST['upass'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$addr=$_POST['addr'];



$q=mysql_query("select * from  user where stname='$uname' and stpass='$upass'")or die(mysql_error());

echo "select * from  user where stname='$uname' and stpass='$upass'";
echo $n=mysql_num_rows($q);
if($n>0)
{
echo "<script type='text/javascript'>alert('User account already exists');</script>";
}
else
{
mysql_query("insert into user(stfname,stlname,stemail,stname,stpass,phone,addr)values('$fname','$lname','$email','$uname','$upass','$phone','$addr')");
echo "<script type='text/javascript'>alert('User account registered successfully');</script>";
echo '<meta http-equiv="refresh" content="0;url=index.php">';
}
}
?>       
<?php
include "footer.php";
?>   