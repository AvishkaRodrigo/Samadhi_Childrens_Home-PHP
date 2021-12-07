<?php
include "database.php";

    $sql="SELECT * FROM childdetails;";
    $result=$conn ->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="tableView.css">
    <title>Document</title>
</head>
<body style="background-image: url('images/viewchild.jpg');" class="bgimage">
    

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php  
                while($row=$result->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['birthdate'] ?></td>                     
                        <td><a href="childDelete.php?id=<?php echo $row['id'] ?>"><img src="images/delete.png" class="deleteicon" ></a></td>
                        <td><a href="childAdd.php?id=<?php echo $row['id'] ?>"><img src="images/edit.png" class="updateicon"></a></td>
                    </tr>
                <?php
                }
            ?>     
        </tbody>
    </table>

</body>
</html>