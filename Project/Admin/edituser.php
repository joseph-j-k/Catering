<?php
session_start();
// Include database connection
include ('../Asset/Connection/Connection.php');

// Get user ID from URL
$user_id = $_GET["user_id"];

// Fetch user data from tbl_user
$query = "SELECT * FROM tbl_user WHERE user_id = $user_id";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $place_id = $_POST['place_id'];  // Place should be selectable from a list
    
    // Update the user record in the database
    $update_query = "UPDATE tbl_user SET user_name = '$name', user_email = '$email', user_phone = '$phone', place_id = '$place_id' WHERE user_id = $user_id";
    
    if (mysqli_query($con, $update_query)) { // Use $con instead of $conn
        echo "User information updated successfully!";
        header('Location: viewusers.php'); // Redirect to user listing after update
        exit;
    } else {
        echo "Error updating user information: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $user['user_name']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['user_email']; ?>" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $user['user_phone']; ?>" required><br>

        <label for="place_id">Place:</label>
        <select name="place_id" required>
            <?php
            // Fetch all places for dropdown
            $places_query = "SELECT * FROM tbl_place";
            $places_result = mysqli_query($con, $places_query); // Use $con instead of $conn
            while ($place = mysqli_fetch_assoc($places_result)) {
                echo "<option value='{$place['place_id']}'" . ($place['place_id'] == $user['place_id'] ? ' selected' : '') . ">{$place['place_name']}</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" value="Update User">
    </form>
</body>
</html>
