<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json;charset=UTF-8");
header("Access-control-Allow-Headers: X-API-KEY,origin,X-Requested-with,content-Type,Accept,Access-Control-Request-Method");
header("Access-control-Allow-Method:GET,POST"); 


include 'dbconfig.php';

$con=new mysqli($host,$user,$pass,$db);

$data=json_decode(file_get_contents("php://input"));
$status=array();

    if(isset($data))
    {
      
       
            $q="delete from saved_posts where post_uid='".$data->post_uid."' AND user_fid='".$data->user_fid."'";
            $sql=$con->query($q);
            
            if($sql)
             { 
                 $status['success']=true;
                 $status['msg']='Saved Post Successfully Deleted...';
             }
             else
             {
                 $status['success']=false;
                 $status['msg']='Error While Deleting Post....';
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




