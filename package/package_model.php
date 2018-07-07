<?php 
    require("../database.php");
    $link = koneksi_db();

    $package_name = $_POST['package_name'];
    $max_capacity = $_POST['max_capacity'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    
    if (isset($_POST['saveDataSubmit'])) {
       // $sql = "select * from pengguna where username = '$username' and password = '$password'";
        $res = mysqli_query($link,$sql);
        $ketemu = mysqli_num_rows($res);
        $data = mysqli_fetch_array($res);    
    } 

    function savePackage()
    {
        echo '<h1> HAIII ANJING </h1>';
    }

?>