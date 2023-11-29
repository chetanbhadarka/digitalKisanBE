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

    $del_q="delete from category where id='".$_GET['cat_id']."'";
    if($conn->query($del_q))
    {
        echo "<script>
              alert('Category Successfully Deleted...');
              window.location.href='manage-category.php';
        </script>";
    }

} 



$sql = "SELECT * FROM category";
$result = $conn->query($sql);

 ?>

        <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
              <center>
              <a class="btn btn-info" href="add-new-category.php" style="color:white;"><b>Add New Category</b></a>
              </center>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Manage Category</h4>           
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Category Image</th>
                        <th>Category Name</th>
                        <th>Category Name (Gujarati)</th>
                        <th style="text-align: center;" colspan="2">Action</th>
                      </thead>
                      <tbody>
                  <?php
                    while($row=$result->fetch_assoc()) 
                    {
                  ?>
                        <tr>
                          <td><?php echo $row['id']; ?> </td>   
                           <td><img src="<?php echo 'http://yash-nasit111.000webhostapp.com/'.$row['category_image']; ?>" style="width: 100px; height: 100px;"></td>                     
                          <td><?php echo $row['category_name']; ?> </td>
                          <td><?php echo $row['category_name_gujarati']; ?> </td>

                          <td><a href="edit-category.php?cat_id=<?php echo $row['id']; ?> " class="btn btn-primary btn-round" style="color: white;" ><i class="material-icons">edit</i> Edit</a></td>
                        
                          <td><a href="?cat_id=<?php echo $row['id']; ?> " class="btn btn-primary btn-round" style="color: white;" ><i class="material-icons">delete</i> Delete</a></td>

                                                                         
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

     