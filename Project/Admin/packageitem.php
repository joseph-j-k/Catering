<?php

include('../Asset/Connection/Connection.php');

if(isset($_POST["btn_submit"]))
{
  $food = $_POST['btn_food'];
  $packagehead_id =  $_GET['pid'];
  
  $insQry = "INSERT INTO tbl_packagebody(food_id,packagehead_id) VALUES ('".$food."','".$packagehead_id."')";
    if($con -> query($insQry)){
   echo("inserted");
	
}
}
if (isset($_GET["did"])) {
    $deleteId = $_GET["did"];
    $delQry = "DELETE FROM tbl_packagebody WHERE packagebody_id = '$deleteId'";
    if ($con->query($delQry)) {
        echo "<script>alert('Food item deleted successfully');</script>";
        // Optional: Redirect to the same page to refresh the items
		?>
       <script>window.location='packageitem.php?pid= <?php $_GET['pid'];?></script>
	   
       <?php
    } else {
        echo "<script>alert('Error deleting food item: " . $con->error . "');</script>";
    }
}
?>  

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Food</td>
      <td><label for="btn_food"></label>
        <select name="btn_food" id="btn_food">
      
       <option>.....select....</option>
          <?php
      $selQryOne="select * from tbl_food";
      $resultone=$con->query($selQryOne);
      while($data=$resultone->fetch_assoc())
      {
        ?>
              <option value="<?php echo $data["food_id"] ?>" > <?php echo $data["food_name"] ?></option>
              <?php
      }
      ?>
      </select></td>
    </tr>
    
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <table width="600" border="1">
  <tr>
     
      <th>Sl No.</th>
      <th>Package Details</th>
      <th>Type Name</th>
      <th>Type Id</th>
      <th>Food Name</th>
      <th>Food Price</th>
      <th>Action</th>
    </tr>
    <?php
    $i = 0;
     $selQry = "SELECT * from tbl_packagebody pb inner join tbl_packagehead ph  ON ph.packagehead_id = pb.packagehead_id
               INNER JOIN tbl_food f ON pb.food_id = f.food_id 
			   inner join tbl_type t On ph.type_id = t.type_id
               WHERE ph.packagehead_id = '".$_GET['pid']."'";
    $result = $con->query($selQry);
    while ($data = $result->fetch_assoc()) {
        $i++;
    ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["packagehead_details"] ?></td>
      <td><?php echo $data["type_name"] ?></td>
      <td><?php echo $data["type_id"] ?></td>
      <td><?php echo $data["food_name"] ?></td>
      <td><?php echo $data["food_price"] ?></td>
             <td><a href="packageitem.php?did=<?php echo $data["packagebody_id"];?>&pid=<?php echo $data['packagehead_id'] ?>">Delete</a></td> 

    </tr>
   
    <?php
    }
    ?>
    
  </table>
</form>
</body>
</html>