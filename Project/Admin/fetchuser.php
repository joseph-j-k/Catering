<?php
// Include database connection
include('../Asset/Connection/Connection.php');

// Fetch all users from tbl_user
$query = "SELECT user_name, user_email FROM tbl_user"; // Adjust fields as necessary
$result = mysqli_query($con, $query);

$users = array();
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row; // Append each user to the array
}

// Return the user list as JSON
header('Content-Type: application/json');
echo json_encode($users);
?>
