<?php
include 'db.php';
$db = new Database();

$sql = "INSERT INTO medewerker VALUES(:medewerkerID,:username,:password)";
$placeholders = [
    'medewerkerID' => null,
    'username' => 'admin',
    'password' => password_hash('admin', PASSWORD_DEFAULT)
];
$db->insert($sql,$placeholders);

?>