<?php
	include('db_con.php');
	include("header.php");
?>
<div class="container-fluid">
<div class="row" id="wrapper">
<div class="col-sm-12">
<?php
	include("menubar.php");
?>

        <div class="panel panel-info">
		<div class="panel-heading">
			<h2 class="panel-title">
				<b>Enter date to generate report</b>
			</h2>
		</div>
		<div class="panel-body">
            <form action="report.php" method="post" name="myForm">
            <div class="form-group">
            	<label for="date-from">
                From Date :<input  type="text" name="date_from" id="example1">
                </label>
                <label for="date-to">
                To Date :<input  type="text" name="date_to" id="example2">
                </label>
            </div>
                <input type="submit" name="submit" value="Generate" class="btn btn-danger">
            </form>
            
        <!-- Load jQuery and bootstrap datepicker scripts -->
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "yyyy/mm/dd"
                });  
            
            });

            $(document).ready(function () {
                
                $('#example2').datepicker({
                    format: "yyyy/mm/dd"
                });  
            
            });
        </script>
		
<?php
if(isset($_POST['submit'])){
$from=$_REQUEST['date_from'];
$to=$_REQUEST['date_to'];

$sql=mysqli_query($conn,"SELECT * FROM `apply` WHERE date between '$from' AND '$to'"); 

while($result=mysqli_fetch_array($sql)){
	echo "<hr>";
	echo "<div class='container-fluid' style='background-color:#D8D8D8;'>";
	echo "<div class='row'>";
	echo "<div class='col-md-6'>";
	echo "<br/>";
	echo "<b style='font-size:18px; color:#088A85;'>User Details: </b><br/>";
	echo "<br/>";
	echo "<b>User ID: &nbsp;</b>".$result['user_id']."<br/>";


$uid=$result['user_id'];
$sql1=mysqli_query($conn,"SELECT * FROM user WHERE user_id='$uid'");
$res=mysqli_fetch_array($sql1);
	echo "<b>Name: &nbsp;</b>".$res['name']."<br/>";
	echo "<b>Address: &nbsp;</b>".$res['address']."<br/>";
	echo "<b>City: &nbsp;</b>".$res['city']."<br/>";
	echo "<b>Age: &nbsp;</b>".$res['age']." Year(s)<br/>";
	echo "<b>Qualifications: </b><br/>";

echo "<ul style='list-style-type:disc'>";
$desc = $res['qualification'];
$desc_exp = explode("&&", $desc);
foreach ($desc_exp as $key) {
	echo "<li>".$key."</li><br/>";
}
echo "</ul>";
	echo "<br/>";
	echo "</div>";

$job_id=$result['job_id'];
$sql2=mysqli_query($conn,"SELECT * FROM jobs WHERE id='$job_id'");
$r=mysqli_fetch_array($sql2);
	echo "<br/>";
	echo "<div class='col-md-6'>";
	echo "<b style='font-size:18px; color:#088A85;'>Applied Job:</b><br/>";
	echo "<br/>";
	echo "<b style='color:#0B610B;'>".$r['job_position']."</b><br/>";
	echo "<b style='font-size:16px;'>".$r['company_name']."</b><br/>";
	echo "Category: &nbsp;".$r['category']."<br/>";
	echo "Location: &nbsp;".$r['location']."<br/>";
	echo "Deadline: &nbsp;<b style='color:#FE2E2E;'><i>".$r['deadline']."</i></b><br/><br/>";
	echo "</div>";
 	echo "</div>";
 	echo "</div>";

}
}
?>
</div>
</div>
</div>
</div>
</div>

<?php
	include("footer.php");
?>