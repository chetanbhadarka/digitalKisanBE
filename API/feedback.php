<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json;charset=UTF-8");
header("Access-control-Allow-Headers: X-API-KEY,origin,X-Requested-with,content-Type,Accept,Access-Control-Request-Method");
header("Access-control-Allow-Method:GET,POST"); 


include 'dbconfig.php';

$con=new mysqli($host,$user,$pass,$db);

$data=json_decode(file_get_contents("php://input"));
$arr=array();

if(isset($data))
{

         $sql="insert into feedback(name,email,mobileno,message) values('$data->name','$data->email','$data->mobileno','$data->message')";
        
        if($con->query($sql))
        {
            $arr['status']=true;
            
        }
        else
        {
            $arr['status']=false;
            $arr['message']='Data Insert Error..';
        } 

}

echo json_encode($arr);

$con->close();
?>
