<?php
include 'db.php';
$db = new Database();
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    try
    {
        $db->registerUser(
            trim($_POST['klantnummer']),
            trim($_POST['username']), 
        trim($_POST['adres']), 
        trim($_POST['plaats']), 
        trim($_POST['postcode']), 
        trim($_POST['telefoon']));
        header('Location:medewerker.php');
    }
    catch (Exception $ex)
    {
        echo $ex->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <form method="POST">
    <input type="text" name="username" placeholder="gebruikersnaam" required> <br><br>
    <input type="text" name="adres" placeholder="adres" required> <br><br>
    <input type="text" name="plaats" placeholder="plaats" required> <br><br>
    <input type="text" name="postcode" placeholder="postcode" required> <br><br>
    <input type="text" name="telefoon" placeholder="telefoon" required> <br><br>
    <input class="btn btn-primary" type="submit" value="registerUser">
    </form>
</body>
</html>