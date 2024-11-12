<?php
include('../Asset/Connection/Connection.php');
session_start();

$user_id = $_SESSION['uid'];

$query = "SELECT feedback_content,feedback_date FROM tbl_feedback WHERE user_id = '".$_SESSION['uid']."'";
$result = $con->query($query);
?>

<!DOCTYPE html>
<html>
<head>
   
</head>
<body>
<table width="600" border="1">
   <?php
    $i = 0;
    $selQry = "SELECT feedback_content,feedback_date FROM tbl_feedback WHERE user_id = '".$_SESSION['uid']."'";
    $result = $con->query($query);
    while($data = $result->fetch_assoc()) {
      $i++;
    ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $data["feedback_content"]; ?></td> 
        <td><?php echo $data["feedback_date"]; ?></td>
    <?php
    }
    ?>
  </table>
</body>
</html>