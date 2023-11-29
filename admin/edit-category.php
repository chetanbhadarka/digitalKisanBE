<?php
$page='manage-category';
include 'header.php';
include '../dbconfig.php';


$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_GET['cat_id']))
{
	$conn->query("set names utf8");
	$sql="select * from category where id='".$_GET['cat_id']."'";
	$result=$conn->query($sql);
}



 ?>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-9">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Category</h4>                 
                </div>
                <div class="card-body">
                  <form method="POST" action="update-category.php" enctype="multipart/form-data">
                  	<?php
                    while($row=$result->fetch_assoc()) 
                    {
                  ?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category Name</label>

                          <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>">

                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>" required>



                        </div>
                      </div>
                    </div>
                   
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category Name (in Gujarati)</label>
                          <input type="text" name="cat_name_guj" class="form-control" value="<?php echo $row['category_name_gujarati']; ?>" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <br>
                          <label>Current Category Image :</label>                         
                           <img style="width: 150px; height: 150px; border: 2px solid black;" src="http://yash-nasit111.000webhostapp.com/<?php echo $row['category_image'];?>">                    
                      </div>
                    </div>
                   
                    <div class="row">
                      <div class="col-md-12">
                        <br>
                          <label>Category Image :</label>                         
                           <input class="btn btn-primary" type="file" accept="image/*" name="cat_img">                    
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

     