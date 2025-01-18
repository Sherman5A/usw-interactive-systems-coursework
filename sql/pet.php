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
  $sql = "CREATE TABLE pet (
    pet_id INT AUTO_INCREMENT PRIMARY KEY,
    pet_type_id INT NOT NULL,
    pet_name VARCHAR(50) NULL,
    pet_description TEXT NOT NULL,
    previous_owners INT NULL,
    pet_weight FLOAT NOT NULL,
    pet_colour VARCHAR(20) NOT NULL,
    image_path VARCHAR(500) NULL,
    CONSTRAINT pet_type__fk FOREIGN KEY (pet_type_id) REFERENCES pet_type (pet_type_id) ON UPDATE CASCADE
)";

  if ($conn->query($sql) === TRUE) {
    echo "Table pet created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  // SQL to insert data
  $sql = "INSERT INTO pet (pet_id, pet_type_id, pet_name, pet_description, previous_owners, pet_weight, pet_colour, image_path) VALUES
(1, 1, 'gwen', 'A small lapdog. Very laid-back. Previous owner moved abroad and was unable to keep him.', 1, 5, 'white', 'gwen.jpg'),
(2, 2, 'sid', 'Very old cat. Sid sleeps for most of the day. She has been loved for many years. Previous owners died of old age.', 1, 4, 'amber', 'sid.jpg'),
(3, 1, 'lulu', 'Lulu requires a fair bit of attention and walking, otherwise she can cause trouble. She\'s had several families that could not meet her requirements. Any family adopting her should be dedicating to loving her.', 4, 10, 'brown', 'lulu.jpg'),
(4, 3, 'stuart little', 'Stuart Little is a small mouse. Beware, Mice are nocturnal and they can smell.', 2, 0.04, 'white', 'stuart-little.jpg')";

  if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
  } else {
    echo "Error inserting data: " . $conn->error;
  }

  $conn->close();
