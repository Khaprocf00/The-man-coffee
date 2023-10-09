<?php
include "database.php";
?>

<?php
class size
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert_size()
    {
        //Chèn vào bảng này cột này dữ liệu j
        $name_size = $_POST['name'];
        $price_size = $_POST['price'];
        $query = "INSERT INTO option_size (name,price) VALUES ('$name_size','$price_size')";
        $result = $this->db->insert($query);
        header('Location:size_list.php');
    }

    public function show_size()
    {
        $query = "SELECT * FROM option_size ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_size($size_id)
    {
        $query = "SELECT * FROM option_size WHERE id = $size_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_size($size_id)
    {
        $name_size = $_POST['name'];
        $price_size = $_POST['price'];
        $query = "UPDATE option_size SET name = '$name_size', price = $price_size WHERE id = $size_id";
        $result = $this->db->update($query);
        header('Location:size_list.php');
        return $result;
    }

    public function  delete_size($size_id)
    {
        $query = "DELETE FROM option_size WHERE id='$size_id'";
        $result = $this->db->delete($query);
        header('Location:size_list.php');
        return $result;
    }
}
?>