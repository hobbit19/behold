<?php 
    require "/pineapple/components/infusions/behold/includes/db.php";



    $db = new DB();
    $db->create_client($_SERVER['REMOTE_ADDR']);

?>
