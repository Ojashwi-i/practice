<?php include 'connect.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="table.css">
</head>

<body>
    <div class="container my-4">

        <a href="form.php" class="btn btn-primary add">Add</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>

            </thead>

            <?php
            $sn = 1;

            $sql = "SELECT * FROM `information`";
            $result = $conn->query($sql);
            // echo "<pre>";
            // print_r($result);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tbody>
                        <tr>
                            <td><?php echo $sn ?></td>
                            <td><?php echo $row["firstname"] ?></td>
                            <td><?php echo $row["lastname"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><a href="update.php?id=<?php echo $row["Id"] ?>" class="btn btn-primary">Edit</a>
                            <button name="delete" class="btn btn-danger">Delete</button></td>
                        </tr>
                    </tbody>
            <?php
                    $sn++;
                }
            } else {
                echo "No results";
            }

            ?>
        </table>
    </div>
</body>

</html>