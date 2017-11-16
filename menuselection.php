
<html>
 <body>
  
  <?php
   if(isset($_POST['addemployee']))
   {
     header('Location: addemployee.php');
   }

   else if(isset($_POST['company']))
   {
     header('Location: company.php');
   }

   else if(isset($_POST['category']))
   {
     header('Location: category.php');
   }

   else if(isset($_POST['product']))
   {
     header('Location:product.php');
   }

   else if(isset($_POST['receipt']))
   {
     header('Location: receipt.php');
   }

   else if(isset($_POST['logout']))
   {
      session_start();
      session_unset();
      header('location:login.php');
   }

  ?>


 </body>


</html>