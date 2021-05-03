<?php
$nt = $_GET['nt'];
$gr = $_GET['gr'];
if (isset($nt))
{
	if ($nt == 'Quantile Normalization')
	{
		$cmdqn = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\quantilenorm.R myarray3=\"$gr\"";
		echo $cmdqn;
		$outputqn=shell_exec($cmdqn);
		echo $outputqn;
		echo "<img src='uploads/boxplotqn.png'>";
	}
	else if ($nt == 'Qsmooth Quantile Normalization')
	{
		$cmdqs = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\qsmooth.R myarray3=\"$gr\"";
		echo $cmdqs;
		$outputqs=shell_exec($cmdqs);
		echo $outputqs;
		echo "<img src='uploads/boxplotqs.png'>";
	}
	else if ($nt == 'Mean Normalization')
	{
		$cmdmean = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\meannorm.R myarray3=\"$gr\"";
		echo $cmdmean;
		$outputmean=shell_exec($cmdmean);
		echo $outputmean;
		echo "<img src='uploads/boxplotmean.png'>";
	}
	else if ($nt == 'Median Normalization')
	{
		$cmdmed = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\mediannorm.R myarray3=\"$gr\"";
		echo $cmdmed;
		$outputmed=shell_exec($cmdmed);
		echo $outputmed;
		echo "<img src='uploads/boxplotmed.png'>";
	}
	else if ($nt == 'Sum Normalization')
	{
		$cmdsum = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\sumnorm.R myarray3=\"$gr\"";
		$outputsum=shell_exec($cmdsum);
		echo $outputsum;
		echo "<img src='uploads/boxplotsum.png'>";
	}
}
else if (isset($nttt))
{
		if ($nttt == 'T-test paired')
	{
		$cmdtp = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\ttestpaired.R myarray3=\"$gr\"";
		$outputtp=shell_exec($cmdtp);
		echo $outputtp;
		echo "<img src='uploads/volcano_p.png'>";
	}
			if ($nttt == 'T-test unpaired')
	{
		$cmdtup = "\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\ttestunpaired.R myarray3=\"$gr\"";
		$outputtup=shell_exec($cmdtup);
		echo $outputtup;
		echo "<img src='uploads/volcano_un.png'>";
	}
}
?>