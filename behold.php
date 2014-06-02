<?php

require "db.php";


$db = new DB(); 
$db->delete_clients();
$clients = $db->clients();
print_r($db->client_count());

?>
