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
       
             $q="delete from posts where post_uid='".$data->post_uid."'";
             $sql=$con->query($q);
             if($sql)
             {
                
                 $q2="delete from post_images where post_uid='".$data->post_uid."'";
                 $sql2=$con->query($q2);
                 if($sql2)
                 {
                     $q3="delete from post_likes where post_uid='".$data->post_uid."'";
                     $sql3=$con->query($q3);
                     
                     if($sql3)
                     {
                          $q4="delete from post_comments where post_uid='".$data->post_uid."'";
                          $sql4=$con->query($q4);
                          if($sql4)
                          {
                              
                              $q5="delete from saved_posts where post_uid='".$data->post_uid."'";
                              $sql5=$con->query($q5);
                              if($sql5)
                              {
                                $status['success']=true;
                                $status['msg']='Post Successfully Deleted...';  
                              }
                              
                          }
                          
                     }
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




