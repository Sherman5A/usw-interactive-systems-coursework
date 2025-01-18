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
  $sql = "CREATE TABLE donation (
    donation_id INT AUTO_INCREMENT PRIMARY KEY,
    donation_type_id INT NOT NULL,
    donator_name VARCHAR(50) NOT NULL,
    donation_email TEXT NOT NULL,
    donation_amount DECIMAL(12, 2) NOT NULL,
    donation_message VARCHAR(200) NULL,
    comm_preference VARCHAR(40) NULL,
    show_billboard TINYINT(1) NOT NULL,
    CONSTRAINT donation_donation_type__fk FOREIGN KEY (donation_type_id) REFERENCES donation_type (donation_type_id) ON UPDATE CASCADE
)";

  if ($conn->query($sql) === TRUE) {
    echo "Table donation created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  // SQL to insert data
  $sql = "INSERT INTO donation (donation_id, donation_type_id, donator_name, donation_email, donation_amount, donation_message, comm_preference, show_billboard) VALUES
(1, 1, 'Jeff Chaplan', 'jimkeller@gmail.com', 5.00, 'Here\'s to the pets!', 'email', 1),
(2, 2, 'Joseph Lewis', 'josephlewis@hotmail.com', 20.01, 'Hope this money helps', 'email', 1),
(3, 2, 'Alun Davies', 'alundavies@outlook.com', 19.12, 'Had some spare change, here!', 'email', 1),
(4, 1, 'Aubrey Old', 'aubrey1000@gmail.com', 1000.00, 'Here\'s some of my will', 'phone', 1),
(5, 2, 'John Davies', 'john-davies@tiscali.co.uk', 0.05, 'Here\'s a bob', 'phone', 1),
(6, 2, 'Rhys Williams', 'rhyswilliams@faw.co.uk', 1.20, 'Some extra money', 'newsletter', 1)";

  if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
  } else {
    echo "Error inserting data: " . $conn->error;
  }

  $conn->close();
