<?php
// database connection class using PDO
// learned this in week 3

class Database {
    private $host;
    private $dbName;
    private $username;
    private $password;
    public $conn;
    
    // constructor to set connection details
    public function __construct() {
        $this->host = DB_HOST;
        $this->dbName = DB_NAME;
        $this->username = DB_USER;
        $this->password = DB_PASS;
    }
    
    // get database connection
    public function getConnection() {
        $this->conn = null;
        
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbName,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        
        return $this->conn;
    }
}
?>