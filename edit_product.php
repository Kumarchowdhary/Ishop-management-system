<?php
 $con=mysqli_connect("localhost","root","","ishopmangementsystem");
 if($_GET['eid'])
 {
  $eid=$_GET['eid'];
  $sql="select * from product where pd_id=$eid";
  $res=$con->query($sql);
  while ($row=$res->fetch_assoc()) 
  {

?>

<html>
	<head>
		<title>Products</title>
		<link rel="stylesheet" type="text/css" href="product.css">
	</head>
	<body>
         <div>
		<form action="product.php" method="POST" >
			<table border="0" cellspacing="5" cellpadding="5" id="div2">
			<th colspan="2" id="txt">Edit Product</th>
			<tr>
				<td>Product Company</td>
				<td>
					<select id="company_name" name="company" class="inpt">
						<?php
						 $con=mysqli_connect("localhost","root","","ishopmangementsystem");
				         $sql="select distinct (comp_name) from company";
						 $res=$con->query($sql);
						 while($row1=$res->fetch_assoc())
						  {
						    if($row['comp_id']==$row1['comp_id'])
						      echo "<option selected>".$row1['comp_name']."</option>";
						        else
						         echo "<option>".$row1['comp_name']."</option>";
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
		          while($row1=$res->fetch_assoc())
		          {
		             if($row['cat_id']==$row1['cat_id'])
		               echo "<option selected>".$row1['cat_name']."</option>";
		             else
		               echo "<option>".$row1['cat_name']."</option>";
	              }
       
                ?>
				</select></td>
				</tr>
				  <input type="hidden" name="id" value="<?php $id=$_GET['eid']; echo $id?>" >
				

				<tr>
					<td>ProductName</td>
					<td><input type="text" name="name" placeholder="ProductName"id="proname" value="<?php echo $row['pd_name']?>" class="inpt"></td>
				</tr>
				<tr>
				<td>Price</td>
				<td><input type="text" name="price" placeholder="Price" class="inpt" id="price" value="<?php echo $row['pd_price']?>"></td>
				</tr>
				<tr>
				<td>Expiry Date</td>
				<td><input type="Date" name="date"  id="date" value="<?php echo $row['pd_expiry']?>" class="inpt"></td>
				</tr>
				<tr>
					<td>Added by</td>
					<td><input type="text" name="empname" placeholder="Employee Name" id="isbn" value="<?php echo $row['pd_empusername']?>" class="inpt"></td>
				</tr>
				<tr>
				<td>Status</td>
				<td><input type="radio" name="status" value="1" id="active" <?php echo($row['pd_active']==1?'checked="checked"':'')?>>Active
				<input type="radio" name="status" value="0" id="inactive" <?php echo($row['pd_active']==0?'checked="checked"':'')?>>InActive</td>
				</tr>
				<tr>
				<td></td>
				<td>
				<input type="submit" value="Update" name="update" class="btn" id="update">	
				<input type="reset" value="Reset" name="reset" class="btn" id="Reset">
				<input type="submit" value="Back" name="back"  class="btn" id="back"></td>
				</tr>
				</table>		
	
		</foorm>
	</div>
	</body>
</html>

<?php
  }
  }
 ?>
