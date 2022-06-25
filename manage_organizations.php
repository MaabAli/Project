<?php

session_start();

include_once('conection.php');


/******************************** */
$stmt = $conn->prepare("SELECT * FROM  	needer ");

//Execute  the statement
$stmt->execute();

// Get All Data And Assined  to Variable
$rows = $stmt->fetchAll();

$countUser = $stmt->rowCount();
//echo $countCraft;

$stmt = $conn->prepare("SELECT * FROM  	organization ");

//Execute  the statement
$stmt->execute();

// Get All Data And Assined  to Variable
$rows = $stmt->fetchAll();

$countOrg = $stmt->rowCount();
//echo $countComplaint;
/************************************ */

$stmt = $conn->prepare("SELECT * FROM  donner ");

//Execute  the statement
$stmt->execute();

// Get All Data And Assined  to Variable
$rows = $stmt->fetchAll();

$countDonners = $stmt->rowCount();
//echo $countCraft;

$stmt = $conn->prepare("SELECT * FROM  organization ");

//Execute  the statement
$stmt->execute();

// Get All Data And Assined  to Variable
$rows = $stmt->fetchAll();

if (isset($_GET['delete'])) {


    $orgId = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM  organization WHERE id=$orgId ");

    //Execute  the statement
    $stmt->execute();

    echo '<script language="javascript">';
    echo 'alert("تم  الحذف بنجاح")';
    echo '</script>';
  
    header("refresh:0;url=manage_organizations.php");
}



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- End link of library map leafet -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="js/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->



    <style>

    </style>
    <title> store data </title>
</head>

<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>


<div class="d-upbar">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p> <a href="index.php" style="color: #FFF ; "> خروج </a></p>
        </div>
    </div>
</div>
</div>


<div class="container dashbord-header">

<h2 style="text-align: center;margin-bottom:20px"> لوحة التحكم</h2>

<h4 style="text-align: center;margin-bottom:30px"> ادارة الموقع</h4>

<div class="row">

    <div class="col-md-4 ">
        <div class="col-md-12  shadow">
            <div class="col-md-12">
                <h3> <a href="manage_organizations.php" style="color: black"> المنظمات<a href="addOrg.php" class="fa fa-add button-primary m-2"></a> </a> </h3>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <p><i class="fa fa-bar-chart" aria-hidden="true"></i></p>
                </div>
                <div class="col-md-6">
                    <h4> <?php echo $countOrg  ; ?> </h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4  ">
        <div class="col-md-12 shadow">
            <div class="col-md-12">
                <h3> <a href="manage_user.php" style="color: black"> المحتاجين <a href="addNeeder.php" class="fa fa-add button-primary m-2"></a> </a> </h3>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <p><i class="fa fa-user" aria-hidden="true"></i></p>
                </div>
                <div class="col-md-6">
                    <h4> <?php echo $countUser ; ?> </h4>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4  ">
        <div class="col-md-12  shadow">
            <div class="col-md-12">
                <h3> <a href="manage_donners.php" style="color: black"> DONNERS </a> </h3>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <p> <i class="fa  fa-line-chart" aria-hidden="true"></i> </p>
                </div>
                <div class="col-md-6">
                    <h4> <?php echo $countDonners ; ?>  </h4>
                </div>
            </div>
        </div>
    </div>


</div>
</div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <table class="table table-striped shadow" style="border: 1px solid #DDD;direction: rtl;text-align: center">
                    <thead>
                        <tr>
                            <th scope="col"> الاسم </th>
                            <th scope="col">العنوان</th>
                            <th scope="col">البريد الإلكتروني</th>
                            <th scope="col"> الاجراءات </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($rows as $row) { ?>
                            <tr>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Address']; ?></td>
                                <td><?php echo $row['Email']; ?></td>
                                <td>
                                <a href="#" class="btn btn-primary"> <i class="fa fa-eye" aria-hidden="true"></i> </a>
                                <a href="manage_organizations.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                </td>
                            </tr>
                        <?php }   ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</body>


</html>