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
  $sql = "CREATE TABLE pet_type (
    pet_type_id INT AUTO_INCREMENT PRIMARY KEY,
    pet_type VARCHAR(50) NOT NULL
)";

  if ($conn->query($sql) === TRUE) {
    echo "Table pet_type created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  // SQL to insert data
  $sql = "INSERT INTO pet_type (pet_type_id, pet_type) VALUES
(1, 'dog'),
(2, 'cat'),
(3, 'rodent')";

  if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
  } else {
    echo "Error inserting data: " . $conn->error;
  }

  $conn->close();
