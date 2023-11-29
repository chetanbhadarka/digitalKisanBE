<?php
$page='manage-slider';
include 'header.php';
include '../dbconfig.php';


$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_GET['slide_id']))
{
	$conn->query("set names utf8");
	$sql="select * from slider where id='".$_GET['slide_id']."'";
	$result=$conn->query($sql);
}



 ?>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Slide</h4>                 
                </div>
                <div class="card-body">
                  <form method="POST" action="update-slide.php" enctype="multipart/form-data">
                  	<?php
                    while($row=$result->fetch_assoc()) 
                    {
                  ?>
                    
                   
                   <input type="hidden" name="slide_id" value="<?php echo $row['id']; ?>">
                 
                   

                    <div class="row">
                      <div class="col-md-12">
                        <br>
                          <label>Current Slide Image :</label>                         
                           <img style="width: 350px; height: 150px; border: 2px solid black;" src="http://yash-nasit111.000webhostapp.com/<?php echo $row['img_url'];?>">                    
                      </div>
                    </div>
                   
                    <div class="row">
                      <div class="col-md-12">
                        <br>
                          <label>Choose New Image :</label>                         
                           <input class="btn btn-primary" type="file" accept="image/*" name="slider_img">                    
                      </div>
                    </div>
 				<?php
                    }
                  ?>

                    <button name="update" type="submit" class="btn btn-primary pull-right">Update</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>


<?php
include 'footer.php';
?>

     