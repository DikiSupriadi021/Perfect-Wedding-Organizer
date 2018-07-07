<?php
    function koneksi_db() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $db = "db_perfectweddingorganizer";

        $link = mysqli_connect($host, $username, $password, $db);

        if (!$link) {
            die ("Could not connect to database".mysqli_error);
        }
        
        return $link;
    }
?>