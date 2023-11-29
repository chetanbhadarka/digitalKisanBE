<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json;charset=UTF-8");
header("Access-control-Allow-Headers: X-API-KEY,origin,X-Requested-with,content-Type,Accept,Access-Control-Request-Method");
header("Access-control-Allow-Method:GET,POST"); 


include 'dbconfig.php';

date_default_timezone_set('Asia/Kolkata');
$today_date=date('d/m/yy');
$yesterday_date=date("d/m/yy", strtotime("-1 day"));

$con=new mysqli($host,$user,$pass,$db);
$con->query("set names utf8");

$data=json_decode(file_get_contents("php://input"));

$sql="Select * From posts where category='".$data->category."' order by id desc";
$result=$con->query($sql);

$domain="https://yash-nasit111.000webhostapp.com";

$main_arr=array();
$tb_post=array();
$tb_user=array();
$tb_post_img=array();
$tb_post_likes=array();

        if($result->num_rows>0)
        {
            	while($row=$result->fetch_assoc())
	        	{
	            
		            $tb_post['id']=$row['id'];
		            $tb_post['post_uid']=$row['post_uid'];
		            $tb_post['category']=$row['category'];
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
                                    $tb_post_likes['post_likes']='0';
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
	        	                     $main_arr[]=$tb_post+$tb_user+$tb_post_img+$tb_post_likes+$isliked;
                            }
                            else
                	        {
                	                 $main_arr[]=$tb_post+$tb_user+$tb_post_likes+$isliked;
                	        }
             	     
                    }
                }
        }
	    else
	    {
	        $main_arr['status']=false;
	        $main_arr['message']='Data Read Error..';
	    } 
        
   
    

echo json_encode($main_arr,JSON_PRETTY_PRINT);

$con->close();
?>
