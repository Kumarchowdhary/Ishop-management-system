<?php
    session_start();
    if(!isset($_SESSION['UserName'])&& !isset($_SESSION['Password'])){
          header('location:login.php');
    }
    
?>


<?php
 $con=mysqli_connect("localhost","root","","ishopmangementsystem");
 
 if(isset($_GET['did']))
 {
  $did=$_GET['did'];	
  $sql="delete from company where comp_id=$did";
 if($con->query($sql)==true)
 { 	
 }

 }
 if(isset($_POST['update']))
 {

  $eid=$_POST['id'];
  $name=$_POST['name'];
  $location=$_POST['location'];
  $contact=$_POST['contact'];
  $status=$_POST['status'];

  $sql="update company set comp_name='$name' , comp_location='$location',
  comp_contact='$contact', comp_active=$status where comp_id=$eid ";
  if($con->query($sql)==true)
  {
  }
 }

 if(isset($_POST['add']))
 {
   $name=$_POST['name'];
   $location=$_POST['location'];
   $contact=$_POST['contact'];
   $status=$_POST['status'];
   
   $sql_1="insert into company(comp_name,comp_location,comp_contact,comp_active) values('$name','$location','$contact',$status)";
   if($con->query($sql_1)==true)
   { 	
   }

 }
 if(isset($_POST['back']))
   {
    header('Location:mainmenu.php');
     
   }

?>

<html>
	<head>
			<title>Company</title>
			<link rel="stylesheet" type="text/css" href="productcategory.css">
	</head>
<body>
	<?php
	echo "<div  id='tble'><table border='0' id='fom1'>
	<caption><font size='5'>Company Details</font></caption>
  <tr>
	<th>Company Name</th>
	<th>Location</th>
	 <th>Contact</th>
	 <th>Status</th>
	 <th>Edit</th>
	 <th>Delete</th>
     </tr>";
	
     $con=mysqli_connect("localhost","root","","ishopmangementsystem");
     $sql="select * from company";
     $res=$con->query($sql);
     while($row=$res->fetch_assoc())
 {
   echo "<tr><td><center>".$row["comp_name"]."</center></td><td><center>".$row["comp_location"]."</center></td><td><center>".$row['comp_contact'].
   "</center></td><td><center>".$row['comp_active']."</center></td>";
   echo "<td><center><a href='edit_company.php?eid=".$row["comp_id"]."'><img src='edit.png' height='40px' width='40px'></a></center></td>";
   echo "<td><center><a href='company.php?did=".$row["comp_id"]."'><img src='del.png' width='40px' height='40px'></a></center></td></tr>";

 }
 echo "</table></div>";

?>


	<div  id="dfom">
		<form action="company.php" method="POST">
			<table border="0" cellpadding="5" cellspacing="5" id="wdth">
        <th id="txt" colspan="2">Company</th>
          <tr>
  				  <td>Company Name</td>
            <td><input type="text" name="name" placeholder="Product Company" id="procat" class="inpt">
            </td>
          </tr>
        <tr>
				  <td>Company Location</td>
          <td><input type="text" name="location" placeholder="Location" id="prodes" class="inpt"></td>
        </tr> 
				<tr>
          <td>Company Contact</td>
          <td><input type="number" name="contact" placeholder="Contact" id="prodes" class="inpt"></td>
        </tr>
        <tr>
				  <td>Company Status</td>
          <td><input type="radio" name="status" value="1" id="active" checked >Active
				  <input type="radio" name="status" value="0" id="inactive" >InActive</td>
        </tr>
        <tr>
        <td></td>
        <td>
				  <input type="submit" value="Add" name="add"  id="add" class="btn">
				  <input type="reset" value="Reset" name="reset"  id="Reset" class="btn">
				<input type="submit" value="Back" name="back"  id="back" class="btn">
        </td>	
		</div>
</form>
</body>
</html>