<?php
$page='manage-category';
include '../dbconfig.php';



$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 


if(isset($_POST['slide_id']) && isset($_FILES['slider_img']))
{

	
	
		$targetDir = "../images/slider/";
		$filename = $_FILES["slider_img"]["name"];
		$targetFilePath = $targetDir.$filename;
		$db_img_url='images/slider/'.$filename;


		    if(move_uploaded_file($_FILES["slider_img"]["tmp_name"], $targetFilePath))
	  		{
	  			$q="UPDATE slider set img_url='".$db_img_url."' where id='".$_POST['slide_id']."'";


	  				if($conn->query($q))
					{
		
						 echo "<script>
					  		alert('Slide Successfully Updated...');
					 	   window.location.href='manage-slider.php';
						</script>";

					}else{
						echo "<script>
				  		alert('Error : Database Insert Error... Please Try Again...');	             	   
						</script>";
					}
		  			

	  		}else{
	  			echo "<script>
	              		alert('Error : File Upload Error...Please Try Again..');             	  
	        		</script>";
	  		}
	
	
	
	
	
}



?>