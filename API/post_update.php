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
        if(!isset($data->post_title))
        {
             $q="UPDATE posts set post_desc='".$data->post_desc."' where post_uid='".$data->post_uid."'";
             $status['msg']='Post Description Updated...';
            
        }
        else if(!isset($data->post_desc))
        {
           $q="UPDATE posts set post_title='".$data->post_title."' where post_uid='".$data->post_uid."'";
           $status['msg']='Post Title Updated...';
        }
        else
        {
              $q="UPDATE posts set post_title='".$data->post_title."',post_desc='".$data->post_desc."' where post_uid='".$data->post_uid."'";
               $status['msg']='Post Title & Description Updated...';
        }
        
         $sql=$con->query($q);
            
            if($sql)
             { 
                 $status['success']=true;
             }
             else
             {
                 $status['false']=false;
                 $status['msg']='SQL Update Error...';
                 
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




