<?php

include('../Asset/Connection/Connection.php');
session_start();
include("Head.php");

if (isset($_GET['pid'])) {
    $packagehead_id = $_GET['pid'];

    if (isset($_POST["btn_submit"])) {
        $food = $_POST['btn_food'];

        $insQry = "INSERT INTO tbl_packagebody(food_id, packagehead_id) VALUES('" . $food . "', '" . $packagehead_id . "')";
        if ($con->query($insQry)) {
            echo "<script> alert('Food added to the package successfully');</script>";
        } else {
            echo "<script> alert('Error adding the food to package');</script>";
        }
    }
}
if (isset($_GET["did"])) {
    $delQry = "DELETE FROM tbl_packagebody WHERE packagebody_id=" . $_GET["did"];
    if ($con->query($delQry)) {
?>
        <script>
            alert("Deleted");
            window.location = "custompackageitem.php?pid=<?php echo $_GET['pid'] ?>";
        </script>
<?php
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Package Details</title>

    <!-- Add your CSS styles here -->
    <style>
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin: 20px auto;
        }
        .form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          
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
        .form-group select {
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
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

        .newcon {
            display: flex;
            justify-content: center;
            align-items: center;
        }
       
    </style>
</head>

<body>
    <form id="form1" name="form1" method="post" action="">
        <div class="form-container">
            <h2>Custom Package</h2>
            <div class="form-group">
                <label for="btn_food">Food</label>
                <select name="btn_food" id="btn_food">
                    <option>.....select....</option>
                    <?php
                    $selQryOne = "SELECT * FROM tbl_food";
                    $resultone = $con->query($selQryOne);
                    while ($data = $resultone->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $data["food_id"] ?>"> <?php echo $data["food_name"] ?> <?php echo $data["food_price"] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
            </div>
        </div>
        <div class="form">
        <table>
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
            $selQry = "SELECT * FROM tbl_packagebody pb 
                       INNER JOIN tbl_packagehead ph ON ph.packagehead_id = pb.packagehead_id
                       INNER JOIN tbl_food f ON pb.food_id = f.food_id 
                       INNER JOIN tbl_type t ON ph.type_id = t.type_id
                       WHERE ph.packagehead_id = '" . $_GET['pid'] . "'";
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
                    <td><a href="custompackageitem.php?did=<?php echo $data["packagebody_id"]; ?>&&pid=<?php echo $_GET['pid'] ?>">Delete</a></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="6" style="text-align: right;"><a href="reqpackage.php?pid=<?php echo $packagehead_id; ?>">Req</a></td>
            </tr>
        </table>
    </div>
    </form>
    
</body>

</html>

<?php
include('Foot.php');
?>
