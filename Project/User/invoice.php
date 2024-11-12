<?php
session_start();
include ('../Asset/Connection/Connection.php');  // Include your database connection

// Ensure the user is logged in
if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['uid'];  // User's session ID

// Get booking_id from the URL
if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];
} else {
    echo "Booking ID not provided.";
    exit();
}

// Fetch user details
$query_user = "SELECT user_name, user_email, user_phone FROM tbl_user WHERE user_id = '$user_id'";
$result_user = mysqli_query($con, $query_user);
$user = mysqli_fetch_assoc($result_user);

// Fetch booking details
$query_booking = "SELECT b.booking_id, b.booking_date,b.booking_fortime, b.booking_fordate, b.booking_address, b.booking_amount, 
                         b.booking_details, b.booking_status, b.booking_count, b.booking_service
                  FROM tbl_booking b
                  WHERE b.booking_id = '$booking_id'";
$result_booking = mysqli_query($con, $query_booking);
$booking = mysqli_fetch_assoc($result_booking);

// Convert booking status to readable format
$bookingStatus = "";
switch ($booking['booking_status']) {
    case '1':
        $bookingStatus = "Pending";
        break;
    case '2':
        $bookingStatus = "Rejected";
        break;
    case '3':
        $bookingStatus = "Completed";
        break;
}
$bookingDateTime = new DateTime($booking['booking_date']);
$bookingDate = $bookingDateTime->format('Y-m-d'); // Format the date
$bookingTime = $bookingDateTime->format('H:i:s'); // Format the time

// Generate the invoice table
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>User Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2, h3 {
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .header-table {
            width: 100%;
            border: none;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- Header -->
<table class='header-table'>
    <tr>
        <td>
            <h2>ABC Catering Services</h2>
            <p>123 Main St, City, State</p>
            <p>Contact: +91-9876543210 | Email: info@abccatering.com</p>
        </td>
    </tr>
</table>

<!-- User and Invoice Information -->
<table>
    <tr>
        <td><strong>User Information:</strong><br>
            Name: {$user['user_name']}<br>
            Email: {$user['user_email']}<br>
            Phone: {$user['user_phone']}
        </td>
        <td>
            <strong>Invoice #:</strong> INV{$booking['booking_id']}<br>
            <strong>Booking Date:</strong> {$booking['booking_date']}<br>
            <strong>Booking Time:</strong> {$bookingTime}<br> 
        </td>
    </tr>
</table>

<!-- Booking Details -->
<h3>Booking Details</h3>
<table>
    <thead>
        <tr>
            <th>Event Date</th>
            <th>Time</th>
            <th>Address</th>
            <th>Count</th>
            <th>Service</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{$booking['booking_fordate']}</td>
            <td>{$booking['booking_fortime']}</td>
            <td>{$booking['booking_address']}</td>
            <td>{$booking['booking_count']}</td>
            <td>{$booking['booking_service']}</td>
            <td>₹{$booking['booking_amount']}</td>
        </tr>
    </tbody>
</table>

<p><strong>Status:</strong> {$bookingStatus}</p>
<p><strong>Details:</strong> {$booking['booking_details']}</p>

<!-- Footer -->
<div class='footer'>
    <p>Thank you for choosing ABC Catering Services!</p>
    <p>For any inquiries, please contact our support team.</p>
</div>

</body>
</html>
";
?>
