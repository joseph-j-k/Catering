<?php

include('../Asset/Connection/Connection.php');


$query ="SELECT u.user_id, u.user_name, u.user_email, u.user_phone, p.place_name 
          FROM tbl_user u
          INNER JOIN tbl_place p ON u.place_id = p.place_id";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
</head>
<body>
    <h1>All Users</h1>
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Place</th>
            <th>Actions</th>
        </tr>

        <?php
        // Loop through each user and display their data
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['user_id'] . "</td>";
                echo "<td>" . $row['user_name'] . "</td>";
                echo "<td>" . $row['user_email'] . "</td>";
                echo "<td>" . $row['user_phone'] . "</td>";
                echo "<td>" . $row['place_name'] . "</td>";
                echo "<td><a href='edituser.php?user_id=".$row['user_id']."'>Edit</a> | <a href='delete_user.php?user_id=".$row['user_id']."'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No users found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
