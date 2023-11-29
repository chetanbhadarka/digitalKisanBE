<?php
header('Access-Control-Allow-Origin: *');
//header("Content-Type:application/json;charset=UTF-8");
header("Access-control-Allow-Headers: X-API-KEY,origin,X-Requested-with,content-Type,Accept,Access-Control-Request-Method");
header("Access-control-Allow-Method:GET,POST"); 


include '../dbconfig.php';
$con=new mysqli($host,$user,$pass,$db);
$arr=array();

if(isset($_FILES))
{
    $arr['status']=true;
    
   print_r($_FILES);
    
    foreach($_FILES['postimgs']['tmp_name'] as $key => $val ) {
    
        echo $_FILES['postimgs']['name'][$key];
    
    }
}
   
//echo json_encode($arr);
?>
