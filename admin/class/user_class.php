<?php
include "database.php";
?>

<?php
class user {
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert_user($username,$password,$status){
        //Chèn vào bảng này cột này dữ liệu j
        $query = "INSERT INTO user(username,password,status) VALUES ('$username','$password','$status')";
        $result = $this->db->insert($query);
        header('Location:user_list.php');
        //return $result;
    }

    public function show_user(){
        $query = "SELECT * FROM user ORDER BY user_id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_user($user_id){
        $query = "SELECT * FROM user WHERE user_id = '$user_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_user($username, $password, $status, $user_id){
        $query = "UPDATE user SET username= '$username', password='$password', status='$status' WHERE user_id = '$user_id'";
        $result = $this->db->update($query);
        header('Location:user_list.php');
        return $result;
    }

    public function  delete_user($user_id){
        $query ="DELETE FROM user WHERE user_id='$user_id'";
        $result = $this->db->delete($query);
        header('Location:user_list.php');
        return $result;
    }

    public function login_user($username,$password){
        $query ="SELECT* FROM user WHERE username='$username' AND password='$password'";
        $result = $this->db->login($query);
    }
}
?>