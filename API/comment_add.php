<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json;charset=UTF-8");
header("Access-control-Allow-Headers: X-API-KEY,origin,X-Requested-with,content-Type,Accept,Access-Control-Request-Method");
header("Access-control-Allow-Method:GET,POST"); 


include 'dbconfig.php';

$con=new mysqli($host,$user,$pass,$db);

$data=json_decode(file_get_contents("php://input"));

date_default_timezone_set('Asia/Kolkata');
$comments=array();

 $comments['domain']='https://yash-nasit111.000webhostapp.com';

    if(isset($data))
    {
        $today_date=date('d/m/yy');
        $current_time = date("h:i A");
       
            $q="insert into post_comments(post_uid,user_fid,comment,cmnt_date,cmnt_time) values('".$data->post_uid."','".$data->user_fid."','".$data->comment."','".$today_date."','".$current_time."')";
            $sql=$con->query($q);
            
            if($sql)
             { 
                
                $sql2="select id,user_fid,comment,cmnt_date,cmnt_time from post_comments where post_uid='".$data->post_uid."' ORDER BY id DESC";
                $result2=$con->query($sql2);

                if($result2->num_rows>0)
                {
                 $comments['total_comments']=mysqli_num_rows($result2);
                
                    while($row2=$result2->fetch_assoc())
                    {
                        //$comments[]=$row2;
                        
                            $sql_user_details="select name,profile_picture from users where firebase_uid='".$row2['user_fid']."'";
                            $result3=$con->query($sql_user_details);
                            while($row3=$result3->fetch_assoc())
                            {
                              $comments['comments'][]=$row2+$row3; 
                            }
                    }


                }
             }
         
    }
    else
    {
        $comments['success']=false;
        $comments['msg']='Invalid Request...';
    }

echo json_encode($comments);

$con->close();
?>




