<?php
$page='manage-posts';
include 'header.php';
include '../dbconfig.php';
?>

<link rel="stylesheet" href="assets/PostFeed/main.min.css">
<link rel="stylesheet" href="assets/PostFeed/style.css">
<link rel="stylesheet" href="assets/PostFeed/color.css">
 <link rel="stylesheet" href="assets/PostFeed/responsive.css">





<?php


$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 


date_default_timezone_set('Asia/Kolkata');
$today_date=date('d/m/yy');
$yesterday_date=date("d/m/yy", strtotime("-1 day"));
$post_uniqid='';
if(isset($_GET['post_id']))
{    

    $q1="select * from posts p, users u WHERE p.id='".$_GET['post_id']."' AND p.user_fid = u.firebase_uid"; 
    $result=$conn->query($q1);
} 
?>


<div class="container-fluid">
	<?php 
	  if($result->num_rows>0)
      { 
	      	while($row=$result->fetch_assoc())
	        {


	        		$post_uniqid=$row['post_uid'];

	        		$post_dt='';	        		
	        	    if($row['post_date'] == $today_date)
                    {
                        $post_dt='Today';
                    }
                    else if($row['post_date'] == $yesterday_date)
                    {
                        $post_dt='Yesterday';
                    }
                    else
                    {
                        $post_dt=$row['post_date'];
                    }

                    
     	?>
			<div class="row">
            <div class="col">				
              <div class="card">

				<div class="card-header card-header-primary">

					<div class="row">
              		<div class="col-md-2">
              			<img style="border: 2px solid black; margin: 15px;" width="100px" height="100px" src="<?php echo 'http://yash-nasit111.000webhostapp.com/'.$row['profile_picture']; ?>">
              		</div>
              		<div style="margin-top: 35px; margin-left: -30px;" class="col-md-6">

              			 	<span style="font-size: 20px;"><b><?php echo $row['name']?></b></span>

              			<p class="card-category"><i style="text-align: right !important;" class="material-icons">access_time</i> Posted On <?php echo $post_dt.' at '.$row['post_time']; ?>   </p>
              		</div>
              		<div style="margin-top: 30px;" class="col-md-4">
              			
              			 <a style="color: white;" class="btn btn-danger" href="view-full-post.php?post_id=<?php echo $_GET['post_id']; ?>&del_post_id=<?php echo $_GET['post_id']; ?>">Delete This Post</a>
              			</p>
              		</div>

              	</div>
					             
                

                </div>  
		              	
		        

                <div class="card-body">
                	<form>                     
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                          <label>Post Title</label>
                          <div class="form-group">                           
                            <textarea class="form-control" rows="1" disabled><?php echo $row['post_title'] ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Post Description</label>
                          <div class="form-group">                           
                            <textarea class="form-control" rows="2" disabled><?php echo $row['post_desc'] ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>

                <div class="row">
                	<div class="col">
                				<p>Post Images :</p>
                		<?php
                		$img_q="select * from post_images where post_uid='".$row['post_uid']."'";

                		$result_img=$conn->query($img_q);
                		$domain='http://yash-nasit111.000webhostapp.com';

                		  if($result_img->num_rows>0)
					      { 
						      	while($row_img=$result_img->fetch_assoc())
						        {

                		?>


                		<a class="lightbox" aria-haspopup="dialog" href="<?php echo $domain.$row_img['image_url']; ?>">
						<img src="<?php echo $domain.$row_img['image_url']; ?>" width="20%"></a>
						<?php

								}
							}
						?>

                	</div>
				 </div>



                   
                  </form>

                </div>



                <?php
                $q2="select * from post_likes p, users u where post_uid='".$row['post_uid']."' AND p.user_fid = u.firebase_uid";
                $result2=$conn->query($q2);
                $likes_count = mysqli_num_rows($result2);


                $q3="select p.id,p.comment,p.cmnt_date,p.cmnt_time,u.name,u.profile_picture from post_comments p, users u where post_uid='".$row['post_uid']."' AND p.user_fid = u.firebase_uid";

             
                $result3=$conn->query($q3);
                $comments_count = mysqli_num_rows($result3);

                ?>




                <div class="card-footer">
                  <div class="stats">
                  	<h5>
                  	 <i class="material-icons">favorite</i> <?php echo $likes_count.' Likes'; ?>

                  	  <i class="material-icons">insert_comment</i> <?php echo $comments_count.' Comments'; ?> 

                  	 
                    
				 </h5>                   
                  </div>				
                </div>

			</div>
            </div>       
          </div>
    <div class="row">
            <div class="col-lg-6 col-md-12">
            	<?php
        	   		if($result2->num_rows>0)
					{ 					      	
                ?>
              <div class="card">             	
                <div class="card-header card-header-success">
                  <h4 class="card-title">List Of Users, Who Liked This Post...</h4>                 
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">                     
                      <th>Profile Picture</th>
                      <th>Name</th>                      
                    </thead>
                    <tbody> 
                    <?php 
	                    while($row2=$result2->fetch_assoc())
						 {
					 ?>                   
                      <tr>                        
                        <td><img width="70px;" height="70px" src="http://yash-nasit111.000webhostapp.com<?php echo $row2['profile_picture']; ?>"></td>
                        <td><?php echo $row2['name']; ?></td>                       
                      </tr> 
                      <?php } ?>                     
                    </tbody>
                  </table>
                </div>
                
              </div>
            </div>
					<?php                		
                	}
                    ?>



		<div class="col-lg-6 col-md-12">
              <div class="card">

              		<?php
                		if($result3->num_rows>0)
  						{ 
					      	
                    ?>

                <div class="card-header card-header-success">
                  <h4 class="card-title">List Of Users, Who Commented On This Post...</h4>               
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">                     
                      <th>Profile Picture</th>
                      <th>Name</th>  
                      <th>Comment</th>  
                      <th>Date & Time</th>  
                      <th>Action</th>                     
                    </thead>
                    <tbody>  
                    <?php while($row3=$result3->fetch_assoc())
					        {  ?>                  
                      <tr>                       
                        <td><img width="70px;" height="70px" src="http://yash-nasit111.000webhostapp.com<?php echo $row3['profile_picture']; ?>"></td>
                        <td><?php echo $row3['name']; ?></td>  
                        <td><?php echo $row3['comment']; ?></td>   
                         <td><?php echo $row3['cmnt_date'].' At '.$row3['cmnt_time']; ?></td>       
                         <td><a href="view-full-post.php?post_id=<?php echo $_GET['post_id'];  ?>&cmnt_id=<?php echo $row3['id']; ?>" style="color: white;" class="btn btn-primary">
                         	 <i class="material-icons">delete</i>
                         </td>                           
                      </tr> 
                      <?php } ?>                     
                    </tbody>
                  </table>
                </div>
                <?php
                		
                	}
                    ?>
              </div>
            </div>	
                </div>

    






	<?php 
				
			}
		} 
	?>
