<? 
require "db.php";
$db = new DB();
?>
Client Count: <?= $db->client_count(); ?>
