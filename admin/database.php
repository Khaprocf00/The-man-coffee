<?php
include "config.php";
?>
<?php
class Database
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;
#
    public $link;
    public $error;

    public function __construct(){
        $this->connectDB();
    }

    private function connectDB(){
        // try{
        //     $this->link = new PDO('mysql:host = sql310.epizy.com;port = 3306;dbname =	epiz_32669070_baitapnhom','epiz_32669070','wWYIFsq17Swwb9I',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
        //     $this->link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // }
        // catch(PDOException $e){
        //     echo $e->getMessage();
        //     return "có cái nịt để kết nối";
        // }
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->link){
            $this->error = "Connection fail".$this->link->connect_error;
            return false;
        }
    }

    //Select or Read data
    public function select($query){
        $result = $this->link->query($query) or
        die($this->link->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
        }
    //Insert data
    public function insert($query){
        $insert_row = $this->link->query($query) or 
        die($this->link->error.__LINE__);
        if($insert_row){
            return $insert_row;
        }
        else {
            return false;
        }
    }

    //Update data
    public function update($query){
        $update_row = $this->link->query($query) or 
        die($this->link->error.__LINE__);
        if($update_row){
            return $update_row;
        }
        else {
            return false;
        }
    }

    //Delete data
    public function delete($query){
        $delete_row= $this->link->query($query) or 
        die($this->link->error.__LINE__);
        if($delete_row){
            return $delete_row;
        }
        else {
            return false;
        }
    }
    public function login($query){
        $result = $this->link->query($query) or
        die($this->link->error.__LINE__);
        if($result->num_rows == 0)  {
            echo "Đăng nhập thất bại";
        }
        else {
            header('Location:index.php?login=true');
        }
    }  
}
?>
