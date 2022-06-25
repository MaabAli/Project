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
//echo $countOrg;
/************************************ */

$stmt = $conn->prepare("SELECT * FROM  donner ");

//Execute  the statement
$stmt->execute();

// Get All Data And Assined  to Variable
$rows = $stmt->fetchAll();

$countDonners = $stmt->rowCount();
//echo $countDonners;

if (isset($_GET['active'])) {

    $userid = $_GET['active'];

    //  echo $userid;
    //****************************THIS IS UPDATE STATEMENT U CAN DO WHATEVER YOU THINK ITS RIGHT ***************************/

  //  $stmt = $conn->prepare(" UPDATE donner SET     active=0  WHERE id=$userid ");

    //Execute  the statement
    $stmt->execute();

    echo '<script language="javascript">';
    echo 'alert("تم بنجاح")';
    echo '</script>';
    // header("refresh:0;url=main.php");

    header("refresh:0;url=manage_donners.php");
}
//**************************************************** END OF UPDATE STATEMENT *********************/


 //****************************THIS IS UPDATE STATEMENT U CAN DO WHATEVER YOU THINK ITS RIGHT ***************************/
if (isset($_GET['noactive'])) {

    $userid = $_GET['noactive'];

    //  echo $userid;

   // $stmt = $conn->prepare(" UPDATE donner SET     active=1  WHERE id=$userid ");
    //Execute  the statement
  //  $stmt->execute();
    echo '<script language="javascript">';
    echo 'alert("تم بنجاح")';
    echo '</script>';
    // header("refresh:0;url=main.php");

    header("refresh:0;url=manage_donners.php");
}
//**************************************************** END OF UPDATE STATEMENT *********************/



if (isset($_GET['delete'])) {


    $userid = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM  donner WHERE id=$userid ");

    //Execute  the statement
    $stmt->execute();

    echo '<script language="javascript">';
    echo 'alert("تم  الحذف بنجاح")';
    echo '</script>';
    // header("refresh:0;url=main.php");

    header("refresh:0;url=manage_donners.php");
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
                        <h3> <a href="manage_carfts.php" style="color: black"> DONNERES </a> </h3>
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
                            <th scope="col"> إسم المتبرع </th>
                            <th scope="col">المبلغ المتبرع به</th>
                            <th scope="col">الوصف</th>
                            <th scope="col">تاريخ التبرع</th>
                            <th scope="col"> الاجراءات </th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($rows as $row) { ?>
                            <tr>
                                <th scope="row"><?php echo $row['name']; ?></th>
                                <td><?php echo $row['amount']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td>

                                   

                                        <a href="manage_donners.php?active=<?php echo $row['id']; ?>" class="btn btn-success"> <i class="fa fa-toggle-on" aria-hidden="true"></i> </a>
                                   

                                    

                                        <a href="manage_donners.php?noactive=<?php echo $row['id']; ?>" class="btn btn-secondary"> <i class="fa fa-toggle-off" aria-hidden="true"></i> </a>
                                 

                                    <a href="manage_donners.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </a>

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