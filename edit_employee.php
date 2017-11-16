<?php
 $con=mysqli_connect("localhost","root","","ishopmangementsystem");
 if($_GET['eid'])
 {
  $eid=$_GET['eid'];
  $sql="select * from employee where emp_id=$eid";
  $res=$con->query($sql);
  while ($row=$res->fetch_assoc()) 
  {

?>
<html>
 <head>
  <title>EditEmployee</title>
  <link rel="stylesheet" type="text/css" href="addemployee.css">
  <script>
    function check()
    {
     var pass=document.getElementById("pass").value;
     var repass=document.getElementById("repass").value;
     if(pass==repass)	
      return true;
     else
      alert("Passwords don't match");	
      return false;
    }
    </script>
 </head>
  <body>
  	<br><br>
	 <form id="form" action="addemployee.php" method="post" onsubmit="return check();">
	   <table border="0" cellpadding="3" cellpadding="3" id="fom">
	   <th id="txt" colspan="2">Edit Employee</th>
	   <tr>
	    	<td>EmployeeType</td>	
	    	<td>
	    		<select id="list" name="type" class="inpt">
				<?php
		 		$con=mysqli_connect("localhost","root","","ishopmangementsystem");
         		$sql="select distinct * from employee_type";
		 		$res=$con->query($sql);
		 		while($row1=$res->fetch_assoc())
		 		{
		  		if($row['emp_id']==$row1['emp_id'])
		  		echo "<option selected='selected'>".$row1['emp_type']."</option>";
		  		else
		  		echo "<option>".$row1['emp_type']."</option>";
	     		}
        		?>
	  			</select>
	  		</td>
	  	</tr>	
	  	<input type="hidden" name="id" value="<?php $id=$_GET['eid']; echo $id?>">
	  	<tr>
	  		<td>EmpName</td>
	  		<td><input type="text" value="<?php echo $row['emp_name']?>" name="empname" placeholder="EmployeeName" class="inpt"></td>
	  	</tr>
	  	<tr>
	  		<td>UserName</td>
	  		<td><input type="text" value="<?php echo $row['emp_username']?>" name="username" placeholder="UserName" class="inpt"></td>
	  	</tr>
	  	<tr>	
	  		<td>Password</td>
	  		<td><input type="password" value="<?php echo $row['emp_password']?>" name="password"  placeholder="Password" class="inpt"></td>
	  	</tr>
	  	<tr>	
	  		<td>RetypePassword</td>	  	
	  		<td><input type="password" value="<?php echo $row['emp_password']?>" name="repassword"  placeholder="RetypePassword" class="inpt"></td>
	  	</td>
	  	<tr>
	  		<td>Address</td>	
	  		<td><input type="text" value="<?php echo $row['emp_address']?>" name="address" placeholder="Address" class="inpt"></td>
	  	</tr>
	  	<tr>
		  	<td>ContactNo</td>
		  	<td><input type="number" value="<?php echo $row['emp_cellno']?>" name="contact" placeholder="ContactNo" class="inpt"></td>
	  	</tr>
	  	<tr>
			<td>Date</td>
			<td><input type="Date" value="<?php echo $row['emp_hiredate']?>" name="date"  id="date" class="inpt"></td>
		</tr>
		<tr>
			<td>Salary</td>
			<td><input type="number" value="<?php echo $row['emp_salary']?>" name="salary"  id="date" class="inpt"></td>
		</tr>
		<tr>	
	  		<td>Gender</td>
	  		<td><input type="radio" name="gender" value="Male" id="male" <?php echo($row['emp_gender']=='male' || $row['emp_gender']=='Male'?'checked="checked"':'')  ?>  >Male
	  			<input type="radio" name="gender" value="Female" id="female"  <?php echo($row['emp_gender']=='female' || $row['emp_gender']=='Female'?'checked="checked"':'')?> >Female</td>
	  </tr>
	  <tr>
			<td>Status</td>
			<td><input type="radio" name="status" value="1" id="active" <?php echo($row['emp_active']==1?'checked="checked"':'')?>  >Active
	  			<input type="radio" name="status" value="0" id="inactive" <?php echo($row['emp_active']==0?'checked="checked"':'')?>  >InActive</td>
	  <tr>
	  <td></td>
	  <td>
	  	<input type="submit" value="Update" name="update"  id="update" class="btn">
	  	<input type="submit" value="Reset" name="reset"  id="Reset" class="btn">
	  	<input type="submit" value="Back" name="back"  id="back" class="btn">
	  </td>		
	   </table>
		</form>
</body>
</html>
 <?php
  }
  }
 ?>