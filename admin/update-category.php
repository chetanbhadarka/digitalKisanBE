<?php
$page='manage-category';
include '../dbconfig.php';



$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 


if(isset($_POST['cat_name']) && isset($_POST['cat_name_guj']))
{

	if(empty($_FILES['cat_img']['name']))
	{

		$q="UPDATE category set category_name='".$_POST['cat_name']."',category_name_gujarati='".$_POST['cat_name_guj']."' where id='".$_POST['cat_id']."'";

		
	}else
	{
		$targetDir = "../images/category_images/";
		$filename = $_FILES["cat_img"]["name"];
		$targetFilePath = $targetDir.$filename;
		$db_img_url='images/category_images/'.$filename;


		    if(move_uploaded_file($_FILES["cat_img"]["tmp_name"], $targetFilePath))
	  		{
	  			$q="UPDATE category set category_name='".$_POST['cat_name']."',category_name_gujarati='".$_POST['cat_name_guj']."',category_image='".$db_img_url."' where id='".$_POST['cat_id']."'";

		  			

	  		}else{
	  			echo "<script>
	              		alert('Error : File Upload Error...Please Try Again..');             	  
	        		</script>";
	  		}
	}
	
	if($conn->query($q))
	{
		
		 echo "<script>
  		alert('Category Successfully Updated...');
 	   window.location.href='manage-category.php';
	</script>";

	}else{
		echo "<script>
  		alert('Error : Database Insert Error... Please Try Again...');	             	   
	</script>";
	}
	
	
}



?>