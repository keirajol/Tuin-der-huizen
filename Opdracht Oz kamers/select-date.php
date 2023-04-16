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
    <h1 style="color:red;">Kies begin en einddatums</h1>
    <form method="GET" action="reserveer.php">
        <input type="date" name="beginDatum" placeholder="Begin Datum"> <br><br>
        <input type="date" name="eindDatum" placeholder="Eind Datum"> <br><br>
        <input class="btn btn-primary" type="submit">
    </form>
</body>
</html>
