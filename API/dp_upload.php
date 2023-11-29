<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json;charset=UTF-8");
header("Access-control-Allow-Headers: X-API-KEY,origin,X-Requested-with,content-Type,Accept,Access-Control-Request-Method");
header("Access-control-Allow-Method:GET,POST"); 


include 'dbconfig.php';

$con=new mysqli($host,$user,$pass,$db);

$arr=array();




if(isset($_FILES["dp"]["name"]))
{
    $fid=$_POST['fid'];
    
    $targetDir = "../images/profile_pictures/".$_POST['fid']."/";
    $filename = $_FILES["dp"]["name"];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
   
    $targetFilePath = $targetDir.$filename;
    
    $dburl='/images/profile_pictures/'.$_POST['fid'].'/'.$filename;
    $domain="http://yash-nasit111.000webhostapp.com";
    
    
    if (!file_exists($targetDir)) 
    {
         mkdir($targetDir, 0777, true);
    }
   
    
    
  if(move_uploaded_file($_FILES["dp"]["tmp_name"], $targetFilePath))
  {
      $sql="UPDATE users set profile_picture='".$dburl."' where firebase_uid='".$fid."'";
      
      if($con->query($sql))
      {
          $arr['status']=true;
          $arr['dp_url']=$domain.$dburl;
        
      }
      else
      {
        $arr['status']=false;
        $arr['message']='Update Error..';
      }
     
  }
  else
  {
      $arr['status']=false;
      $arr['message']="File Move Error...";
      
  }
      

}
echo json_encode($arr);

$con->close();
?>
