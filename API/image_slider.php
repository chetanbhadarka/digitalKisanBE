<?php 
header('Access-Control-Allow-Origin: http://localhost:8100');
header("Content-Type:application/json;charset=UTF-8");
header("Access-control-Allow-Headers: X-API-KEY,origin,X-Requested-with,content-Type,Accept,Access-Control-Request-Method");
header("Access-control-Allow-Method:GET,POST"); 


include 'dbconfig.php';

$con=new mysqli($host,$user,$pass,$db);

        $result=array();
         $sql="select * from slider";
         $data=$con->query($sql);
        $url="http://yash-nasit111.000webhostapp.com/";
         
         
          while($row =mysqli_fetch_assoc($data))  
          {
             
                  $arr['id']=$row['id'];
	              $arr['img_url']=$url.$row['img_url'];
	              array_push($result,$arr);
             
           }
           
          
     
 echo json_encode($result,JSON_PRETTY_PRINT);

$con->close();
?>
