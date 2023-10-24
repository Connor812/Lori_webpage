<?php
    $servername = "sql5c0f.megasqlservers.com";
    $username = "loriholste768563";
    $password = "EmmaDave007";
    $dbname = "lori_loriholste768563";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully to Lori";
    

$sql = "SELECT * FROM members";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>FirstName</th><th>LastName</th><th>Email</th><th>Number</th><th>text1</th><th>text2</th><th>text3</th><th>soundfile1</th><thsSoundfile2</th><th>image1</th><th>image2</th><th>video</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["FirstName"]."</td><td>".$row["LastName"]." ".$row["Email"]."<td>".$row["Number"]."</td><td>".$row["text1"]."</td><td>".$row["text2"]."</td><td>".$row["text3"]."</td><td>".$row["soundfile1"]."</td><td>".$row["soundfile2"]."</td><td>".$row["image1"]."</td><td>".$row["image2"]."</td><td>".$row["video"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

$conn->close();
?>