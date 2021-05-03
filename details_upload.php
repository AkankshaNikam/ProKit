<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- jQuery library -->
<script src="jquery-3.5.1.js"></script>

<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>
<?php
$head_list="c(";
$contlist="c(";
$grps = $_POST['groupno'];
if (isset($_POST['submit']))
{
		//$selected_radio = $_POST['NA'];
	//$f=$_POST['filename'];
	//$hea=$_POST['head'];
	//if ($selected_radio == 'NAZ')
	/*{
			$male_status = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\NAzero.R $f myarray=\"$hea\"";
			//echo $male_status;
			$output1=shell_exec($male_status);
			echo "<input type= 'hidden' name = 'file_NA' value = '$output1'>";
			//echo $output1;
	}
			else if ($selected_radio == 'NAM') 
			{
				$female_status = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\NAmin.R $f myarray=\"$hea\"";
				$output2=shell_exec($female_status);
				echo "<input type= 'hidden' name = 'file_NA' value = '$output2'>";
				//echo $output2;
				//echo $female_status;
			}
*/
	if(!empty($_POST['selectcol']))
	{
		$selectCount=0;
		foreach($_POST['selectcol'] as $selected)
		{
			
			//echo $selected."</br>";
			if($selectCount == 0)
			{	
				$head_list=$head_list.$selected;
				$contlist=$contlist.$grps[$selectCount]; 
			}
			else
			{
				$head_list=$head_list.",".$selected;
				$contlist=$contlist.",".$grps[$selectCount];
			}
				
//			echo $grps[$selectCount];
			echo "<br>";
			$selectCount++;
			
		}
	}
}
$contlist=$contlist.")";
//echo $contlist;
$head_list=$head_list.")";
//echo $head_list;
//print_r $_POST['selectcol'];
//echo $_POST['selectcol']; // Displays value of checked checkbox.

//header('Location:checked_data.php?file='.$target_file.'&id='.$imageFileType);

$filename = $_POST['fn'];
$f=str_replace('/','\\',$filename);
#echo $f;
$cmd="\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\details.R $f myarray=\"$head_list\" myarray2=\"$contlist\"";
$output=shell_exec($cmd);

//echo $cmd;
//echo $output;
$rep=array('[1]','"');
$det=str_replace($rep,'',$output);
//echo $det;
$details = explode (",", $det);
//echo $details;
echo "<div class = 'container'>";
echo "<table class='table', border=1>";
echo "<b><center> <h1 class= 'p-3 mb-2 bg-secondary text-white'> Uploaded File </b></h1> ";
echo "<tr class='table-secondary'><th> Number of selected Columns </th>";
echo "<td> $details[2] </td></tr>";
echo "<tr class='table-secondary'><th> Number of selected Rows</th>";
echo "<td> $details[1] </td></tr>";
echo "<tr class='table-secondary'><th> Data contains NA</th>";
echo "<td> $details[0] </td></tr>";
echo "<tr class='table-secondary'><th> Minimum value in your data</th>";
echo "<td> $details[3] </td></tr>";
echo "<tr class='table-secondary'><th> Maximum value in your data</th>";
echo "<td> $details[4] </td></tr></table>";
echo "</div>";
#$male_status = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\NAzero.R $f myarray=\"$head_list\"";
//$output1=shell_exec($male_status);
#$female_status = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\NAmin.R $f myarray=\"$head_list\"";
//$output2=shell_exec($female_status);


//print_r($output,true);
//header('Location:tempbox.php');
?>
<form name ="form1" method ="post" action ="Na_replacement.php">
<?php echo "<input type='hidden' Name='filename' value= '$f'>" ?>
<?php echo "<input type='hidden' Name='head' value= '$head_list'>" ?>
<?php echo "<input type='hidden' Name='coun' value= '$contlist'>"?>
<div class='form-check' align="center" >
<input type = 'radio' Name ='NA' value= 'NAZ'>
<?PHP// print $output1; ?>
<h5>Replace NA with zero </h5>

<input type = 'radio' Name ='NA' value= 'NAM'>
<?PHP //echo $output2; ?>
<h5>Replace NA with minimum value</h5>

<P>
<input type = "Submit" Name = "Submit1" class="btn btn-success" VALUE = "Select a Radio Button">
</div>
</form>
</html>