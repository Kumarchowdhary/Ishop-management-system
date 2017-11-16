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
  $sql="delete from category where cat_id=$did";
 if($con->query($sql)==true)
 { 	
 }

 }
 if(isset($_POST['update']))
 {

  $eid=$_POST['id'];
  $name=$_POST['name'];
  $description=$_POST['desc'];
  $status=$_POST['status'];
  $sql="update category set cat_name='$name' , cat_description='$description',
  cat_active=$status where cat_id=$eid ";
  if($con->query($sql)==true)
  {
  }
 }

 if(isset($_POST['add']))
 {
   $name=$_POST['name'];
   $description=$_POST['desc'];
   $status=$_POST['status'];
   
   $sql_1="insert into category(cat_name,cat_description,cat_active) values('$name','$description',$status)";
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
			<title>ProductCategories</title>
			<link rel="stylesheet" type="text/css" href="category.css">
	</head>
<body>
	<?php
	echo "<div id='div1'><table border='0' id='fom1'>
  <caption><font size='5' color='black'>Category Details</font></caption>
	<tr>
	<th>Category name</th>
	<th>Description</th>
	 <th>Status</th>
	 <th>Edit</th>
	 <th>Delete</th>
     </tr>";
	
     $con=mysqli_connect("localhost","root","","ishopmangementsystem");
     $sql="select * from category";
     $res=$con->query($sql);
     while($row=$res->fetch_assoc())
 {
   echo "<tr><td><center>".$row["cat_name"]."</center></td><td><center>".$row['cat_description'].
   "</center></td><td><center>".$row['cat_active']."</center></td>";
   echo "<td><center><a href='edit_category.php?eid=".$row["cat_id"]."'><img src='edit.png' height='40px' width='40px'></a></center></td>";
   echo "<td><center><a href='category.php?did=".$row["cat_id"]."'><img src='del.png' width='40px' height='40px'></a></center></td></tr>";

 }
 echo "</table></div>";

?>
<div>
	
		<form action="category.php" method="POST" >
			<table cellspacing="5" cellpadding="5" id="div2">
        <th colspan="2" id="txt">Category</th>
        <tr>
          <td>ProductCategory</td>
          <td><input type="text" name="name"  placeholder="Product Category" class="inpt"></td>
        </tr>
        <tr>  
				  <td>Product Description</td>
          <td><input type="text" name="desc" placeholder="Product Description" class="inpt"></td>
        </tr>
        <tr>  
			     <td>Status</td>
           <td><input type="radio" name="status" value="1" id="active" checked>Active
				       <input type="radio" name="status" value="0" id="inactive" >InActive
           </td>
        </tr> 
        <tr>
          <td></td>
          <td>      
      				<input type="submit" value="Add" name="add"  id="add" class="btn">	
      				<input type="reset" value="Reset" name="reset"   class="btn" id="Reset">
      				<input type="submit" value="Back" name="back"  class="btn" id="back">
  			   </td>
		    </tr>
    </table>
    </form>
    </div>    
</body>
</html>