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


    $sql = "INSERT INTO lori (FirstName, LastName, Age, City, Country)
    VALUES ('John', 'Doe', 35, 'Simcoe', 'Canada')";




    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    Close connection
    $conn->close();
?>
