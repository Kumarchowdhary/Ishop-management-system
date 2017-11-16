<?php
 $con=mysqli_connect("localhost","root","","ishopmangementsystem");
 if($_GET['eid'])
 {
  $eid=$_GET['eid'];
  $sql="select * from company where comp_id=$eid";
  $res=$con->query($sql);
  while ($row=$res->fetch_assoc()) 
  {
  echo $row['comp_active'];
?>

<html>
	<head>
			<title>Company</title>
			<link rel="stylesheet" type="text/css" href="productcategory.css">
	</head>
<body>

     
	<form action="company.php" method="POST" id="dfom">
		<input type="hidden" name="id" value="<?php $id=$_GET['eid']; echo $id?>">
			<table border="0" cellpadding="5" cellspacing="5" id="wdth">
			<th id="txt" colspan="2">Edit Company</th>
				<tr>
				   <td>Company Name</td>
					<td><input type="text" name="name" placeholder="Product Category" id="procat" value="<?php echo $row['comp_name']; ?>" class="inpt"></td>
				</tr>
				<tr>	
				 	<td>Company Location</td>
					<td><input type="text" name="location" placeholder="Location" id="prodes" value="<?php echo $row['comp_location']; ?>" class="inpt"></td>
				</tr>	
				<tr>
					<td>Company Contact</td>
					<td><input type="number" name="contact" placeholder="Product Contact" id="prodes" value="<?php echo $row['comp_contact']; ?>" class="inpt"></td>
				</tr>
				<tr>	
					<td>Company Status</td>
					<td><input type="radio" name="status" value="1" id="active" <?php echo($row['comp_active']==1?'checked="checked"':'')?> >Active
 						<input type="radio" name="status" value="0" id="inactive" <?php echo($row['comp_active']==0?'checked="checked"':'')?>>InActive</td>
 				</tr>
 				<tr>
 					<td></td>

				<td><input type="submit" value="Update" name="update"  id="update" class="btn">
				<input type="reset" value="Reset" name="reset"  id="Reset" class="btn">
				<input type="submit" value="Back" name="back"  id="back" class="btn"></td>
</body>
</html>

<?php
}
}
?>