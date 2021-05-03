<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- jQuery library -->
<script src="jquery-3.5.1.js"></script>

<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.min.js"></script>
<body>
<section class="p-3 mb-2 bg-secondary text-center">
<div class="container">
<table width="1200">
<form action="bh_upload.php" method="post" enctype="multipart/form-data">

<tr>
<td width="40%"><center> <h1 class="p-3 mb-2 bg-secondary text-white"> Upload Your File </h1></td>
<td width="80%"><input type="file" name="file" id="file"  /></td>
</tr>

<tr>
<td> <h1 class="p-3 mb-2 bg-secondary text-white"><center>Submit</h1></td>
<td> <input type="submit" class="btn btn-success" name="submit" /></td>
</tr>
</section>
</form>
</table>
</body>
</html>