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
  
        $q="select * from users where mobileno=$data->mobileno";
        $sql=$con->query($q);
        
        if($sql->num_rows>0)
        {
            $name['status']=true;
	           $name['domain']='http://yash-nasit111.000webhostapp.com';
            	while($row=$sql->fetch_assoc())
	            {
	               
	               $arr=$name+$row;
            	}
        }
        else
        {
            $arr['status']=false;
            
        } 
        
}
else
{
    $arr['status']=false;
    $arr['message']='SQL Select Error...';
}
echo json_encode($arr);

$con->close();
?>
