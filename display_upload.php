<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- jQuery library -->
<script src="jquery-3.5.1.js"></script>

<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>
<body>
<!--<section class="p-3 mb-2 bg-secondary text-center">-->
<div class="container">
<form action="details_upload.php" method="post" enctype="multipart/form-data">
<?php

$filename=$_GET['file'];
//echo $filename;
$file = fopen($filename,"r");
$line = fgets($file);


$linecount = 0;
while(!feof($file))
{
  $rowln = fgets($file);
  $linecount++;
}
//print_r(fgetcsv($file));

fclose($file);
$arr_head = str_getcsv($line, "\t");

//$termsAccepted=false;
//If the POST variable “terms_of_services” exists.
//If ($_POST[‘terms_of_services’]) {
//Checkbox has been ticked.
//$termsAccepted=true;
//}
//print_r($arr_head);
//echo $line;
echo "<input type='hidden' value='$filename' name='fn' />";
echo "<b><center> <h1 class= 'p-3 mb-2 bg-secondary text-white'> Uploaded File </b></h1> ";
echo "<table class='table' , border=1, align=center>";
echo "<thead class='thead-dark'>";
echo "<tr><th> Column Name</th>";
echo "<th> Select Column</th>";
echo "<th> Enter Group Number</th></tr></thead>";
$count=0;
foreach($arr_head as $i)
{
	echo "<tr class='table-info'>";
	echo "<td>$i</td>";
	echo "<td><input type='checkbox' onclick=manageGroupField(this,'td_$count') name='selectcol[]' value=$count></td>";
	echo "<td id='td_$count'></td>";
	$count++;
	//echo checkbox <td> <input type="checkbox" name="select" value="checked"> </td>
	echo "</tr>";
}

//"<img src='uploads/boxplot4.png'>";
//$img= scandir('./uploads/');

//header('Location:details_upload.php');
?>	
<h1><input type="submit" class="btn btn-success" name="submit"></h1>
</form>

<div>
<!--<img src="uploads/boxplot4.png">-->
</div> 
<script>
function manageGroupField(obj, id){
	
	var td = document.getElementById(id);
	
	if(obj.checked)
	{
		td.innerHTML = "<input type='text' name='groupno[]' value=0>";
		
	}
	else
	{
		td.innerHTML = "";
	}
	
}
</script>
</body>
</html>