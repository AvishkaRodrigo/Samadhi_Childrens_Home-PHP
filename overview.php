<?php
include "database.php";
?>




<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="overview.css">
<title>Login</title>
</head>
<body>  
<div id="fullcontainer">

<div id="cardmain">
        <header id="heading">#Donations</header>   
        <hr></hr>
            <div id="details">
            <?php
                    $sql="SELECT SUM(cashAmount) FROM `donationcashdetails`;";
                    $result=$conn->query($sql);

                    while($row=$result->fetch_assoc()){
                        echo $row['SUM(cashAmount)'];
                    }
                ?>
            </div>

        </div>

<div id="container">
  

        <!-- //////////////////////////////////////// -->

        <div id="card">
        <header id="heading">#Children</header>   
        <hr></hr>
            <div id="details">
                <?php
                    $sql="SELECT COUNT(id) FROM `childdetails`;";
                    $result=$conn->query($sql);

                    while($row=$result->fetch_assoc()){
                        echo $row['COUNT(id)'];
                    }
                ?>
            </div>
        </div>

        <!-- ////////////////////////////////////// -->

        <div id="card">
        <header id="heading">#Staff</header>   
        <hr></hr>
            <div id="details">
                <?php
                    $sql="SELECT COUNT(staffId) FROM `staff`;";
                    $result=$conn->query($sql);

                    while($row=$result->fetch_assoc()){
                        echo $row['COUNT(staffId)'];
                    }
                ?>
            </div>
        </div>

        <!-- //////////////////////////////////////// -->

        <div id="card">
        <header id="heading">#Labours</header>   
        <hr></hr>
            <div id="details">
                <?php
                    $sql="SELECT COUNT(laborId) FROM `labor`;";
                    $result=$conn->query($sql);

                    while($row=$result->fetch_assoc()){
                        echo $row['COUNT(laborId)'];
                    }
                ?>
            </div>

        </div>

    </div>
</div>
</body>
</html>