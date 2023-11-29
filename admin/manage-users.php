<?php
$page='manage-users';
include 'header.php';
include '../dbconfig.php';

$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 


if(isset($_GET['user_fid']))
{

    $del_q="delete from users where firebase_uid='".$_GET['user_fid']."'";
    if($conn->query($del_q))
    {
        
        $del_post="delete from posts where user_fid='".$_GET['user_fid']."'";
         if($conn->query($del_post))
         {
             
             $del_cmnt="delete from post_comments where user_fid='".$_GET['user_fid']."'";
             if($conn->query($del_cmnt))
             {
                 $del_likes="delete from post_likes where user_fid='".$_GET['user_fid']."'";
                 if($conn->query($del_likes))
                 {
                              echo "<script>
                          alert('User Successfully Deleted...');
                          window.location.href='manage-users.php';
                    </script>";
                 }
             }
        
           
         }
    }

} 



$sql = "SELECT * FROM users";
$result = $conn->query($sql);

 ?>

        <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">App Users</h4>            
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>User ID</th>
                         <th>Profile Picture</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
                        <th>Gender</th>                       
                        <th>Address</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                  <?php
                    while($row=$result->fetch_assoc()) 
                    {
                  ?>
                        <tr>
                          <td><?php echo $row['firebase_uid']; ?> </td>   
                           <td><img src="<?php echo 'http://yash-nasit111.000webhostapp.com'.$row['profile_picture']; ?>" style="width: 100px; height: 100px;"></td>                     
                          <td><?php echo $row['name']; ?> </td>
                          <td><?php echo $row['email']; ?> </td>
                          <td><?php echo $row['mobileno']; ?> </td>
                          <td><?php echo $row['gender']; ?> </td>
                          <td><?php echo $row['city'].', '.$row['district'].', '.$row['state'].'. - '.$row['pincode']; ?> </td>
                         

                          <td><a href="?user_fid=<?php echo $row['firebase_uid']; ?> " class="btn btn-primary btn-round" style="color: white;" ><i class="material-icons">delete</i> Delete</a></td>                                               
                        </tr>
                  <?php
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

     