<?php 
//$natype =$_POST['NA'];
//echo $natype;

$sub = $_POST['Submit1'];
$selected_radio = $_POST['NA'];
$f=$_POST['filename'];
$hea=$_POST['head'];
$grps = $_POST['coun'];
if ($selected_radio == 'NAZ') {

$male_status = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\NAzero.R $f myarray=\"$hea\"";
//echo $male_status;
$output1=shell_exec($male_status);
echo "<input type= 'hidden' name = 'file_NA' value = '$output1'>";
//echo $output1;+
}
else if ($selected_radio == 'NAM') {

$female_status = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\NAmin.R $f myarray=\"$hea\"";
$output2=shell_exec($female_status);
echo "<input type= 'hidden' name = 'file_NA' value = '$output2'>";
//echo $output2;
//echo $female_status;
}
if (isset($sub))
{
	if ($selected_radio == 'NAZ')
	{
		$cmdz = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\Boxzero.R myarray=\"$grps\"";
		//echo $cmdz;
		$outputz=shell_exec($cmdz);
		echo "<input type= 'hidden' name = 'file_NA' value = '$outputz'>";
		echo "<input type='hidden' Name='grpp' value= '$grps'>";
		header('Location:tempbox.php?grpp='.$grps);
	}
	else
	{
		$cmdn = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\Boxmin.R myarray=\"$grps\"";
		$outputn = shell_exec($cmdn);
		#echo $cmdn;
		echo "<input type='hidden' Name='grpp' value= '$grps'>";
		header('Location:tempbox2.php?grpp='.$grps);
	}
}
?>
