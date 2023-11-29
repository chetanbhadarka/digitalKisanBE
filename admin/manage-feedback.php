<?php
$page='manage-feedback';
include 'header.php';
include '../dbconfig.php';

$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 


if(isset($_GET['fid']))
{

    $del_q="delete from feedback where id='".$_GET['fid']."'";
    if($conn->query($del_q))
    {
        echo "<script>
              alert('Feedback Successfully Deleted...');
              window.location.href='manage-feedback.php';
        </script>";
    }

} 



$sql = "SELECT * FROM feedback ORDER BY id DESC";
$result = $conn->query($sql);

 ?>

        <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Feedbacks</h4>            
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Feedback Message</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
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
                          <td><?php echo $row['message']; ?> </td>
                          <td><?php echo $row['email']; ?> </td>
                          <td><?php echo $row['mobileno']; ?> </td>
                          <td><a href="?fid=<?php echo $row['id']; ?> " class="btn btn-primary btn-round" style="color: white;" ><i class="material-icons">delete</i> Delete</a></td>                                               
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

     