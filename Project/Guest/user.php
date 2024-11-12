<?php
include('../Asset/Connection/Connection.php');

if (isset($_POST["btn_submit"])) {
    $name = $_POST["txt_name"];
    $email = $_POST["txt_email"];
    $password = $_POST["txt_password"];
    $phone = $_POST["txt_phone"];
    $district = $_POST["btn_district"];
    $place = $_POST["btn_place"];
    $photo = $_FILES["file_photo"]['name'];
    $tempphoto = $_FILES["file_photo"]["tmp_name"];
    move_uploaded_file($tempphoto, "../Asset/Files/user/photo/" . $photo);
    $proof = $_FILES["file_proof"]['name'];
    $tempphoto = $_FILES["file_proof"]["tmp_name"];
    move_uploaded_file($tempphoto, "../Asset/Files/user/proof/" . $proof);

    $insQry = "INSERT INTO tbl_user(user_name, user_email, user_password, user_phone, user_photo, user_proof, place_id) 
               VALUES ('$name', '$email', '$password', '$phone', '$photo', '$proof', '$place')";
    
    if ($con->query($insQry)) {
        //echo "Inserted";
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registration</title>
    <style>
        /* Your provided styles */
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin: 0 auto; /* Centering the form on the page */
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input[type="text"],
        .form-group input[type="file"],
        .form-group select { /* Added file input and select styles */
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-group input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #218838;
        }
        .nav-links {
            text-align: center;
            margin-top: 10px;
        }
        .nav-links a {
            color: #007bff;
            text-decoration: none;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }body
        {
            background-image:url("../Asset/Templates/login/image/log.jpg");
            background-size:cover;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <h2>Register</h2>
            <div class="form-group">
                <label for="txt_name">Name</label>
                <input type="text" name="txt_name" id="txt_name" required />
            </div>
            <div class="form-group">
                <label for="txt_email">Email</label>
                <input type="email" name="txt_email" id="txt_email" required />
            </div>
            <div class="form-group">
                <label for="txt_password">Password</label>
                <input type="text" name="txt_password" id="txt_password" required />
            </div>
            <div class="form-group">
                <label for="txt_phone">Phone</label>
                <input type="text" name="txt_phone" id="txt_phone" pattern="[0-9]{10}" required />
            </div>
            <div class="form-group">
                <label for="file_photo">Photo</label>
                <input type="file" name="file_photo" id="file_photo" required />
            </div>
            <div class="form-group">
                <label for="file_proof">Proof</label>
                <input type="file" name="file_proof" id="file_proof" required />
            </div>
            <div class="form-group">
                <label for="btn_district">District</label>
                <select name="btn_district" id="btn_district" onchange="getPlace(this.value)" required>
                    <option value="">.....select....</option>
                    <?php
                    $selQryOne = "SELECT * FROM tbl_district";
                    $resultone = $con->query($selQryOne);
                    while ($data = $resultone->fetch_assoc()) {
                        echo '<option value="' . $data["district_id"] . '">' . $data["district_name"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="btn_place">Place</label>
                <select name="btn_place" id="btn_place" required>
                    <!-- Options will be populated by AJAX -->
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                <input type="button" name="btn_cancel" id="btn_cancel" value="Cancel" onclick="window.location.href='login.php';" />
            </div>
            <div class="nav-links">
                <a href="login.php">Login</a>
            </div>
        </form>
    </div>
    <script src="../Asset/JQ/jQuery.js"></script>
    <script>
        function getPlace(did) {
            $.ajax({
                url: "../Asset/AjaxPages/AjaxPlace.php?did=" + did,
                success: function (result) {
                    $("#btn_place").html(result);
                }
            });
        }
    </script>
</body>
</html>
