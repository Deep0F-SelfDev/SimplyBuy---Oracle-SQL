<?php include('SimplyBuyServer.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SimplyBuy</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

    <link rel="stylesheet" href="AdminProfileStyleSheet.css">

</head>

<body>
    <div class="student-profile py-4">
        <div class="container">
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Bootstrap Navbar with Logo Image</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

                <link rel="stylesheet" href="AdminProfileStyleSheet.css">
                <link rel="stylesheet" href="ProductList.css">
            </head>

            <body>
                <div class="m-4">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-radius: 10px;">
                        <div class="container-fluid">
                            <a href="#" class="navbar-brand">
                                <img src="Images/Logo.png" height="35px" alt="Simplybuy">
                            </a>
                            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarCollapse">
                                <div class="navbar-nav">
                                    <a href="home.php" class="nav-item nav-link active">Home</a>
                                </div>
                                <div class="navbar-nav ms-auto">
                                    <a href="home.php?logout='1'" class="nav-item nav-link active">Logout </a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </body>

            </html>

    <?php

        $dbCon = mysqli_connect('localhost','root', '', 'registration');
        if(mysqli_connect_errno()){
            echo 'could not connect to server.';
        }
        $name = $_SESSION["username"];
        $sql = "SELECT * From user WHERE UserName = '$name';" ;
        $result = mysqli_query($dbCon,$sql) or die("Error in $sql");
        $row = mysqli_fetch_assoc($result);

    ?>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent text-center">
                            <?php echo "<img class='profile_img' src = '{$row['img_dir']}' width = 50% >"; ?>
                            <h3><?php echo $row['UserName']; ?></h3>
                            <form method="post" action="addProfileImage.php" enctype="multipart/form-data">
                                <input cols="43" type="file" name="image" class="form-control">
                                <br>
                                <button class="btn btn-primary btn-block" type="submit" name="setUserImage">Upload Profile Image</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>User Info</h3>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Full Name</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $row['UserName']; ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Email</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $row['Email']; ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Phone</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $row['PhoneNumber']; ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Adress</th>
                                    <td width="2%">:</td>
                                    <td><?php echo $row['Address']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div style="height: 26px"></div>
                </div>
            </div>

            <br><br>

<?php

    $user =  $_SESSION['username'];

    $dbCart = mysqli_connect('localhost','root', '', 'simplybuy');
    if(mysqli_connect_errno()){
        echo 'could not connect to server.';
    }

    $sql = "SELECT * From orders,product WHERE orders.UserName = '$user' AND product.ProductID = orders.ProductID;" ;
    $result = mysqli_query($dbCart,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck>0):
?>

    <div class="list">
        <div class="box">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Ordered Product Name</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>

    <?php

        while ($row = mysqli_fetch_assoc($result)):

    ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['ProductName']; ?></td>
                        <td><?php echo $row['OrderQuantity']; ?></td>
                    </tr>
                </tbody>

                <?php
                        endwhile;
                    endif;
                ?>

            </table> 
             <div class="link-right">
                <a href=""></a>
             </div>
        </div>
    </div>


            <br><br>

            <div class= "col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>User Feedback</h3>
                    </div>
                    <br>
                    <div class="card-body pt-0">
                        <form method="post" action="AddReview.php">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Enter Feedback Or Suggestions</th>
                                    <td width="2%">:</td>
                                    <td><input maxlength="255" size="70" type="text" name="feedback" placeholder="Enter Text Here(Max 255)"></td>
                                </tr>
                            </table>
                            <button class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <br>

        </div>
    </div>
</body>

</html>