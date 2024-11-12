<?php
 // Ensure session is started to access logged-in user data

// Include database connection
include("../Asset/Connection/Connection.php");
session_start();
include('Head.php');

// Handle form submission
if (isset($_POST['btn_submit'])) {
    // Check if the user is logged in
    if (!isset($_SESSION['uid'])) {
        echo "You must be logged in to submit a review.";
        exit;
    }

    // Retrieve form data
    $user_id = $_SESSION['uid']; // Assuming user session is set during login
    $packagehead_id = isset($_GET['packagehead_id']) ? $_GET['packagehead_id'] : 1; // Dynamically get package_id (change as per your logic)
    $rating = $_POST['btn_rating']; // User's rating (1-5)
    $review_text = $_POST['txt_review']; // Review text

    // Validate form inputs
    if ($rating < 1 || $rating > 5) {
        echo "Invalid rating. Please submit a rating between 1 and 5.";
        exit;
    }

    if (empty($review_text)) {
        echo "Review text cannot be empty.";
        exit;
    }

    // Escape user inputs for security
    $packagehead_id = mysqli_real_escape_string($con, $packagehead_id);
    $user_id = mysqli_real_escape_string($con, $user_id);
    $rating = mysqli_real_escape_string($con, $rating);
    $review_text = mysqli_real_escape_string($con, $review_text);

    // Prepare SQL query to insert review into database
    $sql = "INSERT INTO tbl_review (packagehead_id, user_id, review_rating, review_text, review_date) 
            VALUES ('$packagehead_id', '$user_id', '$rating', '$review_text', NOW())";

   
    // Execute the query
    if (mysqli_query($con, $sql)) {
        // Redirect to My Bookings page after successful submission
        header("Location: Mybookings.php"); // Change 'my_bookings.php' to the correct path
        exit(); // Ensure no further code is executed
    } else {
        echo "Error submitting review: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Submit Review</title>
<style>
    /* Custom styles */
    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        margin: 20px auto;
    }
    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }
    .form-group input[type="text"], .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }
    .form-group input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }
    .form-group input[type="submit"]:hover {
        background-color: #218838;
    }
    .nav-links {
        text-align: center;
        margin-top: 10px;
    }
    .nav-links a {
        color: #007bff;
        text-decoration: none;
    }
    .nav-links a:hover {
        text-decoration: underline;
    }
    .newcon {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
</head>

<body>
<div class="form-container">
    <h2>Submit Your Review</h2>
    <form id="form1" name="form1" method="post" action="">
        <div class="form-group">
            <label for="btn_rating2">Rating</label>
            <select name="btn_rating" id="btn_rating2">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="txt_review">Your Review</label>
            <input type="text" name="txt_review" id="txt_review" />
        </div>
        <div class="form-group">
            <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        </div>
    </form>
    <div class="nav-links">
        <a href="Mybookings.php">Back to My Bookings</a>
    </div>
</div>
</body>
</html>

<?php
include('Foot.php');
?>
