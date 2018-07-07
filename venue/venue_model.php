<?php 
    require("../database.php");
 
    if (isset($_POST['saveDataSubmit'])) {
        $venue_name = $_POST['venue_name'];
        $max_capacity = $_POST['max_capacity'];
        $location = $_POST['location'];
        $price = $_POST['price'];
        $status_venue = $_POST['status_venue'];

        $data = array(
            'venue_name' => $venue_name,
            'max_capacity' => $max_capacity,
            'location' => $location,
            'price' => $price,
            'status_venue' => $status_venue
        );
        saveDataVenue(getLinkDatabase(),$data);
    }

    if (isset($_GET['id_venue'])) {
        $id_venue = $_GET['id_venue'];
        if (isset($_GET['method'])) {
            if (($_GET['method']) == "edit") {
                editVenue($id_venue);
            } elseif (($_GET['method']) == "delete") {
                deleteVenue($id_venue);
            }
        }
    }
    
    function getLinkDatabase(){
        return koneksi_db();  
    }
    function selectAllVenue(){
        $sql = 'SELECT * FROM `venue`';
        $res = mysqli_query(getLinkDatabase(),$sql);
        return $res;
    }

    function editVenue($id_venue){
        $sql = "";
        $data = array();
        $link = getLinkDatabase();
        $sql = "SELECT * FROM venue WHERE id_venue='$id_venue'";
        
        $res = mysqli_query($link,$sql);
        if (mysqli_num_rows($res) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($res)) {
                $data = array (
                    "id_venue" => $row['id_venue'],
                    "max_capacity" => $row['max_capacity'],
                    "venue_name" => $row['venue_name'],
                    "location" => $row['location'],
                    "venue_price" => $row['venue_price'],
                    "status_venue" => $row['status_venue']
                );
            }       
        }    

        $checked1="";
        $checked2="";
        if ($data['status_venue']=='1') {
            $checked1 = "checked";
        } else {
            $checked2 = "checked";
        }
        $res=False;
        include("venue_edit.php");
        if (isset($_POST['updateDataSubmit'])) {
            $data_update = array(
                "id_venue" => $data['id_venue'],
                "max_capacity" => $_POST['max_capacity'],
                "venue_name" => $_POST['venue_name'],
                "location" => $_POST['location'],
                "venue_price" => $_POST['price'],
                "status_venue" => $_POST['status_venue']
            );

            $sql = "UPDATE `venue` 
                SET 
                `max_capacity` = '$data_update[max_capacity]', 
                `venue_name` = '$data_update[venue_name]', 
                `venue_price` = '$data_update[venue_price]', 
                `status_venue` = '$data_update[status_venue]' 
                WHERE `venue`.`id_venue` = $id_venue";
            
            $res = mysqli_query($link,$sql);
                if ($res) {
                    header('Location: venue.php');
                } else {
                    "<h1> Failed to update data </h1>";
            }
         } else {

        }
             
        
    }

    // function saveData

    function saveDataVenue($link,$data){
        $sql = "INSERT INTO `venue` 
        (`id_venue`, `max_capacity`, `venue_name`, `location`, `venue_price`,`status_venue`) 
        VALUES (NULL, '$data[max_capacity]', '$data[venue_name]', '$data[location]', '$data[price]','$data[status_venue]')";
        $res = mysqli_query($link,$sql);
        if ($res) {
            header('Location: venue.php');
        } else {
            header('Location: venue_add.php');
        }
    }

    function deleteVenue($id){
        $sql = "DELETE FROM `venue` WHERE `venue`.`id_venue` = '$id'";
        $res = mysqli_query(getLinkDatabase(),$sql);
        header('Location: venue.php');
        
    }

    
    
?>