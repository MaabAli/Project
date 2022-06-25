<?php
  include_once('conection.php');
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if(isset($_POST['add'])){
    $name = test_input($_POST['name']);
    $address = test_input($_POST['address']);
    $phone = test_input($_POST['phone']);
    $need = test_input($_POST['need']);
    $amount = test_input($_POST['amount']);
    
    $stmt = $conn->prepare("select * from need where name='$need'");
    $stmt->execute();
    $Fneed =  $stmt->fetchAll();
    $id = $Fneed[0]['id'];
    echo "<script>";
    echo "alert('.$id.');";
    echo "</script>";
    $nid = $conn->lastInsertId();
    $sql = "insert into needer values(".$nid.","."'$name'".","."'$address'".","."'$phone'".","."$amount".","."$id".");";
    $stmt = $conn->prepare($sql);
	  $stmt->execute();

    echo "<script>";
    echo "alert('تم بنجاح');";
    echo "</script>";
    header("Location: manage_donners.php");

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
<h5 style="text-align: center;margin-bottom:30px"> اضافة محتاج</h5>
<div class="container w-50 shadow">
<form action="" method="post">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control" id="name">
  </div>
  <div class="form-group">
    <label for="address">Address:</label>
    <input type="text" name="address" class="form-control" id="address">
  </div>
  <div class="form-group">
    <label for="phone">Phone Number:</label>
    <input type="text" name="phone" class="form-control" id="phone">
  </div>
  <div class="form-group">
    <label for="sel1">Need:</label>
    <select name="need" class="form-control" id="sel1">
      <?php
     
        $stmt = $conn->prepare("SELECT * FROM need");
        $stmt->execute();
        $needs = $stmt->fetchAll();
        foreach($needs as $need){
          echo "<option>".$need['name']."</option>";
        }
      ?>
    </select>
</div> 
<div class="form-group">
    <label for="amount">Amount:</label>
    <input type="text" name="amount" class="form-control" id="amount">
  </div>
  <button type="submit" name="add" class="btn btn-primary w-25 mx-auto ">Add Need</button>
</form> 
</div>
</body>
</html>