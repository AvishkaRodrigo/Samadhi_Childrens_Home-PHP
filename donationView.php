<?php 
include "database.php";

$sql="SELECT * FROM donars;";

$result=$conn->query($sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="tableView.css">
    <title>Document</title>
</head>
<body style="background-image: url('images/donation1.jpg');" class="bgimage">
    
<table class="table">
       <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Donation Type</th>
            <th>Date</th>
            <!-- <th>Donation details</th> -->
            
        </tr>
        </thead>
        
        <tbody>
            <?php
            //row =firstrow
            while($row=$result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['donarId']; ?></td>
                    <td><?php echo $row['donarName']; ?></td>
                    <td><?php echo $row['contactNo'] ?></td>
                    <td><?php echo $row['Address'] ?></td>
                    <td><?php echo $row['donationType'] ?></td>
                    <td><?php echo $row['date'] ?></td>                     
                    <!-- <td><a href="#" ><img src="images/delete.png" class="deleteicon"></a></td> -->
                </tr>
            <?php
            }
            ?>            
        </tbody>
    </table>  
</body>
</html>