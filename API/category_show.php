<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json;charset=UTF-8");
header("Access-control-Allow-Headers: X-API-KEY,origin,X-Requested-with,content-Type,Accept,Access-Control-Request-Method");
header("Access-control-Allow-Method:GET,POST"); 


include 'dbconfig.php';

$con=new mysqli($host,$user,$pass,$db);
$con->query("set names utf8");
$sql="Select * From category";
$result=$con->query($sql);
$arr=array();
        
        if($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
	        {
	              
	              $name['domain']='http://yash-nasit111.000webhostapp.com';
            	  $arr[]=$name+$row;
	       }
           // $arr['status']=true;
            
           
        }
        else
        {
            $arr['status']=false;
            $arr['message']='Data Read Error..';
        } 
        
   
    

echo json_encode($arr,JSON_PRETTY_PRINT);

$con->close();
?>
