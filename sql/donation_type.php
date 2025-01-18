<?php
  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "db_23056792";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // SQL to create table
  $sql = "CREATE TABLE donation_type (
    donation_type_id INT AUTO_INCREMENT PRIMARY KEY,
    donation_type VARCHAR(50) NOT NULL
)";

  if ($conn->query($sql) === TRUE) {
    echo "Table donation_type created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  // SQL to insert data
  $sql = "INSERT INTO donation_type (donation_type_id, donation_type) VALUES
(1, 'monthly'),
(2, 'one_off'),
(3, 'will')";

  if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
  } else {
    echo "Error inserting data: " . $conn->error;
  }

  $conn->close();
