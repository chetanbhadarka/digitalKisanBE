<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type:application/json;charset=UTF-8");
header("Access-control-Allow-Headers: X-API-KEY,origin,X-Requested-with,content-Type,Accept,Access-Control-Request-Method");
header("Access-control-Allow-Method:GET,POST"); 


include 'dbconfig.php';

$con=new mysqli($host,$user,$pass,$db);

$data=json_decode(file_get_contents("php://input"));


$url = "https://api.postalpincode.in/pincode/".$data->pincode;
$pincodedata = file_get_contents($url);
$pincodedata= json_decode($pincodedata);






if(isset($data))
{
    if(isset($pincodedata[0]->PostOffice['0']))
    {
        
        $state=$pincodedata[0]->PostOffice['0']->State;
        $city=$pincodedata[0]->PostOffice['0']->Block;
        $district=$pincodedata[0]->PostOffice['0']->District;
        //$uid=uniqid('kd');;
        $default_dp='/images/profile_pictures/blank-dp.jpg';
        $domain='http://yash-nasit111.000webhostapp.com';
        
        
        
        
         $sql="insert into users(firebase_uid,name,email,mobileno,gender,profile_picture,pincode,district,city,state) values('$data->firebase_uid','$data->name','$data->email','$data->mobileno','$data->gender','$default_dp','$data->pincode','$district','$city','$state')";
        
        if($con->query($sql))
        {
            $arr['status']=true;
            $arr['firebase_uid']=$data->firebase_uid;
            $arr['name']=$data->name;
            $arr['gender']=$data->gender;
            $arr['dp_url']=$domain.$default_dp;
            $arr['email']=$data->email;
            $arr['mobileno']=$data->mobileno;
            $arr['pincode']=$data->pincode;
            $arr['district']=$district;
            $arr['city']=$city;
            $arr['state']=$state;
        }
        else
        {
            $arr['status']=false;
            $arr['message']='Data Insert Error..';
        } 
        
    }
    else
    {
        $arr['status']=false;
        $arr['message']='invalid pincode';
    }
    

}
else
{
    $arr['status']=false;
    $arr['message']='Please Fill All Fields';
}
echo json_encode($arr);

$con->close();
?>
