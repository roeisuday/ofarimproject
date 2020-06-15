<html>
<body>

<?php
$servername = "localhost:3306";
$username = "morbi_issa";
$password = "12345";
$dbname = "morbi_donation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT firstname, lastname, email, sum, creditcard, cvv, day, month, year  FROM payment";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     echo "<style>table{  text-align:center; background-color:yellow; border: 2px blue solid;} tr{ color: red; border: 2px blue solid;} td{ color: red; border: 2px blue solid;}</style><table><tr><th>first name</th><th>last name</th><th>email</th><th>sum</th><th>credit card</th><th>cvv</th><th>day</th><th>month</th><th>year</th>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["sum"]. "</td><td>" . $row[creditcard]. "</td><td>" . $row[cvv] . "</td><td>" . $row[day] . "</td><td>". $row[month]. "</td><td>". $row[year]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$sum=$_POST["sum"];
$creditcard=$_POST["creditcard"];
$cvv=$_POST["cvv"];
$day=$_POST["day"];
$month=$_POST["month"];
$year=$_POST["year"];

$sql2="INSERT INTO payment (firstname, lastname, email, sum, creditcard, cvv, day, month, year) VALUES ('".$firstname."','".$lastname."','".$email."','".$sum."','".$creditcard."','".$cvv."','".$day."','".$month."','".$year."');";
$conn->query($sql2);;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   echo "<style>table{  text-align:center; background-color:yellow; border: 2px blue solid;} tr{ color: red; border: 2px blue solid;} td{ color: red; border: 2px blue solid;}</style><table><tr><th>first name</th><th>last name</th><th>email</th><th>sum</th><th>credit card</th><th>cvv</th><th>day</th><th>month</th><th>year</th>";
     // output data of each row
     while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["sum"]. "</td><td>" . $row[creditcard]. "</td><td>" . $row[cvv] . "</td><td>" . $row[day] . "</td><td>". $row[month]. "</td><td>". $row[year]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}
$conn->close();
?>  


<br>
</body>
</html>