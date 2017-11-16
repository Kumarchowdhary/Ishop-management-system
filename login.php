<?php
      session_start();
      if(isset($_SESSION['UserName'])&& isset($_SESSION['Password'])){
              header('location:mainmenu.php');
      }
      
?>

<html>
<head>
  <title>Login</title>
  <script>
    function valid(){
    var username=document.getElementById('username').value;
    var password=document.getElementById('password').value;
    if(!username||!password){
      return false;
    }
    
    
    
}
  
  </script>
  <style type="text/css">
  body{
    background: rgb(188,187,187);
  }
      #login{
        margin-top:5%;
        width: 25%;
        height: auto;
        background:#8C9591;
        float: right;
        margin-right: 15%;
        padding:25px;
        border: none;
        border-radius: 10px;
        color:black;
        font-size: 20px;
        font-family: "Arial ";
        box-shadow: 1px 7px 50px 15px #566573;
        }
      .inpt{
        width: 100%;
        height: 45px;
        font-family:"Comic Sans MS";
        padding-left: 10px;
        border-radius: 5px;
        border: none;
        background: #E5E7E9;
        font-size: 18px;
      }
      .btn{
        
        width:100%;
        height: 40px;
        border: none;
        border-radius:10px;
        font-size: 15px; 
        font-family:"Comic Sans MS";
        font-weight: bold;
        background: #808B96;
      
      }
      .btn:hover{
        background:#95A5A6;
      }
      .btn:active{ 
        background: #808B96;
      }
      .img{
        width: 500px;
        height: 300px;
        margin-left: 100px;
        margin-top: 100px;
      }
      #cart{
        width: 150px;
        height: 150px;
        padding-left:25%;
         
      }
  </style>
 </head>
  
  <body >
   <img src="iShopWeb.png" class="img">

   <div id="login">
   <img src="cart.png" width="100px" height="100px" id="cart">
   <form action="authentication.php" method="post" onsubmit="return valid()">
    <br />
    
    <input type="text"  name="username" placeholder="Username" class="inpt" id="username"><br>
    <br>
    <input type="password"  name="password" placeholder="Password" class="inpt" id="password"><br><br>
    <input type="submit" value="Login" name="login" class="btn"><br/><br/>
    <input type="Reset" value="Reset" class="btn">
   </form>
  </div>
  
  </body>
</html>
