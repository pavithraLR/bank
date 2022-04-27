<?php 
require "dbcofig.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<style>
	.transfer{
		color:white; 
		margin-top:5px; 
		background-color:black;
		font-family: 'Adamina';font-size: 40px;
	}
	</style>
</head>
<body>

<div class="container">
	<form action="" class="tabletext">
		<h1><center><div class="transfer" >Transaction History</div></center></h1>
			<table  class="table table-striped table-condensed table-bordered" style="margin-top:50px;">
                        <thead>
                            <tr>
                            <th><center>slno</center></th>
                            <th><center>Sender</center></th>
                            <th><center>Receiver</center></th>
                            <th><center>Amount Transfer</center></th>
                            
                            </tr>
                        </thead>
                        <tbody>
						<?php
$query="select * from transcation;";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){
	?>
	<tr> 
	<td align="center"> <?php echo $row["slno"];?> </td>
	<td align="center"> <?php echo $row["sender"];?> </td>	
	<td align="center"> <?php echo $row["reciver"];?> </td>	
	<td align="center"> <?php echo $row["amount"];?> </td>
     	
	
	</tr>
	<?php 
}
?>
	</body>
	<html>
        