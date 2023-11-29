<?php
$page='manage-posts';
include 'header.php';
include '../dbconfig.php';

$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = $conn->query($sql);

 ?>

        <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Posts</h4>            
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Post UID</th>
                        <th>Post Category</th>
                        <th>Post Title</th>
                        <th>Post Description</th>
                        <th>Posted By</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                  <?php
                    while($row=$result->fetch_assoc()) 
                    {

                      $q2="SELECT name FROM users where firebase_uid='".$row['user_fid']."'";
                      $result2 = $conn->query($q2);
                      while($row2=$result2->fetch_assoc()) 
                      {

                  ?>
                        <tr>
                          <td><?php echo $row['post_uid']; ?> </td>                        
                          <td><?php echo $row['category']; ?> </td>
                          <td><?php echo $row['post_title']; ?> </td>
                          <td><?php echo $row['post_desc']; ?> </td>
                          <td><?php echo $row2['name']; ?> </td>
                          <td><a href="view-full-post.php?post_id=<?php echo $row['id']; ?> " class="btn btn-primary btn-round" style="color: white;" ><i class="material-icons">preview</i> View Full Post</a></td>                                               
                        </tr>
                  <?php
                        }
                    }
                  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
           
        </div>


<?php
include 'footer.php';
?>

     