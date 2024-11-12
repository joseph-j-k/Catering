<?php
session_start();
include('../Asset/Connection/Connection.php');

$user_id = $_SESSION['uid'];
if(isset($_POST["btn_submit"]))
{
  
  $content = $_POST['txt_content'];
  $date = $_POST['txt_date'];
  $insQry = "insert into tbl_feedback(feedback_content,feedback_date,user_id)values('".$content."','".$date."','".$_SESSION['uid']."')";
   if ($con->query($insQry)) {
       
        header("Location: Userhomepage.php"); 
        exit(); 
    } else {
        echo "Error: " . $con->error; 
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
      <td>Content</td>
      <td><label for="txt_content"></label>
      <input type="text" name="txt_content" id="txt_content" /></td>
    </tr>
     <td>Date</td>
      <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" /></td>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
<table border ="1">
 <tr>
        <td><a href="Userhomepage.php">Home</a></td>
   </tr> 
</body>
</html>
