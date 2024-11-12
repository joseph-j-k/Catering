<?php
include('../Asset/connection/connection.php');
include('Head.php');
if (isset($_POST["btn_submit"])) {
    $name = $_POST['txt_name'];
    $photo = $_FILES['file_photo']['name'];
    $tempphoto = $_FILES["file_photo"]["tmp_name"];
    move_uploaded_file($tempphoto, "../Asset/Files/user/photo/" . $photo);
    $price = $_POST['txt_price'];
    $insQry = "INSERT INTO tbl_food(food_name, food_photo, food_price) VALUES ('$name', '$photo', '$price')";
    
    if ($con->query($insQry)) {
        echo "Inserted";
    }
}

if (isset($_GET["did"])) {
    $delQry = "DELETE FROM tbl_food WHERE food_id=" . $_GET["did"];
    if ($con->query($delQry)) { ?>
        <script>
            alert("Deleted");
            window.location = "food.php";
        </script>
    <?php
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Food Management</title>
    <style>
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            margin: 20px auto;
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
        .form-group input[type="file"] {
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
        .food-list {
            max-width: 800px;
            width: 100%;
            margin: 20px auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .food-list table {
            width: 100%;
            border-collapse: collapse;
        }
        .food-list th, .food-list td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .food-list th {
            background-color: #f4f4f9;
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
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Add Food Item</h2>
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <div class="form-group">
                <label for="txt_name">Name</label>
                <input type="text" name="txt_name" id="txt_name" required />
            </div>
            <div class="form-group">
                <label for="file_photo">Photo</label>
                <input type="file" name="file_photo" id="file_photo" required />
            </div>
            <div class="form-group">
                <label for="txt_price">Price</label>
                <input type="text" name="txt_price" id="txt_price" required />
            </div>
            <div class="form-group">
                <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
            </div>
        </form>
    </div>

    <div class="food-list">
        <h2>Food List</h2>
        <table>
            <tr>
                <th>Sl No.</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php
            $i = 0;
            $selQry = "SELECT * FROM tbl_food";
            $result = $con->query($selQry);
            while ($data = $result->fetch_assoc()) {
                $i++; ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data["food_name"] ?></td>
                    <td><img src="../Asset/Files/user/photo/<?php echo $data["food_photo"] ?>" alt="<?php echo $data["food_name"] ?>" width="50" /></td>
                    <td><?php echo $data["food_price"] ?></td>
                    <td><a href="food.php?did=<?php echo $data["food_id"]; ?>">Delete</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <div class="nav-links">
        <a href="adminhomepage.php">Home</a>
    </div>
</body>
</html>
<?php
include('Foot.php');
?>
