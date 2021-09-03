<?php
class load
{
    public function __construct()
    {
        
    }
    public function view($finame, $xem=null)
    {
        include "./views/".$finame.".php";
    }

    public function viewad($finame, $xem=null)
    {
        include "../views/".$finame.".php";
    }

}

?>