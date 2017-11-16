<?php
		session_start();
		
		if(!isset($_SESSION['UserName'])&& !isset($_SESSION['Password'])){

				header('location:login.php');
		}
?>
<html>
	<head>
		<title>MainMenu</title>
		<link rel="stylesheet" type="text/css" href="mainmenu.css">
	</head>
	<body>
	  <div id="div1">
		<form action="menuselection.php" method="post">
		  <div >
			<br><input type="submit" name="addemployee" value="Employees" id="add">
			  <div id="comp">	
				<br><input type="submit" name="company" value="Company" id="com" >
			  </div>
		
	
	      </div>
		  <div >
		  	<br><input type="submit" name="product" value="Product" id="pro">
		    <div id="comp"><input type="submit" name="category" value="Categories" id="cat"><br></div>
		 </div>
		
		<div >
			<input type="submit" name="receipt" value="Receipt" id="rec">
			<div id="comp"><input type="submit" name="logout"   value="Logout" id="log"></div>	
		</div>
	</div>
	
	</form>
	<?php
    
    $name=$_SESSION['UserName'];
    $con=mysqli_connect("localhost","root","","ishopmangementsystem");
    $result=mysqli_query($con,"select empT.emp_type from employee emp INNER JOIN employee_type empT ON emp.emptype=empT.emp_type_id where emp_username='$name'");
    while($row=$result->fetch_assoc()){
      $emp_type=$row['emp_type'];
      if($emp_type!="Admin"){
      	echo "<script>
			document.getElementById('add').disabled=true;
			document.getElementById('com').disabled=true;
			document.getElementById('pro').disabled=true;
			document.getElementById('cat').disabled=true;
			
		</script>";
      }
    }

  ?>
</body>

</html>