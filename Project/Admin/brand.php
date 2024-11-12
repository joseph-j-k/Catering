<?php 
include("../Asset/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
 $name = $_POST["txt_brand"];
 $ins = "insert into tbl_brand(brand_name)values('".$name."')";
 if($con -> query($ins))
 {
  
  echo "Inserted";
  
  }
 
 
 }
if(isset($_GET["did"]))
{
 $delQry="delete from tbl_brand where brand_id=".$_GET["did"];
 if($con -> query($delQry))
  {
   ?>
         <script>
   alert("deleted");
   Window.location="Brand.php";
   </script>
         <?php
 }}
?>


















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="364" border="1">
    <tr>
      <td width="172">Brand Name</td>
      <td width="176"><label for="txt_brand"></label>
      <input type="text" name="txt_brand" id="txt_brand" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_submit2" id="btn_submit2" value="cancel" /></td>
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <td>Sl.No</td>
      <td>Name</td>
      <td>Action</td>
    </tr>
    <?php
 $i=0;
 $selQry="select*from tbl_brand";
 $result=$conn->query($selQry);
 while($data=$result->fetch_assoc())
 {
  $i++;
  ?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $data["brand_name"] ?></td>
      <td> <td><a href="brand.php?did=<?php echo $data["brand_id"];?>">delete</a></td></td>
      <td></td>
    </tr>
    <?php
 }
 ?>
  </table>
</form>
</body>
</html>