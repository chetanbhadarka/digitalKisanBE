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

    $del_q="delete from slider where id='".$_GET['slide_id']."'";
    if($conn->query($del_q))
    {
        echo "<script>
              alert('Slide Successfully Deleted...');
              window.location.href='manage-slider.php';
        </script>";
    }

} 



$sql = "SELECT * FROM slider";
$result = $conn->query($sql);

 ?>

        <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
              <center>
              <a class="btn btn-info" href="add-new-slide.php" style="color:white;"><b>Add New Slider</b></a>
              </center>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Manage Image Slider</h4>           
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                         <th>Image</th>
                        <th>Image URL</th>                       
                        <th style="text-align: center;" colspan="2">Action</th>
                      </thead>
                      <tbody>
                  <?php
                    while($row=$result->fetch_assoc()) 
                    {
                  ?>
                        <tr>
                          <td><?php echo $row['id']; ?> </td>   
                           <td><img src="<?php echo 'http://yash-nasit111.000webhostapp.com/'.$row['img_url']; ?>" style="width: 300px; height: 130px;"></td>                     
                          <td><?php echo $row['img_url']; ?> </td>
                        

                          <td><a href="edit-slide.php?slide_id=<?php echo $row['id']; ?> " class="btn btn-primary btn-round" style="color: white;" ><i class="material-icons">edit</i> Edit</a></td>
                        
                          <td><a href="?slide_id=<?php echo $row['id']; ?> " class="btn btn-primary btn-round" style="color: white;" ><i class="material-icons">delete</i> Delete</a></td>

                                                                         
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

     