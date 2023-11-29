<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json;charset=UTF-8");
header("Access-control-Allow-Headers: X-API-KEY,origin,X-Requested-with,content-Type,Accept,Access-Control-Request-Method");
header("Access-control-Allow-Method:GET,POST"); 


include 'dbconfig.php';

$con=new mysqli($host,$user,$pass,$db);

date_default_timezone_set('Asia/Kolkata');

$arr=array();

if($_POST['user_fid'])
{
    
     $today_date=date('d/m/yy');
     $current_time = date("h:i A");
     $post_unqid='DK'.date('dmy').uniqid();
    
    
    $q="insert into posts (post_uid,category,post_title,post_desc,user_fid,post_date,post_time) values(
        '".$post_unqid."',
        '".$_POST['category']."',
        '".$_POST['post_title']."',
        '".$_POST['post_desc']."',
        '".$_POST['user_fid']."',
        '".$today_date."',
        '".$current_time."')";
        
        
        if($con->query($q))
        {
                if(isset($_FILES["postimgs"]))
                {
                    $post_uid=$post_unqid;
                    $domain="http://yash-nasit111.000webhostapp.com";
                    
                    $targetDir = "../images/post_images/".$post_uid."/";
                    if (!file_exists($targetDir)) 
                    {
                         mkdir($targetDir, 0777, true);
                    }
   
                    foreach ($_FILES['postimgs']['tmp_name'] as $key => $val ) {
                
                        $filename = $_FILES['postimgs']['name'][$key];
                        $filetempname = $_FILES['postimgs']['tmp_name'][$key];
                        
                        
                        $targetFilePath = $targetDir.$filename;
                        $dburl='/images/post_images/'.$post_uid.'/'.$filename;
                
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                       
                
                        // here your insert query
                         
                            if(move_uploaded_file($_FILES["postimgs"]["tmp_name"][$key], $targetFilePath))
                            {
                                $sql="insert into post_images (post_uid,image_url) values('".$post_uid."','".$dburl."')";
                      
                                  if($con->query($sql))
                                  {
                                      $arr['status']=true;
                                    
                                  }
                                  else
                                  {
                                    $arr['status']=false;
                                    $arr['message']='images tabble insert Error..';
                                  }
                     
                              }
                              else
                              {
                                  $arr['status']=false;
                                  $arr['message']="File Move Error...";
                                  
                              }
                        
                        
                    }
    

                }
                else
                {
                     $arr['status']=true;
                }
                    
        }
        else
        {
            $arr['status']=false;
            $arr['message']='posts table insert Error..';
        }
        
        
}



echo json_encode($arr);

$con->close();
?>
