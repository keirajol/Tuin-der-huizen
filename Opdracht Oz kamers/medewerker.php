<?php
include 'db.php';
$db = new Database();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $sql = "INSERT INTO kamer VALUES (:kamernummer, :type, :prijs)";
        $placeholders = [
            'kamernummer' => null,
            'type' => $_POST['type'],
            'prijs' => $_POST['prijs']
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

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Kamers</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 style="color:red;">Voeg kamers toe</h1>
    <form method="POST">
        <input type="text" name="type" placeholder="type"> <br><br>
        <input type="int" name="prijs" placeholder="prijs"> <br><br>
        <input class="btn btn-primary" type="submit">
    </form>


    <h1>Alle kamers</h1>
        
        <table class="table table-dark">
            <tr>
                <th>kamernummer</th>
                <th>type</th>
                <th>prijs</th>
                <th colspan="2">Action</th>
            </tr>

            <tr>
                <?php foreach($result as $rows) { ?>
                <td><?php echo $rows['kamernummer'] ?></td>
                <td><?php echo $rows['type'] ?></td>
                <td><?php echo $rows['prijs'] ?></td>

                <td><a class="btn btn-primary" href="edit_kamer.php?kamernummer=
                <?php echo trim($rows['kamernummer']);?>
                &type=<?php echo trim($rows['type']);?>
                &prijs=<?php echo trim($rows['prijs']);?>">Edit</a></td>
                <td><a class="btn btn-danger" href="delete_kamer.php?kamernummer=<?php echo $rows['kamernummer']; ?>">Delete</a></td>

            </tr>
            <?php } ?>
        </table>
        <a class="btn btn-secondary" href="alle-res.php">Alle reserveringen</a>
        <a class="btn btn-secondary" href="select-date.php">Maak reservering</a>
        <a class="btn btn-primary" href="res-vandaag.php">Reserveringen vandaag</a>
        <a class="btn btn-primary" href="klanten.php">Klanten</a>
</body>
</html>
