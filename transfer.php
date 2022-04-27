
<?php
include 'dbcofig.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customer where id='$from'";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customer where id='$to'";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
         echo '<script>alert("Oops! Negative values cannot be transferred")</script>';
        
    }
  
    // constraint to check insufficient balance.
    else if($amount > $sql1['currentbalance']) 
    {
       
        echo '<script>alert("Bad Luck! Insufficient Balance")</script>';  // showing an alert box.
        
    }
   
    // constraint to check zero values
    else if($amount == 0){
         echo '<script>alert("Oops! Zero value cannot be transferred")</script>';
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['currentbalance'] - $amount;
                $sql = "UPDATE customer set currentbalance=$newbalance where id='$from'";
                mysqli_query($conn,$sql);
                

                // adding amount to reciever's account
                $newbalance = $sql2['currentbalance'] + $amount;
                $sql = "UPDATE customer set currentbalance=$newbalance where id='$to'";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
				
                $sqlfinal= "INSERT INTO transcation(sender,reciver,amount,datetime)Values('$sender','$receiver','$amount',CURRENT_TIMESTAMP)";
               
                if( mysqli_query($conn,$sqlfinal)){
                     echo '<script>alert("Transaction Successful")</script>';
					 header('refresh:0;url=transactionhistory.php');
                }
				else
				{
					echo'<script>alert("error")</script>';
				}

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>

	<div class="container">
        <h2 class="text-center pt-4">Transaction</h2>
            <?php
                include 'dbcofig.php';
                $id=$_GET['id'];
                $sql = "SELECT * FROM  customer where id='$id' ";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post"  class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
					<th class="text-center">transver</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['currentbalance'] ?></td>
					<td> <button type="button" class="btn btn-success" >transfer </button>  </td> 
                </tr>
            </table>
        </div>
        <br>
        <label>Transfer To:</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'dbcofig.php';
                $id=$_GET['id'];
                $sql = "SELECT * FROM customer where id!='$id'";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['currentbalance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
