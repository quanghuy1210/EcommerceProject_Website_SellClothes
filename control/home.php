<?php
class home
{ 
    public function __construct()
    {
        include_once "model/Db.php"; 
        include_once "load.php";
        include_once "./inc.php";
        $this->db = new Db();
        $this->load = new load();
    }
    public function index()
    {

        $xem["catalog"] = $this->db->query("SELECT * from catalog where parent_id = 1");
        $xem["product1"] = $this->db->query("SELECT * from product");
        $limit = 6;
        $total_records = count($xem["product1"]);
        $total_page = ceil($total_records/$limit);
        $xem["total_page"] = $total_page;

        
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            $offset = ($page - 1) * $limit;
            $xem["product"] = $this->db->query("SELECT * from product LIMIT ".$limit." OFFSET ".$offset);
        }
        else{
            $xem["product"] = $this->db->query("SELECT * from product LIMIT ".$limit." OFFSET 0");
        }

        
        
        


        $this->load->view("header");
        $this->load->view("bar", $xem);
        $this->load->view("main", $xem);
        $this->load->view("footer");
    }
    public function timkiem()
    {
        $this->load->view("header");
        $xem["catalog"] = $this->db->query("SELECT * from catalog where parent_id = 1");
        $this->load->view("bar", $xem);
        
        if (isset($_POST['tim'])) {
            if(is_string($_POST['tim'])){
                $n =trim($_POST['tim']);
                $xem["product"] = $this->db->query("SELECT * FROM product WHERE name like'%$n%'");
                if($_POST["ss"]==1){
                    $xem["product"] = $this->db->query("SELECT * FROM product WHERE name like'%$n%' ORDER BY price ASC");
                }
                else{
                    $xem["product"] = $this->db->query("SELECT * FROM product WHERE name like'%$n%' ORDER BY price DESC");
                }  
                $this->load->view("main", $xem);
            }
        }
        $this->load->view("footer");
    }
    public function dangnhap()
    {
        unset($_SESSION['name']);

        $xem["user"] = $this->db->query("select * from  user");

        $this->load->view("header");
        $this->load->view("login", $xem);
        $this->load->view("footer");
    }
    public function dangky()
    {
        $xem["user"] = $this->db->query("select * from  user");
        $this->load->view("header");
        $this->load->view("dangky", $xem);
        $this->load->view("footer");
    }
    public function viewuser()
    {
        $xem["user"] = $this->db->query("select * from  user");
        foreach($xem["user"] as $k => $v){
            if($v["name"] == $_SESSION["name"]){
                $_SESSION["idnguoidung"]  = $v['id']; 
            }
        }
        $xem["user1"] = $this->db->query("select * from  user where id = ".$_SESSION["idnguoidung"]);
        // $xem["transaction"] = $this->db->query("select * from  transaction ");
        $xem["transaction"] = $this->db->query("select * from  transaction where user_id = ".$_SESSION["idnguoidung"]);

        $this->load->view("header");
        $this->load->view("user");
        $this->load->view("lichsu",$xem);
        $this->load->view("footer");
    }
    public function viewdoiMKUser()
    {
        $xem["user"] = $this->db->query("select * from  user where id = ".$_GET["id"]);
        $this->load->view("header");
        $this->load->view("user");
        $this->load->view("doimkuser",$xem);
        $this->load->view("footer");
    }
    public function doimkuser()
    {
        $n =  $_GET["id"];
        $dieukien = "id = '$n' ";
        $xem["user"] = $this->db->query("select * from  user where id = ".$n);
        $check = true ;

        $passold = md5(postIndex("pass"));
        $passnew = md5(postIndex("newpass"));
        $passnew1 = md5(postIndex("newpass1"));

        if($passold != $xem["user"][0]["password"]){
            $check = false;
            $_SESSION["loidoimk"] = "Sai Mật Khẩu Củ !";
        }
        if($passnew != $passnew1){
            $check = false;
            $_SESSION["loidoimk"] = "Mật Khẩu Mới Không Trùng Khớp !";
        }
        if($check == true){
            $data = array(
                'password' => $passnew
            );
            $this->db->sua("user",$data,$dieukien);
            $_SESSION["loidoimk"] = "Lưu Thành Công";
        }
        header('location:?url1=viewdoiMKUser&&id='.$n);
    }
    public function user()
    {
        $xem["user"] = $this->db->query("select * from  user");
        if (isset($_SESSION["check"])) {
            $created = date('Y/m/d H:i:s ', time());
            $data  = array(
                'name' => $_SESSION["name"],
                'email' => $_SESSION["user_mail"],
                'password' => $_SESSION["user_pass"],
                'phone' => $_SESSION["user_phone"],
                'address' => $_SESSION["user_ar"],
                'created' => $created
            );
            $this->db->them("user", $data);
            unset($_SESSION["check"]);
        }
        // header('location:?url1=viewuser');
        $xem["user"] = $this->db->query("select * from  user");
        foreach($xem["user"] as $k => $v){
            if($v["name"] == $_SESSION["name"]){
                $_SESSION["idnguoidung"]  = $v['id'];
            }
        }
        $xem["user1"] = $this->db->query("select * from  user where id = ".$_SESSION["idnguoidung"]);
        // $xem["transaction"] = $this->db->query("select * from  transaction ");
        $xem["transaction"] = $this->db->query("select * from  transaction where user_id = ".$_SESSION["idnguoidung"]);

        $this->load->view("header");
        $this->load->view("user");
        $this->load->view("lichsu",$xem);
        $this->load->view("footer");
    }

    public function chitiet()
    {
        $xem["product"] = $this->db->query("select * from  product where id = ".$_GET["id"]);
        $this->load->view("header");

        if (isset($_SESSION['id_danhmuc'])) {
            unset($_SESSION['id_danhmuc']);
        }
        if (isset($_GET['id'])) {
            foreach ($xem['product'] as $k => $v) {
                if ($_GET['id'] == $v['id']) {
                    $_SESSION['id_danhmuc'] = $v['catalog_id'];
                }
            }
        }
        if (isset($_SESSION['id_danhmuc'])) {
            $xem["catalog"] = $this->db->query("select * from  catalog where id = " . $_SESSION['id_danhmuc'] . "");
            $this->load->view("bar", $xem);
        }


        $this->load->view("chitiet", $xem);
        $this->load->view("footer");
    }
    public function dm()
    { 
        $xem["product1"] = $this->db->query("select * from  product");
        $this->load->view("header");
        if (isset($_GET['id'])) {
            $xem["catalog"] = $this->db->query("select * from  catalog where parent_id = " . $_GET['id']);
            if(count($xem["catalog"])==0){
                $xem["catalog"] = $this->db->query("select * from  catalog where id = " . $_GET['id']);
            }
            foreach($xem["catalog"] as $k=>$v){
                foreach($xem["product1"] as $ka=>$va){
                    if($va['catalog_id'] == $v['id']){
                        $xem['product'][] = $va;
                    }
                }
            }
            $this->load->view("bar", $xem);
        }
        if(isset($xem['product']))
            $this->load->view("main", $xem);

        $this->load->view("footer");
    }
    public function doi()
    {   
        $xem["user"] = $this->db->query("select * from user");
        foreach($xem["user"] as $k => $v){
            if($v["name"] == $_GET["name"]){
                $xem["user"] = $this->db->query("select * from user where id = ".$v["id"]);
            }
        }
        $this->load->view("header");
        $this->load->view("user");
        $this->load->view("doi",$xem);
        $this->load->view("footer");
    }
    public function suaUser()
    {
        $n =  $_GET["id"];
        $dieukien = "id = '$n' ";

        $xem["user"] = $this->db->query("select * from user");
        $xem["user1"] = $this->db->query("select * from user where id = ".$n);

        $check = true;
        unset($_SESSION["loiuser"]);

        $name = postIndex("name");
        $email = postIndex("email");
        $address = postIndex("address");
        $phone = postIndex("phone");
        $created = date('Y/m/d H:i:s ', time());

        //kiem tra dung dinh dang luu
        if($name != $xem["user1"][0]["name"])
        {
            foreach($xem["user"] as $k=>$v){
                if($name == $v["name"]){
                    $_SESSION["loiuser"] = "Trùng Tên Người Dùng";
                    $check = false;
                }
            }
        }
        if($email != $xem["user1"][0]["email"]){
            foreach($xem["user"] as $k=>$v){
                if($email == $v["email"]){
                    $_SESSION["loiuser"] = "Trùng Email Người Dùng";
                    $check = false;
                }
            }
        }
        if(!checksdt($phone)){
            $_SESSION["loiuser"] = "Số điện thoại phải là số và đủ 10 số";
            $check = false;
        }
        if(!checkEmail($email)){
            $_SESSION["loiuser"] = "Sai cú pháp nhập lại email";
            $check = false;
        }

        if($name == $xem["user1"][0]["name"] && $email == $xem["user1"][0]["email"] && $phone ==$xem["user1"][0]["phone"] && $address == $xem["user1"][0]["address"]){
            $_SESSION["loiuser"] = "Chẳn Có Gì Thay Đổi Cả";
            $check = false;
        }
        
        if($check == true){
            

            $data = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'created' => $created
            );
            
            $this->db->sua("user",$data,$dieukien);
            $_SESSION["loiuser"] = "Lưu Thành Công";
            $_SESSION["name"] = $name;
        }
        header('location:?url1=doi&&name='.$_SESSION["name"]);
    }
    public function gio()
    {
        $xem["gio1"] = $this->db->query("select * from product");
        if(isset($_GET['id'])){
            if(isset($_GET['sl'])) {
                $n = $_GET['id'];
                if(isset($_SESSION["cart"][$n])){
                    $_SESSION["cart"][$n] = $_SESSION["cart"][$n] + $_GET['sl'];
                }
                else{
                    $_SESSION["cart"][$n] = "";
                    $_SESSION["cart"][$n] = $_GET['sl'];
                }
                $xem["gio"] = [];
                foreach ($_SESSION["cart"] as $key => $value) {
                    foreach($xem["gio1"] as $k=>$v){
                        if($key == $v['id']){
                            $xem["gio"][] = $xem["gio1"][$k];
                        }
                    }
                }
            }
        }
        else{
            $xem["gio"] = [];
            if(isset($_SESSION['cart'])){
                foreach ($_SESSION['cart'] as $key => $value) {
                    foreach ($xem["gio1"] as $k => $v) {

                        if($key == $v["id"]){
                            $xem["gio"][] = $xem["gio1"][$k];
                        }
                    }
                }
            }
        }
        // print_r($_SESSION["cart"]);
        // echo '<pre>';
        // print_r($xem["gio"]);
        // echo '</pre>';
        // exit();


        // print_r($_SESSION["cart"]);
        // // var_dump($_SESSION["cart"]);
        // echo "<pre>";
        // print_r( $xem["gio"]);
        // echo "<pre>";
        // // unset($_SESSION["cart"]);
        // exit();

        $this->load->view("header");
        $this->load->view("giohang",$xem);
        $this->load->view("footer");
    }
    public function loi()
    {
        echo "<h1>Đã xảy ra lỗi</h1>";
        echo "<h2>Xin kiểm tra lại đường dẫn</h2>";
    }
    public function dangxuat()
    {
        session_destroy();
        header('location:?url1=index');
    }
}
