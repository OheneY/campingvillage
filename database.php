<?php  
    class database{

        private $host;
        private $dbh;
        private $user;
        private $pass;
        private $db;

        public function __construct(){
            $this->host = 'localhost';
            $this->user = 'root';
            $this->pass = '';
            $this->db = 'campingvillage';

        try {
            $dsn = "mysql:host=$this->host;dbname=$this->db";
            $this->dbh = new PDO($dsn, $this->user, $this->pass);
        } catch (PDOException $e) {
            die("unable to connect: " . $e->getMessage());

            }
        }
        public function select($statement, $named_placeholder){

            $statement = $this->dbh->prepare($statement);
            $statement->execute($named_placeholder);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function update($statement, $named_placeholder){

            // prepared statement
            $statement = $this->dbh->prepare($statement);
            
            // execute prepared statement
            $statement->execute($named_placeholder);
    
            // redirecten naar overzicht_artikel
            header('location: Overzicht_artikelen.php');
            exit();
        }
    }
    
   
?>