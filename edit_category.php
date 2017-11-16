<?php
 $con=mysqli_connect("localhost","root","","ishopmangementsystem");
 if($_GET['eid'])
 {
  $eid=$_GET['eid'];
  $sql="select * from category where cat_id=$eid";
  $res=$con->query($sql);
  while ($row=$res->fetch_assoc()) 
  {

?>

<html>
	<head>
			<title>UpdateCategories</title>
			<link rel="stylesheet" type="text/css" href="category.css">
	</head>
<body>
	<div >
        <form action="category.php" method="POST">
			<table border="0" cellpadding="5" cellspacing="5"  id="div2">
        	<th colspan="2" id="txt"> Edit Category</th>
				<input type="hidden" name="id" value="<?php $id=$_GET['eid']; echo $id?>">	
			<tr>	
				<td>Product Category</td>
				<td><input type="text" name="name" value="<?php echo $row['cat_name']; ?>" placeholder="Product Category" class="inpt" id="procat">
			</td>
			</tr>
			<tr>
				<td>Product Description</td>
				<td><input type="text" name="desc" value="<?php echo $row['cat_description']; ?>" placeholder="Product Description" class="inpt" id="prodes"></td>
			</tr>
			<tr>	
				<td>Status</td>
				<td>
					<input type="radio" name="status" value="1" id="active" <?php echo($row['cat_active']==1?'checked="checked"':'')?> >Active
					<input type="radio" name="status" value="0" id="inactive" <?php echo($row['cat_active']==0?'checked="checked"':'')?> >InActive
				</td>
				</tr>
				<tr>
				<td></td>
				<td>		
					<input type="submit" value="Update" name="update"  id="add" class="btn">	
					<input type="reset" value="Reset" name="reset"  id="Reset" class="btn">
					<input type="submit" value="Back" name="back"  id="back" class="btn">
 				</td>
 				</tr>
 				</table>
 	</form>
 	</div>

 </body>			
</html>

<?php
}
}
?>