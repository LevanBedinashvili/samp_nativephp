<?php
define('DB_HOST', 'host.csworld.ge');
define('DB_USER', 'user29887');
define('DB_PASS', 'legacy54321');
define('DB_NAME', 'user29887');

// Create a connection to the database
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(mysqli_connect_errno()) {
  exit("Database connection failed: (" . mysqli_connect_errno() . ")");
}
?>