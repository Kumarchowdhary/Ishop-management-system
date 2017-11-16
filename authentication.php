
 <?php
  
     $host="localhost";
     $username="root";
     $password="";
     $database="ishopmangementsystem";
     $bool=false;
     
     $con=mysqli_connect($host,$username,$password,$database);
     if(isset($_POST['login']))
      {    
       
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(isset($username) && isset($password))
       {
        $sql="select * from employee where emp_username='$username' and emp_password='$password' ";
        $result=$con->query($sql);
        while($row=$result->fetch_assoc())
         {
              $bool=true;
         } 
          if($bool==true){
          
            session_start();
            if(isset($_POST['login'])){
              if(isset($_POST['username'])&&isset($_POST['password'])){
              $name=$_POST['username'];
              $pass=$_POST['password'];
              $_SESSION['UserName']=$name;
              $_SESSION['Password']=$pass;
              header('Location: mainmenu.php');
              }
            }

        }
          else
          echo "<br>Try Again! incorect username or password<br>";
      }  
    }
          
      
  ?>