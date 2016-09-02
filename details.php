<?php require_once 'db_con.php'; 
		include("header.php");
?>

<div class="container-fluid">
<div class="row" id="wrapper">
<div class="col-sm-12">

<?php
include("menubar.php");
error_reporting(E_ERROR||E_WARNING);

 if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id']))
 {
 $id = $_REQUEST['id'];

$q1=mysqli_query($conn,"SELECT * FROM jobs,jobdes,requirement WHERE jobs.id=$id AND jobdes.id=$id AND requirement.id=$id ");

while($result=mysqli_fetch_array($q1)){

//job details
?>

<div class="container-fluid">
<div class="row">
<div class="panel panel-default">
<div class="panel-body">
<div class="col-sm-7">

<?php

echo "<b style='color:#0174DF; font-size:16px;' >Category: ".$result['category']."</b><br/><br/>";

echo "<b style='color:#0B610B;'>".$result['job_position']."</b><br/><br/>";
echo "<b style='font-size:17px;'>".$result['company_name']."</b><br/><br/>";
echo "<b style='font-size:15px;'>Age: &nbsp;</b><b>".$result['age']."</b><br/><br/>";
echo "<b style='font-size:15px;'>Vacancies: &nbsp;</b><b>".$result['vacancies']."</b><br/><br/>";


echo "<b style='font-size:15px;'>Job Description: </b><br/><br/>";
$desc = $result['job_description'];
$desc_exp = explode("&&", $desc);
echo "<ul style='list-style-type:disc'>";
foreach ($desc_exp as $key) {
	
	echo "<li>".$key."</li><br/>";
}
echo "</ul>";
echo "<b style='font-size:15px;'>Job Nature: &nbsp;</b><b><i>".$result['nature']."</b><br/></i><br/>";

echo "<b style='font-size:15px;'>Educational Requirements: <br/><br/></b>";
echo "<ul style='list-style-type:disc'>";
$desc = $result['educational_requirements'];
$desc_exp = explode("&&", $desc);
foreach ($desc_exp as $key) {

	echo "<li>".$key."</li><br/>";
}
echo "</ul>";
echo "<b style='font-size:15px;'>Experience Requirements: </b><br/>";
echo "<ul style='list-style-type:disc'>";
$desc = $result['experience_requirements'];
$desc_exp = explode("&&", $desc);
foreach ($desc_exp as $key) {
	echo "<li>".$key."</li><br/>";
}
echo "</ul>";
echo "<b style='font-size:15px;'>Additional Job Requirements: </b><br/>";
$desc = $result['additional_jobrequirements'];
echo "<ul style='list-style-type:disc'>";
$desc_exp = explode("&&", $desc);
foreach ($desc_exp as $key) {
	echo "<li>".$key."</li><br/>";
}
echo "</ul>";
echo "<b style='font-size:15px;'>Other Benefits: </b><br/>";
$desc = $result['other_benefits'];
echo "<ul style='list-style-type:disc'>";
$desc_exp = explode("&&", $desc);
foreach ($desc_exp as $key) {
	echo "<li>".$key."</li><br/>";
}
echo "</ul>";
echo "<b style='font-size:15px;'>Job Location:</b>&nbsp;&nbsp;";
echo "<b><i>".$result['location']."</i></b><br/><br/>";

echo "<b style='font-size:15px;'>Salary Range: </b>&nbsp;&nbsp;";
echo "<b><i>".$result['salary']."</i></b><br/><br/>";

?>

</div>


<!-- job summary -->
<div class="col-sm-5">
<div class="panel panel-primary">
<div class="panel-heading">
<h2 class="panel-title">
<b style="color:#01DFD7;">Job Summary</b>
</h2>
</div>
<div class="panel-body">
<?php
	echo "<b>Published on: &nbsp;</b><b><i>".$result['published_on']."</b></i><br/><br/>";
	echo "<b>No. of vacancies: &nbsp;</b>".$result['vacancies']."<br/><br/>";
	echo "<b>Job Nature: &nbsp;</b>".$result['nature']."<br/><br/>";
	echo "<b>Age: &nbsp;</b>".$result['age']."<br/><br/>";
	echo "<b>Job location: &nbsp;</b>".$result['location']."<br/><br/>";
	echo "<b>Salary range: &nbsp;</b>".$result['salary']."<br/><br/>";
	echo "<b>Application Deadline: &nbsp;</b><b style='color:#FE2E2E;'><i>".$result['deadline']."</b></i>";
?>		
</div>
</div>
</div>

</div>
</div>
</div>
</div>

<div class="panel panel-default">
<div class="panel-body">
<div class="col-sm-12">
<?php
echo "<center>";
echo "<b style='font-size:15px;'>Apply Instructions: </b><br/><br/>";
$desc = $result['apply_instruction'];
$desc_exp = explode("&&", $desc);
foreach ($desc_exp as $key) {
	echo $key."<br/>";
}

echo "<br/><br/><br/>";
echo "<b style='font-size:15px;'>Application Deadline: &nbsp;</b><b style='color:#FE2E2E;'><i>".$result['deadline']."</b></i>";
echo "</center><br/><br/>";

?>
</div>
</div>
</div>

<?php
}
}
?>
</div>
</div>
