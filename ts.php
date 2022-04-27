<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>transcation page</title>
	
	<link rel="stylesheet" type="text/css" href="css/wrk.css" />
	<style>
h1 {text-align:center;}
</style>
</head>
<body>
<h1 style="color:blue" class="text-center text-primary">customer detailes</h1>

<table border='5' align='center'>
<thead>
<tr> 
<th> SL.NO</th>
<th> NAME </th>
<th> EMAIL </th>
<th>BALANCE </th>
<th> TRANSVER </th>
</tr>
</thead>
</body>




<tbody>
<?php

require "dbcofig.php";

$sql="SELECT * FROM customer";
$res=mysqli_query($conn,$sql);
//$res=mysqli_fetch_assoc($res);


  ?>
		
		<tr> 
		<td> <center><?php echo $c;?> </center></td>
		
		
		<td> <center> <?php echo $row['id'];?></center></td>
                    <td> <center> <?php echo $row['name'];?></center></td>
		<td> <center> <?php echo $row['email'];?></center></td>
		<td> <center> <?php echo $row['currentbalance'];?></center></td>
		<button type="button" class="btn btn-success">Transfer</button>
		
		
		</tr>
	
	
	</tbody>
	</table>
	
</html>