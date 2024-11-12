<?php
ob_start();

include('../Asset/Connection/Connection.php');
session_start();
include('Head.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Booking Information</title>

  <!-- Custom CSS -->
  <style>
    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* max-width: 600px; */
        width: -webkit-fill-available;
        width: 100%;
        margin: auto;
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f4f4f9;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    a {
        color: #007bff;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
    .nav-links {
        text-align: center;
        margin-top: 20px;
    }
    .nav-links a {
        color: #007bff;
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
    <h2>Booking Information</h2>
    <table>
      <tr>
        <th>Sl NO.</th>
        <th>Booking ID</th>
        <th>Package Name</th>
        <th>Package Details</th>
        <th>Event Date</th>
        <th>Event Address</th>
        <th>Event Details</th>
        <th>Count</th>
        <th>Services</th>
        <th>Booking Amount</th>
        <th>Status</th>
        <th>Action</th>
      </tr>

      <?php
      $i = 0;
      $selQry = "SELECT bk.booking_id, bk.booking_fordate, bk.booking_address, bk.booking_details, 
                        bk.booking_count, bk.booking_service, bk.booking_status, 
                        ph.packagehead_details, ph.packagehead_id, t.type_name, bk.booking_amount
                 FROM tbl_booking bk 
                 INNER JOIN tbl_packagehead ph ON ph.packagehead_id = bk.packagehead_id 
                 INNER JOIN tbl_type t ON ph.type_id = t.type_id 
                 WHERE bk.user_id = '" . $_SESSION['uid'] . "'";
      $result = $con->query($selQry);

      while ($data = $result->fetch_assoc()) {
        $i++;
      ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $data["booking_id"]; ?></td>
          <td><?php echo $data["type_name"]; ?></td>
          <td><?php echo $data["packagehead_details"]; ?></td>
          <td><?php echo $data["booking_fordate"]; ?></td>
          <td><?php echo $data["booking_address"]; ?></td>
          <td><?php echo $data["booking_details"]; ?></td>
          <td><?php echo $data["booking_count"]; ?></td>
          <td><?php echo $data["booking_service"]; ?></td>
          <td><?php echo $data["booking_amount"]; ?></td>
          <td><?php echo $data["booking_status"]; ?></td>
          <td>
            <?php if ($data["booking_status"] == '1') { ?>
              <a href="payment.php?bid=<?php echo $data['booking_id']; ?>">Pay Now</a>
            <?php } if ($data["booking_status"] == '2') { 
                echo "Rejected"; 
              } if ($data["booking_status"] == '3') { 
                echo "Completed"; 
              }
              if ($data["booking_status"] == '3') { ?>
              | <a href="addreview.php?packagehead_id=<?php echo $data['packagehead_id']; ?>">Add Review</a> 
              | <a href="invoice.php?booking_id=<?php echo $data['booking_id']; ?>">View Invoice</a>
            <?php } ?>
          </td>
        </tr>
      <?php } ?>
    </table>
</div>

<div class="nav-links">
  <a href="Userhomepage.php">Home</a>
</div>
</body>

</html>

<?php
ob_flush();
include('Foot.php');
?>
