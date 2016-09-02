<?php require_once 'db_con.php';
	
	include("header.php");
 ?>


<div class="container-fluid">
<div class="row" id="wrapper">
<div class="col-sm-12">

<?php 
include("menubar.php");
error_reporting(E_ERROR||E_WARNING);
	   
$cat=$_REQUEST['category'];
$loc=$_REQUEST['location'];

	$op=mysqli_query($conn,"SELECT DISTINCT category FROM jobs");
	$op1=mysqli_query($conn,"SELECT DISTINCT location FROM jobs");	    
?>
<div class="panel panel-info">
		<div class="panel-heading">
			<h2 class="panel-title">
				<b>Search Jobs By Category and Location</b>
			</h2>
		</div>
<div class="panel-body">			
<form action="index.php" method="post" name="myForm" role="form">
<div class="form-group">
<label for="category">
   Select Category:
</label>
<SELECT name="category" id="category">
<?php 	  
	    while ($p=mysqli_fetch_array($op)){ 
	    		$category=$p['category'];
	    		if(strcmp ($category,$cat) == 0){
	    			$isSelected="selected";
	    		}
	    		else{
	    			$isSelected="";
	    		}
	    	?>
		<option value="<?php echo $category; ?>"  <?=$isSelected; ?>   ><?php echo $category; ?></option>
<?php } ?>
	</SELECT>
	</div>
<div class="form-group">
<label for="location">
   Select Location:
</label>
<SELECT name="location" id="location">
<?php 	  
	    while ($p1=mysqli_fetch_array($op1)){ 
	    		$location=$p1['location'];
	    		if(strcmp ($location,$loc) == 0){
	    			$isSelected="selected";
	    		}
	    		else{
	    			$isSelected="";
	    		}
	    	?>
		<option value="<?php echo $location; ?>" <?=$isSelected; ?>><?php echo $location; ?></option>
<?php } ?>
	</SELECT>
	</div>
<input type="submit" name="submit" value="Search" class="btn btn-danger">
</form>


<?php

if($cat!=NULL && $loc!=NULL){
$query=mysqli_query($conn,"SELECT * FROM jobs WHERE category='$cat' AND location='$loc'");
}
else if($cat!=NULL && $loc==NULL){
$query=mysqli_query($conn,"SELECT * FROM jobs WHERE category='$cat'");
} else if($cat==NULL && $loc!=NULL){
$query=mysqli_query($conn,"SELECT * FROM jobs WHERE location='$loc'");
} else {
$query=mysqli_query($conn,"SELECT * FROM jobs");
}
while($res=mysqli_fetch_array($query)){
	echo "<hr>";
	echo "<div class='container-fluid' style='background-color:#D8D8D8;'>";
	echo "<div class='row'>";
	echo "<div class='col-md-6'>";
	echo "<br/>";
	echo "<b style='color:#0B610B;'>".$res['job_position']."</b><br/>";
	echo "<b style='font-size:17px;'>".$res['company_name']."</b><br/>";
	echo "Age: &nbsp;".$res['age']." Yeas(s)<br/>";
	echo "Deadline: &nbsp;<i style='color:#FE2E2E;'>".$res['deadline']."</i><br/><br/>";
	echo "</div>";
	echo "<div class='col-md-6'>";
 	echo '<a href="details.php?id=' . $res['id'] . '"><b class="btn btn-info">Details</b></a>' ; 
 	echo '<button type="button" class="btn btn-success">Apply</button>';
 	echo "</div>";
 	echo "<br/>";
 	echo "</div>";
 	echo "</div>";

 ?>

<?php } ?>

</div>
</div>
</div>
</div>
</div>

<?php
	include("footer.php");
?>