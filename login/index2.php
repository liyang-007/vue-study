<html>
 <head>
  <meta charset="utf-8" />
        <style>
        #a1{
                  position:absolute;
                  left:95%;
                  top:1px;
         }
         body{
      	           border:solid 1px red;
         }
        </style>
    </head>
    <body>
     <?php
     include_once("config.php");
     $id = mysql_connect($db_host,$db_user,$db_pass); 
     mysql_select_db($db_name) or die("选择失败");
     $sql = "select * from user where name='".$_COOKIE['user']."'";
     mysql_query("set names utf8");
     $result = mysql_query($sql,$id);
     if($result){
       echo "<table><tr><td>id</td><td>姓名</td><td>密码</td><td>性别</td><td>年龄</td></tr>";
     while($row = mysql_fetch_array($result)){
       echo "<tr><td>" . $row['id']  . "&nbsp" . "</td><td>"  . $row['name'] . "&nbsp" . "</td><td>" .$row['password'] . "</td><td>" . $row['sex'] . "</td><td>" . "&nbsp" . $row['age'] . "</td></tr>";
         }
        echo "</table>";
      }
     
      else {
        echo "<p>链接失败</p>";
      }
?>
      <h2 id="a1"><a href="index.php">返回</a></h2>
    </body>
 </html>
