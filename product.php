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
  $sql="delete from product where pd_id=$did";
 if($con->query($sql)==true)
 { 	
 }

 }
 if(isset($_POST['update']))
 {
  $eid=$_POST['id'];
  $company=$_POST['company'];
   $category=$_POST['category'];
   $name=$_POST['name'];
   $price=$_POST['price'];
   $expiry=$_POST['date'];
   $empusername=$_POST['empname'];
   $status=$_POST['status'];
   
   $sql_1="select * from company where comp_name='$company' ";
   $res=$con->query($sql_1);
   while($row=$res->fetch_assoc())
   {
    $comp_id=$row['comp_id'];
   }

   $sql_2="select * from category where cat_name='$category' ";
   $res=$con->query($sql_2);
   while($row=$res->fetch_assoc())
   {
    $cat_id=$row['cat_id'];
   }

  $sql3="update product set comp_id=$comp_id , cat_id=$cat_id,
  pd_name='$name' , pd_price=$price , pd_expiry='$expiry'
  ,pd_empusername='$empusername' ,pd_active=$status where pd_id=$eid";
  if($con->query($sql3)==true)
  {
  }
  }
 if(isset($_POST['add']))
 {
   $company=$_POST['company'];
   $category=$_POST['category'];
   $name=$_POST['name'];
   $price=$_POST['price'];
   $expiry=$_POST['date'];
   $empusername=$_POST['empname'];
   $status=$_POST['status'];
   
   $sql_1="select * from company where comp_name='$company' ";
   $res=$con->query($sql_1);
   while($row=$res->fetch_assoc())
   {
    $comp_id=$row['comp_id'];
   }

   $sql_2="select * from category where cat_name='$category' ";
   $res=$con->query($sql_2);
   while($row=$res->fetch_assoc())
   {
    $cat_id=$row['cat_id'];
   }

   $sql_3="insert into product(comp_id,cat_id,pd_name,pd_price,pd_expiry,pd_empusername,pd_active) values($comp_id,$cat_id,'$name',$price,'$expiry','$empusername',$status)";
   if($con->query($sql_3)==true)
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
		<title>Products</title>
		<link rel="stylesheet" type="text/css" href="product.css">
	</head>
	<body>	
		<?php
	echo "<div id='div1'><table border='0' id='fom1' >
  <caption><font size='5' color='black'>Product Details</font></caption>
	 <tr>
	 <th>Product Name</th>
	 <th>Price</th>
	 <th>Expiry Date</th>
	 <th>Added by</th>
	 <th>Status</th>
	 <th>Edit</th>
	 <th>Delete</th>
     </tr>";
	
 $con=mysqli_connect("localhost","root","","ishopmangementsystem");
 $sql="select * from product";
 $res=$con->query($sql);
 while($row=$res->fetch_assoc())
 {
   echo "<tr><td><center>".$row["pd_name"]."</center></td><td><center>".$row['pd_price'].
   "</center></td><td><center>".$row['pd_expiry']."</center></td><td><center>".
   $row['pd_empusername']."</center></td><td><center>".$row['pd_active']."</center></td>";
   echo "<td><center><a href='edit_product.php?eid=".$row["pd_id"]."'><img src='edit.png' height='40px' width='40px'></a></center></td>";
   echo "<td><center><a href='product.php?did=".$row["pd_id"]."'><img src='del.png' width='40px' height='40px'></a></center></td></tr>";

 }
 echo "</table></div>";

?>
<div>
		<form action="product.php" method="POST" id="div2">
			<table border="0" cellspacing="3" cellpadding="3" width="100%">
        <th colspan="2" id="txt">Product</th>
				<tr>
				  <td>Product Company</td>
          <td><select id="company_name" name="company" class="inpt">
      			    <?php
      		         $con=mysqli_connect("localhost","root","","ishopmangementsystem");
                       $sql="select distinct (comp_name) from company";
      		         $res=$con->query($sql);
      		         while($row=$res->fetch_assoc())
      		         {
      		           echo "<option>".$row['comp_name']."</option>";  
      		         }
                      ?>	
      				</select>
          </td> 
        </tr>
        <tr>
          <td>Product Category</td>
				  <td><select id="product_category" name="category" class="inpt">
        				<?php
        		         $con=mysqli_connect("localhost","root","","ishopmangementsystem");
                         $sql="select distinct (cat_name) from category";
        		         $res=$con->query($sql);
        		         while($row=$res->fetch_assoc())
        		         {
        		           echo "<option>".$row['cat_name']."</option>";  
        		         }
                        ?>
        				</select>
          </td>
         </tr>
         <tr> 
            <td>ProductName</td>
            <td><input type="text" name="name" placeholder="ProductName" class="inpt" id="proname"></td>
          </tr>
        <tr>   
				  <td>Price</td>
          <td><input type="text" name="price" placeholder="Price" class="inpt" id="price"></td>
        </tr>
        <tr>
          <td>Expiry Date</td>
          <td><input type="Date" name="date"  class="inpt" id="date"></td>
        </tr>
        <tr>
            <td>Added by</td>
            <td><input type="text" name="empname" placeholder="Employee Name" class="inpt" id="isbn"></td>
        </tr>
        <tr>    
				    <td>Status</td>
            <td><input type="radio" name="status" value="1" id="active" >Active
				        <input type="radio" name="status" value="0" id="inactive" >InActive
            </td>
        </tr>
        <tr>
            <td></td>
            <td>        
        				<input type="submit" value="Add" name="add"  id="add" class="btn">
        				<input type="reset" value="Reset" name="reset"  id="Reset" class="btn">
        				<input type="submit" value="Back" name="back"  id="back" class="btn">		
      		 </td>
        </tr>   
	  </tabele>
  	</form>
	  </div>
</body>
</html>
