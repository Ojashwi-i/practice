<?php include 'connect.php'; ?>

<?php
$firstname = $lastname = $dbemail = " ";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `information` WHERE `Id`= '$id'";
    $result = $conn->query($sql);
    if ($result) {
        $row =  $result->fetch_assoc();
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $dbemail = $row['email'];
    } else {
        echo "failed";
    }
}

if ($conn) {
    if (isset($_GET['id_new'])) {
        $id = $_GET['id_new'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["fname"])) {
            $vfname = "First Name required";
        } else {
            $fname = test_input($_POST["fname"]);
        }
        if (empty($_POST["lname"])) {
            $vlname = "Last Name required";
        } else {
            $lname = test_input($_POST["lname"]);
        }
        if (empty($_POST["email"])) {
            $vemail = "email required";
        } else {
            $email = test_input($_POST["email"]);
        }


        if (isset($_POST["update"]) && (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["email"]))) {
        } else {
            $sql = "UPDATE `information` SET `firstname`='$fname',`lastname`='$lname',`email`='$email' WHERE Id=$id";
            $query = $conn->query($sql);
            if ($query) {
                header('location:table.php');
            }
        }
    }
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action="update.php?id_new=<?php echo $id; ?>" method="post">
                <a href="table.php" class="btn btn-danger backbtn">Back</a> <br>
                <label for="fname">First Name:</label> <br>
                <span><?php echo $vfname; ?></span>
                <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $firstname;?>"> <br>
                <label for="lname">Last Name:</label> <br>
                <span><?php echo $vlname; ?></span>
                <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $lastname; ?>"> <br>
                <label for="email">Email:</label> <br>
                <span><?php echo $vemail; ?></span>
                <input type="text" name="email" id="email" class="form-control" value="<?php echo $dbemail; ?>"> <br>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</body>

</html>