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
  $sql="delete from employee where emp_id=$did";
 if($con->query($sql)==true)
 { 	
 }

 }
 if(isset($_POST['update']))
 {
  $eid=$_POST['id'];
  $type=$_POST['type'];
  $name=$_POST['empname'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $address=$_POST['address'];
  $contact=$_POST['contact'];
  $date=$_POST['date'];
  $salary=$_POST['salary'];
  $gender=$_POST['gender'];
  $status=$_POST['status'];
  $type_id=0;

  $sql1="select emp_type_id from employee_type where emp_type='$type'";
  $res=$con->query($sql1);
  while($row=$res->fetch_assoc())
  {
   $type_id=$row['emp_type_id'];
  }
	
  $sql2="update employee set emp_name='$name' , emp_username='$username',
  emp_password='$password' , emp_address='$address' , emp_cellno='$contact'
  ,emp_hiredate='$date' , emp_salary=$salary , emp_gender='$gender' ,emp_active=$status
  ,emp_type_id=$type_id where emp_id=$eid";
  if($con->query($sql2)==true)
  {
  }

 }

 if(isset($_POST['add']))
 {
   $emp_type="";
   $type=$_POST['type'];
   $emp_name=$_POST['empname'];
   $emp_username=$_POST['username'];
   $emp_password=$_POST['password'];
   $emp_address=$_POST['address'];
   $emp_contact=$_POST['contact'];
   $emp_date=$_POST['date'];
   $emp_gender=$_POST['gender'];
   $emp_status=$_POST['status'];
   $emp_salary=$_POST['salary'];
   
   $sql_1="select * from employee_type where emp_type='$type' ";
   $res=$con->query($sql_1);
   while($row=$res->fetch_assoc())
   {
    $emp_type=$row['emp_type_id'];
   }
   $sql_2="insert into employee(emp_name,emp_username,emp_password,emp_gender,emp_address,emp_cellno,emp_hiredate,emp_salary,emp_active,emp_type_id) values('$emp_name','$emp_username','$emp_password','$emp_gender','$emp_address',$emp_contact,'$emp_date',$emp_salary,$emp_status,$emp_type)";
   if($con->query($sql_2)==true)
   { 	
   }

 }

if(isset($_POST['back'])){
    header('location:mainmenu.php');
  }
?>
<html>
 <head>
  <title>AddEmployee</title>
  <link rel="stylesheet" type="text/css" href="addemployee.css">
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
     /*if(!name||!username||!pass||!repass||!address||!contact||!date||!salary){
          return false;
     }*/
     
      if(pass==repass){	
        return true;
        } 
        else{
          alert("Passwords don't match");	
            return false;
          }

      }
    
    </script>
 </head>
  <body>
	
	<?php
	echo "<div id='tble'><table border='0' id='fom1'>
  <caption><font size='5'>Employee Details</font></caption>
	 <tr>
	 <th>Employee Name</th>
	 <th>Employee Username</th>
	 <th>Employee Gender</th>
	 <th>Employee Salary</th>
	 <th>Employee Status</th>
	 <th>Edit</th>
	 <th>Delete</th>
     </tr>";
	
 $con=mysqli_connect("localhost","root","","ishopmangementsystem");
 $sql="select * from employee";
 $res=$con->query($sql);
 while($row=$res->fetch_assoc())
 {
   echo "<tr><td><center>".$row["emp_name"]."</center></td><td><center>".$row['emp_username'].
   "</center></td><td><center>".$row['emp_gender']."</center></td><td><center>".
   $row['emp_salary']."</center></td><td><center>".$row['emp_active']."</center></td>";
   echo "<td><center><a href='edit_employee.php?eid=".$row["emp_id"]."'><img src='edit.png' height='40px' width='40px'></a></center></td>";
   echo "<td><center><a href='addemployee.php?did=".$row["emp_id"]."'><img src='del.png' width='40px' height='40px'></a></center></td></tr>";

 }
 echo "</table></div>";

?>
	<br><br>
  <div  >
  
     <form  action="addemployee.php" method="POST" onsubmit="return check();" >
	   
     <table border="0" cellspacing="3" cellpadding="3" width="100%" height="auto" id="fom">
      <th id="txt" colspan="2">Add Employee</th>
    <tr>
      <td >EmployeeType</td>	
	     <td ><select id="list" name="type" class="inpt">
                <?php
		            $con=mysqli_connect("localhost","root","","ishopmangementsystem");
                $sql="select * from employee_type";
		            $res=$con->query($sql);
		            while($row=$res->fetch_assoc())
		                {
		                  echo "<option>".$row['emp_type']."</option>";  
		                }
                  ?>
	             </select>
        </td>
    </tr>
	  <tr>
      <td>Employee Name</td>
      <td><input type="text" name="empname" placeholder="EmployeeName" id="emp" class="inpt"></td>
    </tr>
	  <tr>
        <td>UserName</td>
        <td><input type="text" name="username" placeholder="UserName"  id="user" class="inpt"></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="password"  placeholder="Password" id="pass" class="inpt"></td>
    </tr>   
	  <tr>
      <td>RetypePassword</td>
      <td><input type="password" name="repassword"  placeholder="RetypePassword" id="repass" class="inpt"></td>
    </tr>
    <tr>
	     <td>Address</td>
       <td><input type="text" name="address" placeholder="Address" id="address" class="inpt"></td>
	  </tr>
    <tr>
      <td>ContactNo</td>
      <td><input type="number" name="contact" placeholder="ContactNo" id="con" class="inpt"></td>
     </tr>
     <tr> 
	     <td>Date</td>
       <td><input type="Date" name="date"  id="date" class="inpt"></td>
      </tr>
      <tr> 
	       <td>Salary</td>
         <td><input type="number" name="salary"  id="salary" class="inpt" placeholder="Salary"></td>
      </tr>
      <tr>  
	       <td>Gender</td>
         <td><input type="radio" name="gender" value="Male" id="male" checked >Male
	  <input type="radio" name="gender" value="Female" id="female" >Female</td>
	  <tr>
      <td>Status</td>
      <td><input type="radio" name="status" value="1" id="active" checked >Active
	  <input type="radio" name="status" value="0" id="inactive" >InActive</td></tr>
    <tr>
    <td>
	     
	  </td>
    <td>
       <input type="submit" value="Add" name="add"  id="add" class="btn">  
       <input type="reset" value="Reset" name="reset"  id="Reset" class="btn">
       <input type="submit" value="Back" name="back"  id="Back" class="btn">		
	  </td>
    </tr>
     
		</table>
    </form>
    </div>
</body>

</html>