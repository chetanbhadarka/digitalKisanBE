<?php
$page='dashboard';
include 'header.php';
include '../dbconfig.php';

$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

$q1="SELECT * FROM category";
$result1=mysqli_query($conn,$q1);
$total_category=mysqli_num_rows($result1);


$q2="SELECT * FROM posts";
$result2=mysqli_query($conn,$q2);
$total_posts=mysqli_num_rows($result2);

$q3="SELECT * FROM users";
$result3=mysqli_query($conn,$q3);
$total_users=mysqli_num_rows($result3);

$q4="SELECT * FROM feedback";
$result4=mysqli_query($conn,$q4);
$total_feedback=mysqli_num_rows($result4);




 ?>

        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">        
              <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">category</i>
                  </div>
                  <p class="card-category">Total Category</p>
                  <h3 class="card-title"><?php echo $total_category; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   <a class="btn btn-primary btn-round" href="manage-category.php">Manage Category</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">description</i>
                  </div>
                  <p class="card-category">Total Posts</p>
                  <h3 class="card-title"><?php echo $total_posts; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                     <a class="btn btn-success btn-round" href="manage-post.php">Manage Posts</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">group</i>
                  </div>
                  <p class="card-category">Total App Users</p>
                  <h3 class="card-title"><?php echo $total_users; ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a class="btn btn-warning btn-round" href="manage-users.php">Manage App Users</a>                   
                  </div>
                </div>
              </div>

            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">rate_review</i>
                  </div>
                  <p class="card-category">Feedbacks</p>
                  <h3 class="card-title"><?php echo $total_feedback; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                     <a class="btn btn-info btn-round" href="manage-feedback.php">Manage Feedbacks</a>   
                  </div>
                </div>
              </div>
            </div>
          </div>
          
            <div class="row">
              <div class="col-md-12">
                <center>
                <img style="width: 40%;" src="../images/dk_logo.png">
               </center>
              </div>
              <div class="col-lg-6 col-md-12">
                <div class="card">
                  
                  
                </div>
              </div>
            </div>
        </div>


<?php
include 'footer.php';
?>

     