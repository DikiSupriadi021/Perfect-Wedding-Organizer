
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="venue.php">Back</a>
    <form action="venue_model.php" method="post">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="venue_name" id=""></td>
        </tr>
        <tr>
            <td>Max Capacity</td>
            <td><input type="text" name="max_capacity" id=""></td>
        </tr>
        <tr>
            <td>Location</td>
            <td><textarea name="location" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="price" id=""></td>
        </tr>
        <tr>
            <td>
                ON<input type="radio" name="status_venue" id="" value="1" checked>
                OFF<input type="radio" name="status_venue" id="" value="0">
            </td>
        </tr>
    </table>
    <input type="submit" name="saveDataSubmit" value="Save">
    </form>
</body>
</html>   