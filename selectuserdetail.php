<html>
<body>
<head>
<style>
table {
border-collapse: collapse;
width: 100%;
height: 50px;
color: #588c7e;
font-family: 'Times New Roman';
font-size: 25px;
text-align: left;
}
th {
background-color: blue;
color: white;
}

tr:nth-child(even) {background-color: #f2f2f2}
.label {
  color: grey ;
  padding: 10px;
  padding-left: 350px;
  font-size: 40px;
  transform: translate(-400%,-50%);
  font-family: 'Times New Roman', Times, serif;
  
}
.amount{
    color: grey;
    padding: 10px;
    padding-left: 400px;
    font-size: 40px;
    font-family: 'Times New Roman', Times, serif;
}
.table{
    font-size: 25px;
}
.form-control {
    font-size: 25px;
    font-family: 'Times New Roman', Times, serif;
}
.btn {
  background-color:crimson;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  transform: translate(500%,-20%);
}
.btn-primary {
    color: white;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}
</style>
</head>
    
<?php include('nav.html'); ?>
<br>
<br>
<?php
include('create.php');
if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id='$from'";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id='$to'";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }
    // constraint to check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }
    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id='$from'";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id='$to'";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transactionhistory.php';
                           </script>";
                }
                $newbalance= 0;
                $amount =0;
        }   
}
?>
	<div class="container">
            <?php
                include 'create.php';
                $sid = isset($_GET['id']) ? $_GET['id'] : '';
                $sql = "SELECT * FROM  users WHERE id='$sid'";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        <br>
        <span class="label Transfer">Transfer to :</span>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'create.php';
                $sid = isset($_GET['id']) ? $_GET['id'] : '';
                $sql = "SELECT * FROM users WHERE id!='$sid'";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>

                
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label class = "amount">Amount  </label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn btn-primary" name="submit" type="submit" id="btn">Transfer</button>
            </div>
        </form>
    </div>
</body>
</html>