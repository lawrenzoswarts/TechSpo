<?php
class DBController {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "techspo_store";
    protected $conn;

    function __construct() {
        $this->conn = $this->connectDB();
    }

    private function connectDB() {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $conn;
    }

    function runQuery($query) {
        $result = mysqli_query($this->conn, $query);

        // Check if the query is an INSERT statement
        if (strpos(strtoupper($query), 'INSERT') !== false) {
            return $result; // Return the result directly for INSERT queries
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }

        if (!empty($resultset)) {
            return $resultset;
        }
    }

    function getConn() {
        return $this->conn;
    }
}
?>
