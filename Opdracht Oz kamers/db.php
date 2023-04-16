<?php 
class Database {
    private $database;
    private $username;
    private $password;
    private $host;
    private $dbh;

    public function __construct() {
        $this->database = 'huis_der_tuin';
        $this->username = 'root';
        $this->password = '';
        $this->host = 'localhost';

            try {
                $dsn = "mysql:host=$this->host;dbname=$this->database"; 
                $this->dbh = new PDO($dsn, $this->username, $this->password);
            } catch (\Exception $e) {
                die('failed to connect to database'.$e->getMessage());
            }
    }

    public function insert($sql,$placeholders) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholders);
    }
    public function lastInsertID() {
        return $this->dbh->lastInsertID();
    }
   public function delete($sql,$placeholders) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholders);
   }
  public function update($sql,$placeholders) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholders);
   }
   
    public function select($sql,$placeholder = []) {
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute($placeholder);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($result)) {
                return $result;
            }
    } 

    public function login($username, $password) {
        $sql = "SELECT username, password FROM medewerker WHERE username=:username";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            'username'=> $username
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!is_null($result)){
            if($username && password_verify($password, $result['password'])){
                header("location: medewerker.php");
            }else{
                echo 'Username or password is incorrect.';
                exit();
            }
        }
    }

    public function registerUser($klantnummer, $username, $adres, $plaats, $postcode, $telefoon) {
        $sql = "INSERT INTO klant VALUES (:klantnummer, :naam, :adres, :plaats, :postcode, :telefoon)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            'klantnummer'=> null,
            'naam'=> $username,
            'adres'=> $adres,
            'plaats'=> $plaats,
            'postcode'=> $postcode,
            'telefoon'=> $telefoon
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!is_null($result)){
            header('Location:medewerker.php');
        }
    }
}

?>