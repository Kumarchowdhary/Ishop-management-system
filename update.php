<?php
    session_start();
    if(!isset($_SESSION['UserName'])&& !isset($_SESSION['Password'])){
          header('location:login.php');
    }
    
?>
<?php
 $con=mysqli_connect("localhost","root","","ishopmangementsystem");

 if(isset($_GET['eid']){
   $eid=$_GET['eid'];
   $type=$_GET['type'];
   $emp_name=$_GET['empname'];
   $emp_username=$_GET['username'];
   $emp_password=$_GET['password'];
   $emp_address=$_GET['address'];
   $emp_contact=$_GET['contact'];
   $emp_date=$_GET['date'];
   $emp_gender=$_GET['gender'];
   $emp_status=$_GET['status'];
   $emp_salary=$_GET['salary'];
   
   $sql_1="select * from employee_type where emp_type='$type' ";
   $res=$con->query($sql_1);
   while($row=$res->fetch_assoc())
   {
    $emp_type=$row['emp_type_id'];
   }
   $sql_2="update employee set emp_name='$emp_name',emp_username='$emp_username'
   ,emp_password='$emp_password'
   ,emp_gender='$emp_gender'
   ,emp_address='$emp_address'
   ,emp_cellno=$emp_contact
   ,emp_hiredate='$emp_date'
   ,emp_salary=$emp_salary
   ,emp_active=$emp_status
   ,emp_type_id=$emp_type where emp_id=$eid";
   
   if($con->query($sql_2)==true)
     echo "Record sucessfully added<br>"; 
    else
     echo "Record isn't sucessfully added<br>";

 }

?>
<html>
 <head>
  <script>
    function check()
    {
     var name=document.getElementById("emp").value;
     var username=document.getElementById("user").value;
     var pass=document.getElementById("pass").value;
     var repass=document.getElementById("repass").value;
     var address=document.getElementById("address").value;
     var contact=document.getElementById("con").value;
     var date=document.getElementById("date").value;
     var salary=document.getElementById("salary").value;
     if(!name||!username||!pass||!repass||!address||!contact||!date||!salary){
          return false;
     }
     else{
          if(pass==repass){ 
          return true;
          } 
          else{
              alert("Passwords don't match"); 
              return false;
            }

      }
    }
    </script>


 </head>

 
 <body>

   <form id="form" action="addemployee_details.php" method="POST" 
      onsubmit="return check();">
	   <fieldset id="fieldset">
	    <legend>AddEmployee</legend>
	    <label style="font-size:20px;">EmployeeType</label>	
	  <select id="list" name="type">
		<?php
		 $con=mysqli_connect("localhost","root","","ishopmangementsystem");
         $sql="select * from employee_type";
		 $res=$con->query($sql);
		 while($row=$res->fetch_assoc())
		 {
		  echo "<option>".$row['emp_type']."</option>";  
		 }
        ?>
	  </select><br><br>
	  <label style="font-size:20px;">EmpName</label><input type="text" name="empname" placeholder="EmployeeName" onfocus="this.placeholder=''" id="emp"><br><br>
	  <label style="font-size:20px;">UserName</label><input type="text" name="username" placeholder="UserName" onfocus="this.placeholder=''" id="user"><br><br>
	  <label style="font-size:20px;">Password</label><input type="password" name="password"  placeholder="Password" onfocus="this.placeholder=''" id="pass"><br><br>
	  <label style="font-size:20px;">RetypePassword</label><input type="password" name="repassword"  placeholder="RetypePassword" onfocus="this.placeholder=''" id="repass"><br><br>
	  <label style="font-size:20px;">Address</label><input type="text" name="address" placeholder="Address" onfocus="this.placeholder=''" id="address"><br><br>
	  <label style="font-size:20px;">ContactNo</label><input type="number" name="contact" placeholder="ContactNo" onfocus="this.placeholder=''" id="con"><br><br>
	  <label style="font-size:20px;">Date</label><input type="Date" name="date"  id="date"><br><br>
	  <label style="font-size:20px;">Salary</label><input type="number" name="salary"  id="date"><br><br>
	  <label style="font-size:20px;">Gender</label><input type="radio" name="gender" value="Male" id="male" checked >Male
	  <input type="radio" name="gender" value="Female" id="female" >Female<br><br>
	  <label style="font-size:20px;">Status</label><input type="radio" name="status" value="1" id="active" checked >Active
	  <input type="radio" name="status" value="0" id="inactive" >InActive<br><br>
	  <input type="submit" value="Add" name="add"  id="add">
	  <input type="submit" value="Update" name="update"  id="update">
	  <input type="submit" value="Delete" name="delete"  id="delete">	
	  <input type="reset" value="Reset" name="reset"  id="Reset">
	  <input type="submit" value="Back" name="back"  id="back">		
	   </fieldset>
		</form>
</body>

</html>

?>