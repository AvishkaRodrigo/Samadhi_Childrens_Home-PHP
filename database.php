<?php 

    $servername="localhost";
    $username="root";
    $password="";
    $databse="samadhi";


    $conn=new mysqli($servername,$username,$password,$databse);

        if($conn->connect_error){
            die("Connection Faild".$conn->connect_error);
        }

?>