<?php
include('../Asset/Connection/Connection.php');
session_start();
if(isset($_POST["btn_search"])) {
    $type_id = $_POST['btn_type'];
	
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Package</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Package Type</td>
      <td>
        <select name="btn_type" id="btn_type">
          <option value="">.....select....</option>
           <?php
          
          $selTypeQry = "SELECT type_id, type_name FROM tbl_type";
          $resultType = $con->query($selTypeQry);
          
          while($row = $resultType->fetch_assoc()) {
            echo "<option value='".$row['type_id']."'>".$row['type_name']."</option>";
          }
          ?>
         
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_search" id="btn_search" value="Search" />
      </div></td>
    </tr>
  </table>
  <table width="600" border="1">
    <tr>
        <th>Package ID</th>
        <th>Details</th>
        <th>Type name</th>
        <th>Action</th>
    </tr>
    <?php
   $selQry = "select p.packagehead_id,p.packagehead_details,t.type_name FROM tbl_packagehead p 
   INNER JOIN tbl_type t ON p.type_id = t.type_id 
   where p.user_id = 0";
	 if(isset($type_id) && !empty($type_id)) {
      $selQry .= " and p.type_id = '$type_id'  ";
    }

    
    $resultOne = $con->query($selQry);
    while($dataOne = $resultOne->fetch_assoc()) {
    ?> 
	
            <tr>
                <td><?php echo $dataOne['packagehead_id']; ?></td>
                <td><?php echo $dataOne['packagehead_details']; ?></td>
                <td><?php echo $dataOne['type_name']; ?></td>
                
                <td><a href="viewpackagebody.php?pid=<?php echo $dataOne["packagehead_id"];?>">more</a></td
            ></tr>
            <?php
	}
	?>
    </table>
  <table border="1">
        <td colspan="4"><a href="Userhomepage.php">Home</a></td>
  
</table>

</body>
</html>

 