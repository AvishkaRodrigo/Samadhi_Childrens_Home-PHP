<?php 
include "database.php";

$sql="SELECT * FROM labor;";

$result=$conn->query($sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="tableView.css">
    <title>Document</title>
</head>
<body style="background-image: url('images/labour.jpg');" class="bgimage">
    
<table class="table">
       <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Salary</th>
            
        </tr>
        </thead>
        
        <tbody>
            <?php
            //row =firstrow
            while($row=$result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['laborId']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['contact'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['salary'] ?></td>                     
                    
                </tr>
            <?php
            }
            ?>            
        </tbody>
    </table>  
</body>
</html>