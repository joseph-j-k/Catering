<?php
// Include database connection
include('../Asset/Connection/Connection.php');

// Query to fetch order details with joins to get user and package details
$query = "
    SELECT 
        b.booking_id, 
        u.user_name, 
        b.booking_date AS booking_date, 
        b.booking_fordate AS event_date, 
        b.booking_status, 
        b.booking_amount
    FROM tbl_booking b
    INNER JOIN tbl_user u ON b.user_id = u.user_id";

// Execute the query
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <link rel="stylesheet" href="../Asset/CSS/style.css"> <!-- Add your CSS file path -->
</head>
<body>
 <table border="1">
  <tr>
   <td><a href="adminhomepage.php">BACK</a></td>
  </tr>
 </table>
    <div class="container">
        <h2>Order Details</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Booking Date</th>
                    <th>Event Date</th>
                    <th>Status</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are results
                if (mysqli_num_rows($result) > 0) {
                    // Fetch each row of data
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Map the status values to human-readable labels
                        switch ($row['booking_status']) {
                            case '1':
                                $status = "Accepted";
                                break;
                            case '2':
                                $status = "Rejected";
                                break;
                            case '3':
                                $status = "Paid";
                                break;
                            default:
                                $status = "Pending"; // Default status if none match
                        }

                        echo "<tr>
                            <td>{$row['user_name']}</td>
                            <td>{$row['booking_date']}</td>
                            <td>{$row['event_date']}</td>
                            <td>{$status}</td> <!-- Updated to show status -->
                            <td>{$row['booking_amount']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No orders found.</td></tr>"; // Changed colspan to 5
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($con);
?>
