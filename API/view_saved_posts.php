<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json;charset=UTF-8");
header("Access-control-Allow-Headers: X-API-KEY,origin,X-Requested-with,content-Type,Accept,Access-Control-Request-Method");
header("Access-control-Allow-Method:GET,POST"); 


include 'dbconfig.php';

$con=new mysqli($host,$user,$pass,$db);
$con->query("set names utf8");


date_default_timezone_set('Asia/Kolkata');
$today_date=date('d/m/yy');
$yesterday_date=date("d/m/yy", strtotime("-1 day"));

$data=json_decode(file_get_contents("php://input"));


$main_arr=array();
$tb_post=array();
$tb_user=array();
$tb_post_img=array();
$tb_post_likes=array();
$tb_comment_count=array();

$domain="https://yash-nasit111.000webhostapp.com";
        
        if(isset($data))
        {
           $q_sp="select * from saved_posts where user_fid='".$data->user_fid."' order by id desc";
           $result_sp=$con->query($q_sp);
            if($result_sp->num_rows>0)
            {
                while($row_sp=$result_sp->fetch_assoc())
    	        {
    	            
    	            $q_post="select * from posts where post_uid='".$row_sp['post_uid']."'";
                    $result_p=$con->query($q_post);
                    
                    if($result_p->num_rows>0)
                    {
                        while($row=$result_p->fetch_assoc())
                        {
                
                            $tb_post['id']=$row['id'];
                            $tb_post['post_uid']=$row['post_uid'];
                           // $tb_post['category']=$row['category'];
                            $tb_post['post_title']=$row['post_title'];
                            $tb_post['post_desc']=$row['post_desc'];
                            $tb_post['user_fid']=$row['user_fid'];
                            $tb_post['post_time']=$row['post_time'];
                    
        
                    
                            if($row['post_date'] == $today_date)
                            {
                                $tb_post['post_date']='Today';
                            }
                            else if($row['post_date'] == $yesterday_date)
                            {
                                $tb_post['post_date']='Yesterday';
                            }
                            else
                            {
                                $tb_post['post_date']=$row['post_date'];
                            }    
                    
                            $sql_cat="select * from category where category_name='".$row['category']."'";
                            $result_cat=$con->query($sql_cat);
                            if($result_cat->num_rows>0)
                            {
                                while($row_cat=$result_cat->fetch_assoc())
                                {
                                    $tb_post['category_id']=$row_cat['id'];
                                    $tb_post['category_name']=$row_cat['category_name'];
                                    $tb_post['category_name_guj']=$row_cat['category_name_gujarati'];
                                }
                             }
                    
                    
                    
                    
                    
                        
                            $sql2="select name,profile_picture,city,state from users where firebase_uid='".$row['user_fid']."'";
                            $result2=$con->query($sql2);
                
                            
                            while($row2=$result2->fetch_assoc())
                            {
                                  $tb_user['name']=$row2['name'];
                                  $tb_user['profile_picture']=$domain.$row2['profile_picture'];
                                  $tb_user['city']=$row2['city'];
                                  $tb_user['state']=$row2['state'];                   
                             
                                    $sql3="select image_url from post_images where post_uid='".$row['post_uid']."'";
                                    $result3=$con->query($sql3);
                                    if($result3->num_rows>0)
                                    {
                                        unset($tb_post_img);
                                        while($row3=$result3->fetch_assoc())
                                        {
                                            
                                           $tb_post_img['post_images'][]=$domain.$row3['image_url'];
                                        }
                                         
                                    }
                                    else
                                    {
                                        $tb_post_img['post_images']=null;
                                    }
                                     $sql4="select * from post_likes where post_uid='".$row['post_uid']."'";
                                        $result4=$con->query($sql4);
                                        if($result4->num_rows>0)
                                        {
                                            $tb_post_likes['post_likes']=mysqli_num_rows($result4);
                                            while($row4=$result4->fetch_assoc())
                                            {
                                                 if($row4['user_fid']==$data->user_fid)
                                                 {
                                                     $isliked['is_liked']=true;
                                                 }
                                                 else
                                                 {
                                                     $isliked['is_liked']=false;
                                                 }                                       
                                             }
                                        }
                                        else
                                        {
                                            $tb_post_likes['post_likes']=null;
                                        }
        
                                        $sql6="select id,user_fid,comment,cmnt_date,cmnt_time from post_comments where post_uid='".$row['post_uid']."' ORDER BY id DESC";
                                        $result6=$con->query($sql6);
        
                                        if($result6->num_rows>0)
                                        {
                                            $tb_comment_count['total_comments']=mysqli_num_rows($result6);
        
                                            unset($tb_comments);
                                            while($row6=$result6->fetch_assoc())
                                            {
                                                $sql_user_name="select name,profile_picture from users where firebase_uid='".$row6['user_fid']."'";
                                                $result_name=$con->query($sql_user_name);
                                                while($row_name=$result_name->fetch_assoc())
                                                {
                                                    $tb_comments['comments'][]=$row6+$row_name;
                                                }
        
                                            // $tb_comments['comments'][]=$row6;
                                            }
        
                                        }else
                                        {
                                            $tb_comment_count['total_comments']='0';
                                            $tb_comments['comments']=null;
                                        }
        
        
        
        
        
                                        $sql5="select * from post_likes where post_uid='".$row['post_uid']."' AND user_fid='".$data->user_fid."'";
                                        $result5=$con->query($sql5);
                                            if($result5->num_rows>0)
                                            {                                      
                                             $isliked['is_liked']=true;     
                                            }
                                            else
                                             {
                                              $isliked['is_liked']=false;
                                             }
                             
                            }
                            $weburl['domain']=$domain;
                             $main_arr[]=$tb_post+$tb_user+$tb_post_img+$tb_post_likes+$isliked+$tb_comment_count+$tb_comments+$weburl;
                        }
               
                   }
    	            
    	            
    	            
    	            
    	        }
            }
            else
            {
                 $main_arr['status']=true;
                 $main_arr['message']='Saved Posts Not Found...';
            }
           
           
          
            
           
        }
        else
        {
            $main_arr['status']=false;
            $main_arr['message']='Invalid Request...';
        } 
        
   
    

echo json_encode($main_arr,JSON_PRETTY_PRINT);

$con->close();
?>
