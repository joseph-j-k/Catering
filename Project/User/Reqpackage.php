<?php
include('../Asset/Connection/Connection.php');
session_start();
include('Head.php');

if (isset($_POST["btn_book"])) {
    $user_id = $_SESSION['uid'];
    $package_id = $_GET['pid'];
    $date = $_POST['txt_date'];
    $time = $_POST['txt_time'];
    $address = $_POST['txt_address'];
    $details = $_POST['txt_details'];
    $count = $_POST['txt_count'];
    $services = isset($_POST['btn_service']) ? $_POST['btn_service'] : '';
    $district = $_POST['btn_district'];
    $place = $_POST['btn_place'];

    $insQry = "INSERT INTO tbl_booking(booking_fordate,booking_fortime,booking_address,booking_details,booking_count,booking_service,booking_date,district_id,place_id,user_id,packagehead_id) VALUES('" . $date . "','" . $time . "','" . $address . "','" . $details . "','" . $count . "','" . $services . "',NOW(),'" . $district . "','" . $place . "','" . $_SESSION['uid'] . "','" . $_GET['pid'] . "')";

    if ($con->query($insQry)) {
        echo "<script>alert('Booking Successful'); window.location.href='mybookings.php';</script>";
    } else {
        echo "<script>alert('Error in booking');</script>";
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Booking Form</title>

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
        .form-group input[type="date"],
        .form-group input[type="time"],
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
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <div class="form-container">
            <h2>Book Your Event</h2>
            <div class="form-group">
                <label for="txt_date">Event Date</label>
                <input type="date" name="txt_date" id="txt_date" />
            </div>
            <div class="form-group">
                <label for="txt_time">Event Time</label>
                <input type="time" name="txt_time" id="txt_time" />
            </div>
            <div class="form-group">
                <label for="btn_district">District</label>
                <select name="btn_district" id="btn_district" onchange="getPlace(this.value)">
                    <option>.....select....</option>
                    <?php
                    $selQryOne = "SELECT * FROM tbl_district";
                    $resultone = $con->query($selQryOne);
                    while ($data = $resultone->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $data["district_id"] ?>"><?php echo $data["district_name"] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="btn_place">Place</label>
                <select name="btn_place" id="btn_place">
                    <option value="">Select Place...</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txt_address">Event Address</label>
                <input type="text" name="txt_address" id="txt_address" />
            </div>
            <div class="form-group">
                <label for="txt_details">Details</label>
                <input type="text" name="txt_details" id="txt_details" />
            </div>
            <div class="form-group">
                <label for="txt_count">Count</label>
                <input type="text" name="txt_count" id="txt_count" />
            </div>
            <div class="form-group">
                <label for="btn_service">Service</label><br />
                <input type="radio" name="btn_service" id="service_yes" value="1" />
                <label for="service_yes">YES</label>
                <input type="radio" name="btn_service" id="service_no" value="0" />
                <label for="service_no">NO</label>
            </div>
            <div class="form-group">
                <input type="submit" name="btn_book" id="btn_book" value="Book" />
            </div>
        </div>
    </form>
    <div class="nav-links">
        <a href="viewpackagebody.php?pid=<?php echo $_GET['pid']; ?>">Back</a>
    </div>

    <script src="../Asset/JQ/jQuery.js"></script>
    <script>
        function getPlace(did) {
            $.ajax({
                url: "../Asset/AjaxPages/AjaxPlace.php?did=" + did,
                success: function(result) {
                    $("#btn_place").html(result);
                }
            });
        }
    </script>
</body>

</html>

<?php
include('Foot.php');
?>
