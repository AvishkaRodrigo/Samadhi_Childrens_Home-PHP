<?php 
include "database.php";

$sql="SELECT * FROM staff;";

$result=$conn->query($sql);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="tableView.css">
    <title>Document</title>
</head>
<body style="background-image: url('images/staff.jpg');" class="bgimage">
    
<table class="table">
       <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Username</th>
            <!-- <th>Password</th> -->
            <th></th>
            <th></th>
        </tr>
        </thead>
        
        <tbody>
            <?php
            //row =firstrow
            while($row=$result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['staffId']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['ContactNo'] ?></td>
                    <td><?php echo $row['Address'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <!-- <td><?php echo $row['password'] ?></td>                      -->
                    <td><a href="staffDelete.php?id=<?php echo $row['staffId'] ?>" ><img src="images/delete.png" class="deleteicon"></a></td>
                    <td><a href="staffAdd.php?id=<?php echo $row['staffId'] ?>" ><img src="images/edit.png" class="updateicon"></a>
                    
                    
                </tr>
            <?php
            }
            ?>            
        </tbody>
    </table>  
</body>
</html>