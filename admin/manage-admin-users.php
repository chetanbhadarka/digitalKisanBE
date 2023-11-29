<?php
$page='manage-admin-users';
include 'header.php';
include '../dbconfig.php';

$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 


if(isset($_GET['admin_id']))
{

    $del_q="delete from admin where id='".$_GET['admin_id']."'";
    if($conn->query($del_q))
    {
        echo "<script>
              alert('Admin User Successfully Deleted...');
              window.location.href='manage-admin-users.php';
        </script>";
    }

} 



$sql = "SELECT * FROM admin";
$result = $conn->query($sql);

 ?>

        <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <center>
              <a class="btn btn-info" href="add-new-admin.php" style="color:white;"><b>Add New Admin User</b></a>
              </center>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Admin Users</h4>            
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>                      
                        <th>Name</th>
                        <th>Username</th>
                        <th>Password</th>                      
                        <th>Action</th>
                      </thead>
                      <tbody>
                  <?php
                    while($row=$result->fetch_assoc()) 
                    {
                  ?>
                        <tr>
                          <td><?php echo $row['id']; ?> </td>                                 
                          <td><?php echo $row['name']; ?> </td>
                          <td><?php echo $row['username']; ?> </td>
                          <td><?php echo $row['password']; ?> </td>
                         <td><a href="?admin_id=<?php echo $row['id']; ?> " class="btn btn-primary btn-round" style="color: white;" ><i class="material-icons">delete</i> Delete</a></td>                                               
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

     