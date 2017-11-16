<?php
 $con=mysqli_connect("localhost","root","","ishopmangementsystem");
 if(isset($_POST['add']))
 {
   
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
     echo "Record sucessfully added<br>"; 
    else
     echo "Record isn't sucessfully added<br>";

 }

?>