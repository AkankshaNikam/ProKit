<?php
$nttt = $_GET['nttt'];
$gr = $_GET['gr'];
if (isset($nttt))
{
	if ($nttt == 'T-test paired')
	{
		$cmdtp = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\ttestpaired.R myarray3=\"$gr\"";
		$outputtp=shell_exec($cmdtp);
		echo $cmdtp;
		//echo $outputtp;
		echo "<img src='uploads/volcano_p.png'>";
	}
	elseif ($nttt == 'T-test unpaired')
	{
		$cmdtup = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\ttestunpaired.R myarray3=\"$gr\"";
		$outputtup=shell_exec($cmdtup);
		//echo $outputtup;
		//echo "<img src='uploads/volcano_un.png'>";
	}
}
?>