<?php
require_once("header.php");
?>




<div class="container">
		<div class="page-header">
			<h3><span class="fa fa-video-camera"></span> videos </h3>
		</div>
<form  method="post" action="edit_status.php">
<input type="submit" name="blockbtn" class="btn btn-danger" value="Rejected" />
<input type="submit" name="unblockbtn" class="btn btn-default" value="Pending" />


<input type="submit" name="publishbtn" class="btn btn-success" value="Publish" />

<div class="clearfix"></div>
<br/>

<table class="table table-hover">
<tr>
<th>#</th>
<th>Video ID</th>

<th>Video</th>
<th>Description</th>
<th>Views</th>
<th>Error Description</th>
<th>Created Date </th>
<th>Status </th>
</tr>
<?php
 //define total number of results you want per page  
    $results_per_page = 10;  
    $number_of_result=0;
    //find the total number of results stored in the database  
    $query = "select count(*) as record from video ";  
    $result = $con->query($query)->fetchAll();
    foreach($result as $row){
    $number_of_result = $row["record"];  
    }  
    //determine the total number of pages available  
    $number_of_page = ceil ($number_of_result / $results_per_page);  
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
  
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  
  
    //retrieve the selected results from database   
    $query = "SELECT * FROM video order by created desc LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = $con->query($query)->fetchAll();  
      
    //display the retrieved result on the webpage 
$i=1;
    foreach ($result as $row) 
 {  
      //  echo $row['id'] . ' ' . $row['alphabet'] . '</br>';  
   

?>
 <tr>

<td><input type="checkbox" name="vstatus[]" value="<?php echo $row["id"]; ?>" ></td>
      <td><?php echo "VIDU".$row["id"]; ?></td>
      <td><video  style="width:120px;height:240px;" controls="controls"> <source src='<?php echo "http://viducart.ko1.in/api/".$row["video"]; ?>' type="video/mp4" /></video> </td>
      
      <td><?php echo $row["description"]; ?></td>
      <td><?php echo $row["view"] ?></td>
      <td><?php echo $row["errorDescription"] ?></td>
      <td><?php echo $row["created"] ?></td>
      <td>
        <?php if($row["is_status"]=="Y"){ 
          echo "<span style='background:green;color:white;padding:5px;border-radius:3px;'>Publish</span>";
        }

else if($row["is_status"]=="R"){ 
          echo "<span style='background:red;color:white;padding:5px;border-radius:3px;'>Rejected</span>";
        }

         else{ echo "<span style='background:orange;color:white;padding:5px;border-radius:3px;'>Pending</span>";} ?>
         <br/>
         <br/>
         <select name="errorDescription[]"  id="errorDescription">
             
             <option value="1">Half screen Video not Allowed</option>
             <option value="2">Third party Logo</option>
             <option value="3">Minimum 15 Second video is allowed</option>
             <option value="4">Poster/Photo video not allowed</option>
             <option value="5">Story Incomplete</option>
             <option value="6">No Description or hashtag is not formed</option>
             <option value="7">Status Videos not Allowed</option>
             <option value="8">Nude and Vulgor Videos are not allowed </option>
             <option value="9">Cartoon/ Animated Videos not allowed</option>
         </select>


      </td>
      </tr>

  <?php 
    $i++;
    }  
  
  ?>

</table>
<input type="hidden" name="page" value="<?php echo $page; ?>" />

</form>
<nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>

  <?php
    //display the link of the pages in URL  
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<li><a href = "videos.php?page=' . $page . '">' . $page . ' </a></li>';  
    }  

  
?>  

      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>






</div>

<?php 
require_once("footer.php");
?>