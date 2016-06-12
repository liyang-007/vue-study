<?php
session_start();
 include_once("config.php");
 include_once("class.php");
$db=new DB_Connect($db_name,$db_host,$db_user,$db_pass);
setcookie('user',$_POST['name']);
 if(isset($_POST["submit"]))  
  {  
    $user = $_POST["name"];  
    $psw = $_POST["password"];  
   if($user == "" || $psw == "")  
    {  
    echo "<script>alert('请输入用户名或密码！');</script>";  
    }  
   else  
    {  
      setcookie("user",$_POST['name']);
      echo $_COOKIE['user'];
      $sql = "select name,password from user where name = '$_POST[name]' and password = '$_POST[password]'";  
      $result = mysql_query($sql);  
      $num = mysql_num_rows($result);  
 if($num)  
  {  
    $row = mysql_fetch_array($result);//将数据以索引方式储存在数组中。       
      echo $row[0]; 
      header("Location:index2.php"); 
  }  
  else  
    {  
     echo "<script>alert('用户名或密码不正确！');</script>";  
    }  
   }   
  }  
?>  
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8"/>
    <script src=""></script>
      <style>
       body {
                   margin:0px;
	             padding:0px 0px;
                   background-image:url(3.jpg);
	}
       #ab { 
                   width:75%;
          	      height:400px;
          	      position:absolute;
          	      left:12.5%;
          	      top:250px;
             }
      #z1{
                   width:75%;
              	height:400px;
              	position:absolute;
              	top:130px;
              	left:12.5%;
            }
      </style>
  </head> 
  <body>
  <center>
  <h1 id="z1">登陆</h1>
    <h1>
     <div id="ab">
      <form method="post" action="index.php" >
        <label> 用户名：</label>
        <input type="text" name="name" required placeholder="your Full name" autofocus /></input><br/>
        <br/>
        <label>密&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
        <input type="password" name="password" autofocus requird placeholder="一到八的字符" /></input></br>
        <br/>
        <input type="submit" name="submit" value="登陆">&nbsp;&nbsp;
      </form>
     </div>
    </h1>
  </center>
 </body>
</html>
