<?php
include('../Asset/Connection/Connection.php');


if(isset($_GET["pid"])) {
  $upqry = "UPDATE tbl_booking SET booking_status = 1 WHERE booking_id = ".$_GET["pid"];
  
  if($con->query($upqry)) {
    ?>
    <script>
      alert("Package Accepted");
      window.location = "viewbookingreq.php";
    </script>
    <?php
  } else {
    ?>
    <script>
      alert("Error while accepting package");
    </script>
    <?php
  }
}


if(isset($_GET["rid"])) {
  $upqry = "UPDATE tbl_booking SET booking_status = 2 WHERE booking_id = ".$_GET["rid"];
  
  if($con->query($upqry)) {
    ?>
    <script>
      alert("Package Rejected");
      window.location = "viewbookingreq.php";
    </script>
    <?php
  } else {
    ?>
    <script>
      alert("Error while rejecting package");
    </script>
    <?php
  }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Package Requests</title>
</head>

<body>



<h2>Pending Bookings</h2>

<a href="Acceptedbooking.php">View Accepted Bookings</a> |
<a href="Rejectedbooking.php">View Rejected Bookings</a>



<form id="form1" name="form1" method="post" action="">
  <table width="800" border="1">
    <tr>
      <th>SL.no</th>
      <th>Event Date</th>
        <th>Location</th>   
         <th>Booking ID</th>
          <th>Package Details</th>
           <th>Booking Details</th>
            <th>Booking Count</th>
             <th>Booking Service</th>
              <th>Action</th>
    </tr>
  
    <?php
    $i = 0;
   echo  $selQry = "SELECT 
                *
               FROM 
                  tbl_booking bk
                  INNER JOIN tbl_packagehead ph ON ph.packagehead_id = bk.packagehead_id
                  INNER JOIN tbl_type t ON ph.type_id = t.type_id
                  INNER JOIN tbl_place p ON bk.place_id = p.place_id
				  where bk.booking_status = 0  and  bk.user_id = 0" ;
    $result = $con->query($selQry);
    
    while($data = $result->fetch_assoc()) {
      $i++;
    ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data["booking_fordate"]; ?></td> 
         <td><?php echo $data["place_name"]; ?></td>
       
        <td><?php echo $data["booking_id"]; ?></td>
         <td><?php echo $data["packagehead_details"];?></td>
        <td><?php echo $data["booking_details"]; ?></td>
        <td><?php echo $data["booking_count"]; ?></td>
        <td><?php echo $data["booking_service"]; ?></td>
        <td>
          <a href="viewbookingreq.php?pid=<?php echo $data['booking_id']; ?>">Accept</a> |
          <a href="viewbookingreq.php?rid=<?php echo $data['booking_id']; ?>">Reject</a>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
</form>
</body>
</html>