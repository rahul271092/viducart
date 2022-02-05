<?php
require_once('header.php');
 ?>


 <div class="container">
 		<div class="page-header">
 				<h3>Franchise List </h3>
 		</div>

    <table class="table table-bordered">
       <tr>
           <th> #</th>
           <th>Franchise ID </th>
           <th>Franchise Name </th>
           <th>Franchise Type </th>
           <th>Franchise Email </th>
           <th>Franchise Mobile </th>
           <th>Action </th>
       </tr>
       <?php 
       $sql="select * from dx_franchise order by franchiseId desc";
       $result=$con->query($sql)->fetchAll();
       $i=1;
       foreach ($result as $row)
       {
       	echo "<tr>";
       	echo "<td>".$i."</td>";
       	echo "<td>".$row["franchiseId"]."</td>";
       	echo  "<td>".$row["name"]."</td>";
       	echo  "<td>";
       	 if($row["franchiseTypeId"]=="1"){ echo "5 Lakh Franchise";} else { echo "2.5 Lakh Franchise";}
       	 echo "</td>";
       	echo "<td>".$row["email"]."</td>"; 
       	echo "<td>".$row["mobile"]."</td>";
       	echo "<td><a href='update-franchise.php?franchise=".$row["franchiseId"]."' class='btn btn-warning'>Edit </a></td>";
       	echo "</tr>";
       $i++;
       }
       ?>
    </table>

 </div>	