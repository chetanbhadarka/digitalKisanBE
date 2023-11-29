<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json;charset=UTF-8");
header("Access-control-Allow-Headers: X-API-KEY,origin,X-Requested-with,content-Type,Accept,Access-Control-Request-Method");
header("Access-control-Allow-Method:GET,POST"); 


include 'dbconfig.php';

$domain='http://yash-nasit111.000webhostapp.com';

$con=new mysqli($host,$user,$pass,$db);

$data=json_decode(file_get_contents("php://input"));


    if(isset($data))
    {
            $url = "https://api.postalpincode.in/pincode/".$data->pincode;
            $pincodedata = file_get_contents($url);
            $pincodedata= json_decode($pincodedata);


             if(isset($pincodedata[0]->PostOffice['0']))
             {
                 $state=$pincodedata[0]->PostOffice['0']->State;
                 $city=$pincodedata[0]->PostOffice['0']->Block;
                 $district=$pincodedata[0]->PostOffice['0']->District;

                 $q="UPDATE users set name='".$data->name."',email='".$data->email."',gender='".$data->gender."',pincode='".$data->pincode."',district='".$district."',city='".$city."',state='".$state."' where firebase_uid='".$data->user_fid."'";
        
                    $sql=$con->query($q);
                    if($sql)
                    { 
                       
                         $q2="select * from users where firebase_uid='".$data->user_fid."'";
                         $result2=$con->query($q2);
                         if($result2->num_rows>0)
                         {
                            while($row2=$result2->fetch_assoc())
                            {
                                $status['status']=true;
                                $status['firebase_uid']=$row2['firebase_uid'];
                                $status['name']=$row2['name'];
                                $status['gender']=$row2['gender'];
                                $status['dp_url']=$domain.$row2['profile_picture'];
                                $status['email']=$row2['email'];
                                $status['mobileno']=$row2['mobileno'];
                                $status['pincode']=$row2['pincode'];
                                $status['district']=$row2['district'];
                                $status['city']=$row2['city'];
                                $status['state']=$row2['state'];
                               
                               
                            }
                         }
                    }
                    else
                    {
                         $status['status']=false;
                         $status['msg']='SQL Update Error...';
                         
                    }

             }
             else
             {
                         $status['status']='PicodeError';
                         $status['msg']='Invalid Pincode...';
             }
   
    }
    else
    {
        $status['status']=false;
        $status['msg']='Invalid Request...';
    }

echo json_encode($status);

$con->close();
?>