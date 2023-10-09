<!--Nơi xử lý các hàm của product-->

<?php
include "database.php";
?>




<?php
class product {
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function show_category(){
        $query = "SELECT * FROM category ORDER BY category_id ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_product(){
        $query = "SELECT product.*,category.category_name 
        FROM product JOIN category ON product.category_id = category.category_name
        ORDER BY product.product_id  DESC";
        $result = $this->db->select($query);
        return $result;
    }
 

    public function insert_product(){
        //Chèn vào bảng này cột này dữ liệu j
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_name'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_img = $_FILES['product_img']['name'];
        $filetype = strtolower(pathinfo($product_img,PATHINFO_EXTENSION));
        if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg"){
            $alert =  "Lưu ý: Chỉ chọn file .jpg, .png, .jpeg ";
            return $alert;
        } 
        else {
            move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$product_img);
            $query = "INSERT INTO product (product_name,category_id,product_price,product_desc,product_img) VALUES ('$product_name','$category_id','$product_price','$product_desc','$product_img')";
            $result = $this->db->insert($query);
            header('Location:product_list.php');
        }

    }

    public function get_product($product_id){
        $query = "SELECT * FROM product WHERE product_id = '$product_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_product($category_id,$product_name, $product_id, $product_price, $product_desc, $product_img){
        $query = "UPDATE product SET product_name = '$product_name', category_id='$category_id', product_price='$product_price', product_desc='$product_desc', product_img='$product_img'
        WHERE product_id = '$product_id'";
        $result = $this->db->update($query);
        header('Location:product_list.php');
        return $result;
    }

    public function  delete_product($product_id){
        // $querys ="select * FROM product WHERE product_id=$product_id";
        // $results = $this->db->select($querys);
        // $row = $results->fetch_assoc();
        // $k = "../uploads/".$row['product_img'];
        // unlink("'$k'");
        $query ="DELETE FROM product WHERE product_id='$product_id'";
        $result = $this->db->delete($query);
        header('Location:product_list.php');
        return $result;
    }
}
?>