<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json;charset=UTF-8");
header("Access-control-Allow-Headers: X-API-KEY,origin,X-Requested-with,content-Type,Accept,Access-Control-Request-Method");
header("Access-control-Allow-Method:GET,POST"); 


include 'dbconfig.php';

$con=new mysqli($host,$user,$pass,$db);
$con->query("set names utf8");

$data=json_decode(file_get_contents("php://input"));

$sql="Select * From posts where category='".$data->category."' order by id desc";
$result=$con->query($sql);
$arr=array();
        
        if($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
	        {
	            
	            $sql2="select name,profile_picture,city,state from users where firebase_uid='".$row['user_fid']."'";
	            $result2=$con->query($sql2);
	            
	            $name['domain']="https://yash-nasit111.000webhostapp.com";
	            
	            while($row2=$result2->fetch_assoc())
	               {
	                  $arr[]=$row+$name+$row2;
	                  
	               }
	            
	              
	             
            	    
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
