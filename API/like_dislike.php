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
        if($data->is_liked=='true')
        {
             $q="delete from post_likes where post_uid='".$data->post_uid."' AND user_fid='".$data->user_fid."'";
             $sql=$con->query($q);
             
             if($sql)
             {
                 $status['success']=true;
                 $status['is_liked']=false;
             }
             
        }
        else
        {
            $q="insert into post_likes(post_uid,user_fid) values('".$data->post_uid."','".$data->user_fid."')";
            $sql=$con->query($q);
            
            if($sql)
             { 
                 $status['success']=true;
                 $status['is_liked']=true;
             }
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




