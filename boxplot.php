<?php
$head_list="c(";
$grps = $_POST['groupno'];
if (isset($_POST['submit']))
{
	if(!empty($_POST['selectcol']))
	{
		$selectCount=0;
		foreach($_POST['selectcol'] as $selected)
		{
			
			//echo $selected."</br>";
			if($selectCount == 0)
			{	
				$head_list=$head_list.$selected;
			}
			else
			{
				$head_list=$head_list.",".$selected;
			}
				
			echo $grps[$selectCount];
			echo "<br>";
			$selectCount++;
			
		}
	}
}
$head_list=$head_list.")";
//echo $head_list;
//print_r $_POST['selectcol'];
//echo $_POST['selectcol']; // Displays value of checked checkbox.

//header('Location:checked_data.php?file='.$target_file.'&id='.$imageFileType);

$filename = $_POST['fn'];
$f=str_replace('/','\\',$filename);
#echo $f;
$cmd="\"C:\Program Files\R\R-3.6.1\bin\Rscript.exe\" C:\\xampp\htdocs\prot\\test.R $f myarray=\"$head_list\"";
$output=shell_exec($cmd);

//echo $cmd;
//echo $output;




header('Location:tempbox.php');
?>
