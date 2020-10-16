<?php

require 'common.php';

// Step 0: Validate the incoming data
// This code doesn't do that, but should ...
// For example, if the date is empty or bad, this insert fails.


// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
// Note the use of parameterized statements to avoid injection
$stmt = $db->prepare(
  'INSERT INTO Person (first_name, last_name, gender, street_address, city, state, zipcode, phone, email, radio_number, station_num, position_name)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
);

$stmt->execute([
#  $person_id,
  $_POST['first_name'],
  $_POST['last_name'],
  $_POST['gender'],
  $_POST['street_address'],
  $_POST['city'],
  $_POST['state'],
  $_POST['zipcode'],
  $_POST['phone'],
  $_POST['email'],
  $_POST['radio_number'],
  $_POST['station_num'],
  $_POST['position_name']
#  $_POST['isactive']
]);

// If needed, get auto-generated PK from DB
// $pk = $db->lastInsertId();  // https://www.php.net/manual/en/pdo.lastinsertid.php

// Step 4: Output
// Here, instead of giving output, I'm redirecting to the SELECT API,
// just in case the data changed by entering it
// header('HTTP/1.1 303 See Other');
 //header('Location: ../public/');
