<?php

$db_host = "sql101.epizy.com";
$db_user = "epiz_23552199";
$db_pass = "4fQhZKbhZosxEa";
$db_name = "epiz_23552199_302_new";




$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
	echo "";
	
};
