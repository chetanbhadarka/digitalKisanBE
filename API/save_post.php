<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json;charset=UTF-8");
header("Access-control-Allow-Headers: X-API-KEY,origin,X-Requested-with,content-Type,Accept,Access-Control-Request-Method");
header("Access-control-Allow-Method:GET,POST"); 


include 'dbconfig.php';

$con=new mysqli($host,$user,$pass,$db);

$data=json_decode(file_get_contents("php://input"));


    if(isset($data))
    {
        
        $q="select * from saved_posts where post_uid='".$data->post_uid."' AND user_fid='".$data->user_fid."'";
        $result=$con->query($q);
        
            if($result->num_rows==0)
            {
                
               $q2="insert into saved_posts(post_uid,user_fid) values('".$data->post_uid."','".$data->user_fid."')" ;
               if($con->query($q2))
               {
                   $status['success']=true;
                   $status['msg']='Post Successfully Saved...';
               }
            
                 
            }
            else
            {
                $status['success']=true;
                $status['msg']='This Post is Already Saved...';
            }
        
    }
    else
    {
        $status['success']=false;
        $status['msg']='Invalid Request...';
    }

echo json_encode($status);

$con->close();
?>




