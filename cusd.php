<?php
require "dbcofig.php";
?>
<html>
<title> customer detailes </title>
<head>
<center>
<style> 
#c {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
  margin-left:auto;
  margin-right:auto;
}

#c td, #c th {
  border: 1px solid #ddd;
  padding: 8px;
}

#c tr:nth-child(even){background-color: #f2f2f2;}

#c tr:hover {background-color: #ddd;}

#c th {
  padding-top: 10px;
  padding-bottom: 10px;
  text-align: left;
  background-color: #000000;
  color: white;
}
</style>
</head>
<body>

<h2> DISPLAY CUSTOMER DETAILES</h2>
</center>
<table id="c">
<thead>
<tr>
<th>Acc_id</th>
<th>NAME</th>
<th>EMAIL</th>
<th>CURRENT BALANCE</th>


</tr>
</thead>
<tbody>
<?php
$query="select * from customer";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){
	?>
	<tr> 
	<td align="center"> <?php echo $row["id"];?> </td>
	<td align="center"> <?php echo $row["name"];?> </td>	
	<td align="center"> <?php echo $row["email"];?> </td>	
	<td align="center"> <?php echo $row["currentbalance"];?> </td>
     	
	
	</tr>
	<?php 
}
?>
</tbody>
</body>
</html>