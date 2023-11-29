<?php
$page='manage-slider';
include 'header.php';
include '../dbconfig.php';


$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

 ?>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add New Slider</h4>                 
                </div>
                <div class="card-body">
                  <form action="" method="POST" enctype="multipart/form-data">                
                    <div class="row">
                      <div class="col-md-12">
                        <br>
                          <label>Choose Image :</label>                         
                           <input class="btn btn-primary" type="file" accept="image/*" name="slider_img" required>                    
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Add</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>


<?php
include 'footer.php';



if(isset($_FILES['slider_img']))
{

	$targetDir = "../images/slider/";
	$filename = $_FILES["slider_img"]["name"];
	$targetFilePath = $targetDir.$filename;

	$db_img_url='images/slider/'.$filename;

	if (!file_exists($targetDir)) 
    {
         mkdir($targetDir, 0777, true);
    }

		if(move_uploaded_file($_FILES["slider_img"]["tmp_name"], $targetFilePath))
  		{
  			$q="insert into slider(img_url) values('".$db_img_url."')";
  			if($conn->query($q))
      		{
         		
         		 echo "<script>
              		alert('New Slide Successfully Added...');
             	   window.location.href='manage-slider.php';
        		</script>";
        
      		}
      		else
      		{
      			echo "<script>
              		alert('Error : Database Insert Error...');
             	   window.location.href='manage-slider.php';
        		</script>";
      		}

  		}
  		else
  		{
  			echo "<script>
              		alert('Error : File Upload Error...');
             	   window.location.href='manage-slider.php';
        		</script>";
  		}
	
}

?>

     