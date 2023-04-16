<?php
include 'db.php';
include 'medewerker.php';
$db = new Database();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $sql = "INSERT INTO kamer VALUES (:kamernummer, :type, :prijs)";
        $placeholders = [
            'kamernummer' => null,
            'type' => $_POST['']
        ];
        $db->insert($sql,$placeholders);
        echo "<script>alert('Inserted successfully');</script>";
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}
// ALLE KAMERS
$sqlKamers = "Select * from kamer";
$result = $db->select($sqlKamers);

// AANTAL BESCHIKBARE KAMERS VANDAAG
$sqlAantal = "Select COUNT(*) from kamer where kamernummer not in (select kamernummer from reservering where van = CURDATE())";
$resAantal = $db->select($sqlAantal);
foreach ($resAantal as $res) {
    foreach ($res as $re) {

    }
 }
 echo "<h4>Vandaag zijn er $re kamers beschikbaar</h4>";

?>
