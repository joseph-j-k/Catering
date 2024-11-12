<?php 
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
 $category=$_POST['txt_name'];
 $ins = "insert into tbl_category(category_name)values('".$category."')";
 if($conn -> query($ins))
 {
  
  echo "Inserted";
 }
}
if(isset($_GET["did"]))
{
 $delQry="delete from tbl_category where category_id=".$_GET["did"];
 if($conn->query($delQry))
  {
   ?>
         <script>
   alert("deleted");
   Window.location="Category.php";
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
  <table width="279" border="1">
    <tr>
      <td width="176">Category Name</td>
      <td width="33"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td height="27" colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_reset" id="btn_reset" value="Reset" /></td>
    </tr>
   
  </table>
  <table width="200" border="1">
    <tr>
      <td>Sl.No</td>
      <td>CatName</td>
      <td>ActionName</td>
    </tr>
    <?php
 $i=0;
 $selQry="select*from tbl_category";
 $result=$conn->query($selQry);
 while($data=$result->fetch_assoc())
 {
  $i++;
  ?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $data["category_name"] ?></td>
      <td><a href="Category.php?did=<?php echo $data["category_id"];?>">delete</a></td>
      <td></td>
    </tr>
    <?php
 }
 ?>
  </table>
</form>
</body>
</html>