<?php
$page='manage-category';
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
                  <h4 class="card-title">Add New Category</h4>                 
                </div>
                <div class="card-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category Name</label>
                          <input type="text" name="cat_name" class="form-control" required>
                        </div>
                      </div>
                    </div>
                   
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category Name (in Gujarati)</label>
                          <input type="text" name="cat_name_guj" class="form-control" required>
                        </div>
                      </div>
                    </div>
                   
                    <div class="row">
                      <div class="col-md-12">
                        <br>
                          <label>Category Image :</label>                         
                           <input class="btn btn-primary" type="file" accept="image/*" name="cat_img" required>                    
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



if(isset($_POST['cat_name']) && isset($_POST['cat_name_guj']) && isset($_FILES['cat_img']))
{

	$targetDir = "../images/category_images/";
	$filename = $_FILES["cat_img"]["name"];
	$targetFilePath = $targetDir.$filename;

	$db_img_url='images/category_images/'.$filename;

	if (!file_exists($targetDir)) 
    {
         mkdir($targetDir, 0777, true);
    }

		if(move_uploaded_file($_FILES["cat_img"]["tmp_name"], $targetFilePath))
  		{
  			$q="insert into category(category_name,category_name_gujarati,category_image) values('".$_POST['cat_name']."','".$_POST['cat_name_guj']."','".$db_img_url."')";
  			if($conn->query($q))
      		{
         		
         		 echo "<script>
              		alert('Category Successfully Added...');
             	   window.location.href='manage-category.php';
        		</script>";
        
      		}
      		else
      		{
      			echo "<script>
              		alert('Error : Database Insert Error...');
             	   window.location.href='manage-category.php';
        		</script>";
      		}

  		}
  		else
  		{
  			echo "<script>
              		alert('Error : File Upload Error...');
             	   window.location.href='manage-category.php';
        		</script>";
  		}
	
}

?>

     