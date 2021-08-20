<!DOCTYPE html>
<html>
<head>
<?php include('nav.html');?>
<br><br>
<style>
table {
border-collapse: collapse;
width: 100%;
height: 500px;
font-family: 'Times New Roman', Times, serif;
font-size: 25px;
margin-top: 25px;
text-align: left;
}
th {
background-color: blue;
color: white;
}
/* tr:nth-child(even) {background-color: #f2f2f2} */
</style>
</head>
<body>
<?php include "create.php";
$sql = "SELECT * FROM transaction ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table>";
  echo "<tr>";
  echo "<th>Transfered From</th>";
  echo "<th>Transfered To</th>";
  echo "<th>Amount</th>";
  echo "<th>DateAndTime</th>";
   echo "</tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo '<td>' .$row["sender"] ."</td>";
    echo '<td>' .$row["receiver"] ."</td>";
    echo '<td>' .$row["balance"] ."</td>";
    echo '<td>' .$row["datetime"] ."</td>";
    echo "</tr>";
  }
  
  echo "</table>"; 
} else {
  echo "0 results";
}
$conn->close();
?>