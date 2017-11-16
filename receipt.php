<?php
    session_start();
    if(!isset($_SESSION['UserName'])&& !isset($_SESSION['Password'])){
          header('location:login.php');
    }
    
?>

<?php
       $con=mysqli_connect("localhost","root","","ishopmangementsystem");
       if(isset($_POST['add']))
       {

         $pdname=$_POST['pdname'];
         $quantity=$_POST['quantity'];
         $empname=$_POST['empname'];
         $price=0;
         $sql_1="select pd_price from product where pd_name='$pdname'";
         $res=$con->query($sql_1);
         while($row=$res->fetch_assoc())
         {
           $price=$row['pd_price'];
         }
         $total=$quantity*$price;
         $sql_2="insert into receipt(pd_name,price,quantity,total,empname) 
                 values('$pdname',$price,$quantity,$total,'$empname')";
         if($con->query($sql_2)==true)
         {

         }
         
       }
       
       if(isset($_POST['back']))
       {
         header('Location: mainmenu.php');
       }
      ?>
<html>
 <head>
 	<title>Reciept</title>
  <link rel="stylesheet" href="receipt.css">
 </head>

<div>
 <body>

<div id="div1">
     <table border="0" cellspadding="3" cellpadding="3" id='fom1'>
      <th>S.No</th>
      <th>Product Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total</th>
      <?php
       $con=mysqli_connect("localhost","root","","ishopmangementsystem");
       if(isset($_POST['add']))
       {
       $sql_1="select * from receipt";
       $res_1=$con->query($sql_1);
       $sr=1;
       while($row=$res_1->fetch_assoc())
         {
          echo "<tr><td><center>$sr</center></td>";
          echo "<td><center>".$row['pd_name']."</center></td>";
          echo "<td><center>".$row['price']."</center></td>";
          echo "<td><center>".$row['quantity']."</center></td>";
          echo "<td><center>".$row['total']."</center></td></tr>";
          $sr++;
         } 
         }
      ?>
      
     </table>	
    </div>


     <form action="receipt.php" method="post">
     <table border="0" cellspacing="5" cellpadding="5" id="div2">
      <th colspan="2" id="txt">Receipt</th>
      <tr>
      	<td>Product Name</td>
      	<td><input type="text" name="pname" class="inpt"></td>
      </tr>
      <tr>
        <td>Available Products</td>
        <td><select name="pdname" class="inpt">
        <?php
                  $host="localhost";
                  $username="root";
                  $password="";
                  $database="ishopmangementsystem";
                  $con=mysqli_connect($host,$username,$password,$database);
                  if(isset($_POST['search'])){
                    if(isset($_POST['pname'])){
                    $name=$_POST['pname'];
                    $sql="SELECT pd_name FROM product WHERE pd_name LIKE '%".$name."%'";
                    $result=$con->query($sql);
                    
                    while($row=$result->fetch_assoc())
                    {
                      
                      echo "<option>".$row['pd_name']."</option>";
                    }

                  echo "</select>";
                }
              }
            ?>
        </td>
      </tr>
      <tr>
        <td>Quantity</td>
        <td><input type="number" name="quantity" class="inpt" ></td>
      </tr>
      <tr>
        <td>Added By</td>
        <td><input type="text" name="empname" class="inpt" ></td>
      </tr>
      <tr>
      <td></td>
       <td>
       <input type="submit" value="Add" name="add" class="btn">
       <input type="submit" value="Back" name="back" class="btn">
       <input type="submit" value="Search" name="search" class="btn">
       </td>
      </tr>

     </table>
    </form>
 </body>
</html>