</div>
<?php
include 'footer.php';


if(isset($_GET['cmnt_id']))
{
	$del_cmnt="delete from post_comments where id='".$_GET['cmnt_id']."'";
	if($conn->query($del_cmnt))
	{
		$post_id=$_GET['post_id'];
			echo ("<script LANGUAGE='JavaScript'>
    window.alert('Comment Successfully Deleted...');
     window.location.href='view-full-post.php?post_id=$post_id';
   
    </script>");
	}
	else
	{
			echo ("<script LANGUAGE='JavaScript'>
    window.alert('Error : Comment Not Deleted...');
    </script>");
	}

}

if(isset($_GET['del_post_id']))
{

			$qd1="delete from posts where post_uid='".$post_uniqid."'";
             $sql1=$conn->query($qd1);
             if($sql1)
             {
                
                 $qd2="delete from post_images where post_uid='".$post_uniqid."'";
                 $sql2=$conn->query($qd2);
                 if($sql2)
                 {
                     $qd3="delete from post_likes where post_uid='".$post_uniqid."'";
                     $sql3=$conn->query($qd3);
                     
                     if($sql3)
                     {
                          $qd4="delete from post_comments where post_uid='".$post_uniqid."'";
                          $sql4=$conn->query($qd4);
                          if($sql4)
                          {
                              echo ("<script LANGUAGE='JavaScript'>
							    window.alert('Post Successfully Deleted...');
							     window.location.href='manage-post.php';
							   
							    </script>");
                          }
                          
                     }
                 }
                
                
                
             }
			else
			{
					echo ("<script LANGUAGE='JavaScript'>
		    window.alert('Error : Post Not Deleted...');
		    </script>");
			}

}




?>