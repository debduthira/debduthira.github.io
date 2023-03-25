<?php
// Get form data
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// Set database credentials
$host = 'db.xbueyvymbaplaziopxkz.supabase.co';
$dbname = 'postgres';
$user = 'postgres';
$password = 'GUDDUdebdut007';

// Establish database connection
$db = pg_connect("host=$host dbname=$dbname user=$user password=$password");

// Insert guest details into database
$result = pg_query_params($db, "INSERT INTO guest(name, address, phone) VALUES($1, $2, $3)", array($name, $address, $phone));

if (!$result) {
  die("Error in SQL query: " . pg_last_error());
} else {
  echo "Guest details entered successfully!";
}

// Close database connection
pg_close($db);
?>
