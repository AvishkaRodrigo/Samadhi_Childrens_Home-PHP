<?php 

include "database.php";
if(isset($_GET['id'])){
    $deleteId=$_GET['id'];
    $sqlquery="DELETE FROM staff WHERE staffId='$deleteId';";
    $result=$conn->query($sqlquery);
    if($result==TRUE){
        echo "Record Deleted Successfully ";
        header ("location:staffView.php");
       
    }else{
        echo "Error".$sqlquery."<br>".$conn->error;
    }
}

?>