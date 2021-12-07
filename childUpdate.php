
<?php
    include "database.php";
    

    if(isset($_GET['id'])){
        $updateId=$_GET['id'];
        
        $sql = "SELECT * FROM childdetails WHERE id='$updateId';";
        $result = $conn->query($sql);
  
        if($_row=$result->fetch_assoc()){
            $id = $_row['id'];
            $fname=$_row['name'];
            $birthdate=$_row['birthdate'];
            $gender=$_row['gender']; 

            echo $fname.$id;
        }
        
        $sql="SELECT name,gender,birthdate FROM childdetails WHERE id='$id';";
        $result = $conn ->query($sql);

        // $values = array ("","","");
        while($row=$result->fetch_assoc()){
           global $uname,$ugender,$ubirthdate;
           $uname =  $row['name'];
           $ugender =  $row['gender'];
           $ubirtdate = $row['birthdate'];
        }

        header("location:childAdd.php");
        
    }
?>
    