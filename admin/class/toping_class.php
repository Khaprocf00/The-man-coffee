<?php
include "database.php";
?>

<?php
class toping
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert_toping()
    {
        //Chèn vào bảng này cột này dữ liệu j
        $name_toping = $_POST['name'];
        $price_toping = $_POST['price'];
        $query = "INSERT INTO option_toping (name,price) VALUES ('$name_toping','$price_toping')";
        $result = $this->db->insert($query);
        header('Location:toping_list.php');
    }

    public function show_toping()
    {
        $query = "SELECT * FROM option_toping ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_toping($toping_id)
    {
        $query = "SELECT * FROM option_toping WHERE id = $toping_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_toping($toping_id)
    {
        $name_toping = $_POST['name'];
        $price_toping = $_POST['price'];
        $query = "UPDATE option_toping SET name = '$name_toping', price = $price_toping WHERE id = $toping_id";
        $result = $this->db->update($query);
        header('Location:toping_list.php');
        return $result;
    }

    public function  delete_toping($toping_id)
    {
        $query = "DELETE FROM option_toping WHERE id='$toping_id'";
        $result = $this->db->delete($query);
        header('Location:toping_list.php');
        return $result;
    }
}
?>