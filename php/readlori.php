<?php
    $servername = "sql5c0f.megasqlservers.com";
    $username = "loriholste768563";
    $password = "EmmaDave007";
    $dbname = "EmmaDave_loriholste768563";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    

$sql = "SELECT * FROM red";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>blue</th><th>orange</th><th>pink</th><th>black</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["blue"]."</td><td>".$row["orange"]." ".$row["pink"]."<td>".$row["black"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>