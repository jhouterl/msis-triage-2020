<?php

require 'common.php';

// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
$sql = 'SELECT * FROM Certifications';
$vars = [];

if (isset($_GET['certification_id'])) {
  // This is an example of a parameterized query
  $sql = 'SELECT * FROM Certifications WHERE certification_id = ?';
  $vars = [ $_GET['certification_id'] ];
}

$stmt = $db->prepare($sql);
$stmt->execute($vars);

$certList = $stmt->fetchAll();

// Step 3: Convert to JSON
$json = json_encode($certList, JSON_PRETTY_PRINT);

// Step 4: Output
header('Content-Type: application/json');
echo $json;
