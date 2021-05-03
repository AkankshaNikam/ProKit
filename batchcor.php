<?php

$filename=$_GET['file'];
$f=str_replace('/','\\',$filename);
$ntt = $_GET['ntt'];
$gr = $_GET['gr'];
if (isset($ntt))
{
	if ($ntt == 'Combat Batch Correction')
	{
		$cmdcbc = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\combat_batch.R $f myarray3=\"$gr\"";
		$outputcbc=shell_exec($cmdcbc);
		echo $cmdcbc;
		echo $outputcbc;
		echo "<img src='uploads/volcano_p.png'>";
	}
	if ($ntt == 'T-test unpaired')
	{
		$cmdtup = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\ttestunpaired.R myarray3=\"$gr\"";
		$outputtup=shell_exec($cmdtup);
		echo $outputtup;
		echo "<img src='uploads/boxplotcbc.png'>";
	}
}