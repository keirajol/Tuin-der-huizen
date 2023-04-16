<?php
    include 'db.php';
    $db = new Database();

    $kamernummer = $_GET['kamernummer'];
    if($kamernummer) {
    try {
        $sql = "DELETE FROM kamer where kamernummer=:kamernummer";
        $placeholders = [
            'kamernummer' => $kamernummer
        ];
        $db->delete($sql,$placeholders);
        header("Location:medewerker.php");
    } catch (\Exception $e) { 
        echo $e->getMessage();
    }
}
   


?>