<?php
    require 'venue_model.php';
    var_dump($_SERVER["PHP_SELF"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="venue_add.php">ADD</a> <a href="venue_delete"></a>
    <table>
        <tr>
            <td>No</td>
            <td>Venue Name</td>
            <td>Max Capacity</td>
            <td>Location</td>
            <td>Price</td>
            <td>Status</td>
            <td>Delete</td>
        </tr>
        <?php
            $no=1; 
           $res =  selectAllVenue();
           if (mysqli_num_rows($res) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($res)) {
                 ?>
            
            <tr>
                <td><a href="venue_model.php?id_venue=<?php echo $row['id_venue'] ?>&method=edit"><?php echo $no ?></a></td>
                <td><?php echo $row["venue_name"] ?></td>
                <td><?php echo $row["max_capacity"] ?></td>
                <td><?php echo $row["location"] ?></td>
                <td><?php echo $row["venue_price"] ?></td>
                <td><?php echo $row['status_venue'] ?></td>
                <td><a href="venue_model.php?id_venue=<?php echo $row['id_venue'] ?>&method=delete">Delete</a></td>
            </tr>

            <?php    
            $no++;
            }
        } else {
            echo "0 results";
        }
   ?>
    </table>
</body>
</html>