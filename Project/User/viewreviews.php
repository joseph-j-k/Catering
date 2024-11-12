<?php
include('../Asset/Connection/Connection.php');
session_start();

if (isset($_GET['pid'])) {
    $packagehead_id = $_GET['pid'];

    // Fetch the reviews for the specific package using direct query
    $query = "SELECT r.review_text, r.review_rating, u.user_name 
              FROM tbl_review r 
              INNER JOIN tbl_user u ON r.user_id = u.user_id 
              WHERE r.packagehead_id = '".$packagehead_id."'";

    $result = $con->query($query); // Execute the query directly
} else {
    // Redirect or show error if no package ID is provided
    header("Location: searchpackage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews for Package ID: <?php echo htmlspecialchars($packagehead_id); ?></title>
    <style>
        /* Add the enhanced CSS here */
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f8f8f8; /* Light background */
        }
        h2 {
            color: #333; /* Darker text for better readability */
            text-align: center;
        }
        .review {
            background-color: #ffffff; /* White background for reviews */
            border: 1px solid #ddd;
            border-radius: 8px; /* Rounded corners */
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            transition: transform 0.2s; /* Smooth scale on hover */
        }
        .review:hover {
            transform: scale(1.02); /* Slightly enlarge on hover */
        }
        .review h4 {
            margin: 0;
            color: #ffcc00; /* Gold color for ratings */
        }
        .review p {
            color: #666; /* Slightly gray text for reviews */
            font-size: 16px;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #ffcc00; /* Gold background */
            color: #333; /* Dark text color */
            text-decoration: none;
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s; /* Smooth background color change */
        }
        a:hover {
            background-color: #e6b800; /* Darker gold on hover */
        }
    </style>
</head>
<body>

<h2>Reviews for Package ID: <?php echo htmlspecialchars($packagehead_id); ?></h2>

<div class="reviews-container">
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='review'>";
        echo "<h4>" . htmlspecialchars($row['user_name']) . " (Rating: " . htmlspecialchars($row['review_rating']) . "/5)</h4>";
        echo "<p>" . htmlspecialchars($row['review_text']) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No reviews yet for this package.</p>";
}
?>
</div>

<a href="searchpackage.php">Back to Search</a>

</body>
</html>
