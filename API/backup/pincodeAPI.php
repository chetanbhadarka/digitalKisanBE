<?php
// set location


//set map api url
$url = "https://api.postalpincode.in/pincode/362220";

//call api
$data = file_get_contents($url);
$data= json_decode($data);



if(isset($data[0]->PostOffice['0']))
{
    echo $data[0]->PostOffice['0']->State;
    echo $data[0]->PostOffice['0']->Block;
    echo $data[0]->PostOffice['0']->District;
}

?>