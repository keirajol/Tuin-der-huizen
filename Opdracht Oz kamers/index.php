<?php
include 'db.php';
// $db = new Database();
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    try
    {
        $db->login(trim($_POST['username']), trim($_POST['password']));
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
    <input type="text" name="username" placeholder="username" required> <br><br>
    <input type="password" name="password" placeholder="password" required> <br><br>
    <input class="btn btn-primary" type="submit" value="Login">
    </form>
</body>
</html>