<?php
$page='manage-admin-users';
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
                  <h4 class="card-title">Add New Admin User</h4>                 
                </div>
                <div class="card-body">
                  <form method="POST">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" name="name" class="form-control" required>
                        </div>
                      </div>
                    </div>
                   
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="username" class="form-control" required>
                        </div>
                      </div>
                    </div>

                     <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="text" name="password" class="form-control" required>
                        </div>
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



if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']))
{

  			$q="insert into admin(username,name,password) values('".$_POST['username']."','".$_POST['name']."','".$_POST['password']."')";
  			if($conn->query($q))
      		{
         		
         		 echo "<script>
              		alert('New Admin User Successfully Added...');
             	   window.location.href='manage-admin-users.php';
        		</script>";
        
      		}
      		else
      		{
      			echo "<script>
              		alert('Error : Database Insert Error...');             	  
        		</script>";
      		}

  		
	
}

?>

     