<?php

    class admin {
        public function __construct()
        {
            include_once "../model/Db.php";
            include_once "load.php";
            include_once "../inc.php";
            $this->db = new Db();
            $this->load = new load();
        }
        public function login()
        { 
            if(isset($_SESSION["name_ad"])){
                header('location:?url1=main');
            }
            else{
                $xem["admin"] = $this->db->query("select * from admin");
                $this->load->viewad("admin/login",$xem);
            }
        }
        public function main()
        {
            if(isset($_SESSION["name_ad"])){
                $this->load->viewad("admin/header");
                $this->load->viewad("admin/main");
                $this->load->viewad("admin/footer");
            }
            else header('location:?url1=login');
        }
        public function viewthemsp()
        {
            if(isset($_SESSION["name_ad"])){
                $xem["catalog"] = $this->db->query("select * from catalog");
                $this->load->viewad("admin/header");
                $this->load->viewad("admin/themsp",$xem);
                $this->load->viewad("admin/footer");
            }
            else header('location:?url1=login');
        }
        public function luusp()
        {
            $xem["product"] = $this->db->query("select * from product");
            $check = true;
            unset($_SESSION["loithemsp"]);
           
          
            $name = postIndex("name");
            $catalog_id = postIndex("parent_id");
            $content = postIndex("content");
            $gia = postIndex("gia");
            $discount = postIndex("discount");
            $created = date('Y/m/d H:i:s ', time());
            if(str_word_count($content)<=1){
                $check = false;
                $_SESSION['loisuasp'] = 'content Sản Phẩm Không Được ít hơn một chữ';
            }
            if($name == ""){
                $check = false;
                $_SESSION['loisuasp'] = 'Tên Sản Phẩm Không Được Trống';
            }
            if($gia == ""){
                $check = false;
                $_SESSION['loisuasp'] = 'Giá Sản Phẩm Không Được Trống';
            }

            //xu ly upload files hinh 
            $thumuc = '../image/'.$_FILES['image_link']['name'];

            //Lấy phần mở rộng (phần đuôi của thư mục)
            $file_type = strtolower(pathinfo($thumuc, PATHINFO_EXTENSION));
            $ex = array('jpg', 'png','jpeg');
            if(!in_array($file_type,$ex)){
                $check = false;
                $_SESSION['loithemsp'] = 'File Upload Không Hợp Lệ !';
            }

            if(file_exists($thumuc)){
                $check = false;
                $_SESSION['loithemsp'] = 'File Hình Upload Đã Tồn Tại !';
            }

            
            foreach ($xem["product"] as $k => $v) {
                if ($name == $v['name']) {
                    $_SESSION["loithemsp"] = "Tên Sản Phẩm Đã Tôn Tại !";
                    $check = false;
                }
            }
            
            if($check != false){
                $data = array(
                    'catalog_id' => $catalog_id,
                    'name' => $name,
                    'content' => $content,
                    'price' => $gia,
                    'discount' => $discount,
                    'image_link' => $_FILES['image_link']['name'],
                    'image_list' => $_FILES['image_list']['name'],
                    'view' => "1",
                    'buyed' => "1",
                    'rate_total' => "4",
                    'rate_count' => "1",
                    'created' => $created
                );
                
                move_uploaded_file($_FILES['image_link']['tmp_name'],$thumuc);
                $this->db->them("product",$data);
                $_SESSION["loithemsp"] = "Lưu Thành Công ";
            }
            header('location:?url1=viewthemsp');
        }
        public function suasp()
        {
            if(isset($_SESSION["name_ad"])){
                $this->load->viewad("admin/header");
                $xem["product"] = $this->db->query("select * from product where id = ".$_GET["id"]);
                $xem["catalog"] = $this->db->query("select * from catalog");
                $this->load->viewad("admin/suasp",$xem);
                $this->load->viewad("admin/footer");  
            }
            else header('location:?url1=login');
        }
        public function capnhatsp()
        {

            $n =  $_GET["id"];
            $dieukien = "id = '$n' ";

            $xem["product"] = $this->db->query("select * from product");
            $xem["product1"] = $this->db->query("select * from product where id = '$n'");
            $check = true;
            unset($_SESSION["loisuasp"]);
            
            //xu ly upload files hinh 
            $thumuc = '../image/'.$_FILES['image_link']['name'];

            
            //Lấy phần mở rộng (phần đuôi của thư mục)
            $file_type = strtolower(pathinfo($thumuc, PATHINFO_EXTENSION));
            $ex = array('jpg', 'png','jpeg');
            if($_FILES['image_link']['name'] != ""){
                if(!in_array($file_type,$ex)){
                    $check = false;
                    $_SESSION['loisuasp'] = 'File Upload Không Hợp Lệ !';
                }
            }
            

            if($thumuc != "../image/"){
                if(file_exists($thumuc)){
                    $check = false;
                    $_SESSION['loisuasp'] = 'File Hình Upload Đã Tồn Tại !';
                }
            }
            
          
            $name = postIndex("name");
            $catalog_id = postIndex("parent_id");
            $content = postIndex("content");
            $gia = postIndex("gia");
            $discount = postIndex("discount");
            $created = date('Y/m/d H:i:s ', time());
            
            if($name == ""){
                $check = false;
                $_SESSION['loisuasp'] = 'Tên Sản Phẩm Không Được Trống';
            }
            if($gia == ""){
                $check = false;
                $_SESSION['loisuasp'] = 'Giá Sản Phẩm Không Được Trống';
            }
            if(str_word_count($content)<=1){
                $check = false;
                $_SESSION['loisuasp'] = 'content Sản Phẩm Không Được ít hơn một chữ';
            }
            


            if($check != false){
                if($_FILES['image_link']['name']){
                    $thumuchinh = "../image/".$xem["product1"][0]["image_link"];
                    move_uploaded_file($_FILES['image_link']['tmp_name'],$thumuc);
                    unlink($thumuchinh); 
                    $data = array(
                        'catalog_id' => $catalog_id,
                        'name' => $name,
                        'content' => $content,
                        'price' => $gia,
                        'discount' => $discount,
                        'image_link' => $_FILES['image_link']['name'],
                        'created' => $created
                    );
                    
                    $this->db->sua("product",$data,$dieukien);
                    $_SESSION["loisuasp"] = "Lưu Thành Công";
                }
                else {
                    $data = array(
                        'catalog_id' => $catalog_id,
                        'name' => $name,
                        'content' => $content,
                        'price' => $gia,
                        'discount' => $discount,
                        'created' => $created
                    );

                    $this->db->sua("product",$data,$dieukien);
                    $_SESSION["loisuasp"] = "Lưu Thành Công";
                }
            }
            header('location:?url1=suasp&&id='.$n);
        }
        public function viewxoasp()
        {
            if(isset($_SESSION["name_ad"])){
                $this->load->viewad("admin/header");
                $xem["product"] = $this->db->query("select * from product where id = ".$_GET['id']);
                $this->load->viewad("admin/xoasp",$xem);
                $this->load->viewad("admin/footer"); 
            }
            else header('location:?url1=login');
        }
        public function xoasp()
        {
            $n =  $_GET["id"];
            $dieukien = "id = '$n' ";
            $xem["product"] = $this->db->query("select * from product where id = ".$_GET['id']);
            //xoa file hinh da luu
            $thumuchinh = "../image/".$xem["product"][0]["image_link"];
            unlink($thumuchinh); 
            //xoa du lieu san pham
            $this->db->xoa("product",$dieukien);
            header('location:?url1=danhmuc');
        }
        public function khach()
        {
            if(isset($_SESSION["name_ad"])){
                $this->load->viewad("admin/header");
                $xem["user"] = $this->db->query("select * from user");
                $this->load->viewad("admin/khach",$xem);
                $this->load->viewad("admin/footer"); 
            }
            else header('location:?url1=login');
        }

        public function don()
        {
            if(isset($_SESSION["name_ad"])){
                $xem["transaction"] = $this->db->query("SELECT * from transaction");
                $this->load->viewad("admin/header"); 
                $this->load->viewad("admin/donhang",$xem);
                $this->load->viewad("admin/footer");
            }
            else header('location:?url1=login');
        }
        public function danhmuc()
        {
            if(isset($_SESSION["name_ad"])){
                $xem["catalog"] = $this->db->query("SELECT * from catalog where parent_id = 1");
                $xem["product"] = $this->db->query("SELECT * from product");
                $this->load->viewad("admin/header");
                $this->load->viewad("admin/bar", $xem);
                $this->load->viewad("admin/dm", $xem);
                $this->load->viewad("admin/footer");
            }
            else header('location:?url1=login');
        }
        public function voucher()
        {
            if(isset($_SESSION["name_ad"])){
                $xem["product1"] = $this->db->query("select * from  product");
                $this->load->viewad("admin/header");

                if (isset($_GET['id'])) {
                    $xem["catalog"] = $this->db->query("select * from  catalog where parent_id = " . $_GET['id'] . "");
                    if(count($xem["catalog"])==0){
                        $xem["catalog"] = $this->db->query("select * from  catalog where id = " . $_GET['id'] . "");
                    }
                    if(count($xem["catalog"])==0){
                        $xem["catalog"] = $this->db->query("select * from  catalog");
                    }
                    foreach($xem["catalog"] as $k=>$v){
                        foreach($xem["product1"] as $ka=>$va){
                            if($va['catalog_id'] == $v['id']){
                                $xem['product'][] = $va;
                            }
                        }
                    }
                    $this->load->viewad("admin/bar",$xem);
                }
                $this->load->viewad("admin/dm",$xem);
                $this->load->viewad("admin/footer"); 
            }
            else header('location:?url1=login');
        }
        public function dangxuat()
        {
            session_destroy();
            $xem["admin"] = $this->db->query("select * from admin");
            $this->load->viewad("admin/login",$xem);
        }
        

    }

?>