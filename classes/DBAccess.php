<?php
class DBAccess{
    private $_DSN;
    private $_userName;
    private $_password;
    private $_pdo;

    public function __construct($DSN, $userName, $password)
    {
        $this->_DSN = $DSN;
        $this->_userName = $userName;
        $this->_password = $password; 
    }

    public function connect()
    {
        try
        {
            $this->_pdo = new PDO($this->_DSN, $this->_userName, $this->_password);
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e)
        {
            die("Connection Failed" . $e->getMessage());
        }
        return $this->_pdo;
    }
    public function disconnect(){
        $this->_pdo = "";
    }
    public function executeSQL($stmt){
        try
        {
            $stmt->execute();
            $rows = $stmt->fetchAll();
        }catch(PDOException $e)
        {
            die("Query Failed: " . $e->getMessage());
        }
        return $rows;
    }
    public function executeSQLReturnOneValue($stmt){
        try
        {
            $stmt->execute();
            $row = $stmt->fetchColumn();
        }
        catch(PDOException $e)
        {
            die("Query Failed: " . $e->getMessage());
        }
        return $row;
    }
    public function executeNonQuery($stmt, $pkid=false)
    {
        try
        {
            $value = $stmt->execute();

            if($pkid == true)
            {
                $value = $this->_pdo->lastInsertId();
            }
        }
        catch(PDOException $e)
        {
            if($e->getCode() === "23000")
            {
                $value = -1;
            }
            else
            {
                die("Query failed: " . $e->getMessage());
            }
        }

        return $value;
    }
}
