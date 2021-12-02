<?php
    include "database.php";

    $name = $fname = $bday= $gender =$file ="";
    $errors = array('name'=>'', 'fname'=>'','bday'=>'','gender'=>'','file'=>'');

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if (empty($_POST['fname'])){
            $errors['fname'] = "First name is required";
        }else{
            $fname = validate($_POST['fname']);
            if (!preg_match('/^([a-zA-Z\s]+)$/',$fname)){
                $errors['fname'] = "Invalid";
            }
        }
        if (empty($_POST['bday'])){
            $errors['bday'] = "Date is required";
        }
        if (empty($_POST['gender'])){
            $errors['gender'] = "Select your gender";
        }
       

            
    }
   
   
?>


 <!-- update code -->
<?php
    // include "childUpdate.php";
    // if(isset($_GET['id'])){

    //     $oldId=$_GET['id'];
    //     $sql="SELECT name,gender,birthdate FROM childdetails WHERE id='$oldId';";
    //     $result = $conn ->query($sql);

    //     // $values = array ("","","");
    //     while($row=$result->fetch_assoc()){
    //         $x1= $row['name'];
    //         echo $row['gender'];
    //         echo $row['birthdate'];

            
    //     }

        //////////////////

    include "database.php";
    
    if(isset($_GET['id'])){
        $updateId=$_GET['id'];    

        $sql = "SELECT id,name,gender,DATE_FORMAT(birthdate, '%m/%d/%Y') AS birthdate FROM childdetails WHERE name='Rodrigo';";
        $result = $conn->query($sql);

    if($_row=$result->fetch_assoc()){
        //global $updatename,$updategender,$updatebirthdate;
        global $updateid;
        $updateid = $_row['id'];
        $updatefname=$_row['name'];
        $updatebday=$_row['birthdate'];
        $updategender=$_row['gender']; 
        //$name = $fname = $bday= $gender =$file ="";
      
        echo $updateId.$updatefname,$updatebday,$updategender;
        
        
    }   
    
    $sql="SELECT name,gender,birthdate FROM childdetails WHERE id='$updateid';";
        $result = $conn ->query($sql);

        // $values = array ("","","");
        while($row=$result->fetch_assoc()){
           global $updatename,$updategender,$updatebirthdate;
           $fname =  $row['name'];
           $gender =  $row['gender'];
           $birtdate = $row['birthdate'];
        }

    }


    if (array_filter($errors)){
        echo 'Errors in form';
    }else{
        if(isset($_GET['submit'])){
            $uname =$_POST['fname'];
            $udate =$_POST['bday'];
            $ugedner =$_POST['gender'];

            $sql = "UPDATE childdetails SET name='$uname', gender='$ugender',birthdate='$ubirthdate' WHERE id = '$updateid' ;";
            $result = $conn -> query($sql);
            if($result==TRUE){
                echo "Record Updated Successfully ";
                header ("location:childView.php");
            }else{
                echo "Error".$sqlquery."<br>".$conn->error;
            }
        }

    }
?>

    
    



<!-- submit code -->
<?php
include "database.php";
    if (array_filter($errors)){
        echo 'Errors in form';
    }else{
        if(isset($_POST['submit'])){
            $name =$_POST['fname'];
            $date =$_POST['bday'];
            $gedner =$_POST['gender'];

            $sql = "INSERT INTO childdetails(name,birthdate,gender) VALUES ('$name','$date','$gedner');";
            $result =$conn -> query($sql);
            if($result==TRUE){
                echo "Child Added Successfully ";
                header("location:childView.php");
            }else{
                echo "Error".$sql."<br>".$conn->error;
            }
        }

    }
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="childAdd.css">
	<title>Child Form</title>
</head>
<body>
    
<!--Form1-->
    <div class="form1">
        
            <div class="head1">
                <b>Child Form</b>
            </div>    
          

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST"  class="form1">
        
                
        <!-- <script>
            document.getElementById("fullname").setAttribute('value',<?php echo $row['fullname'] ?> );
            document.getElementById("gender").setAttribute('value',$ugender);
            document.getElementById("birthdate").setAttribute('value',$ubirthdate);
        </script> -->

        <div class="commonclass">
            <label for="fullname">Fulll Name :</label><br>
            <input type="text" value="<?php echo validate($fname)?>" id="fullname" name="fname" placeholder="ex :  Avishka  Rodrigo"><br>
            <span class="error" style="margin-left: 10%;"><?php echo $errors["fname"];?></span>
        </div>    

            <div class="commonclass">
            <label for="birthdate">Birthdate :</label><br>
            <input type="date" name="bday" id="birthdate" value="<?php echo validate($birtdate)?>"><br>
            <span class="error" style="margin-left: 10%;"><?php echo $errors["bday"];?></span>
        </div>    

        <div class="radioclass">
            <div class="lblgender">
                <label for="Gender">Gender :</label><br>    
            </div>
            <div id="radioinput">
                <input type="radio" name="gender" id="gender" value="male">
                <label id="gender" for="radio">Male</label>
           
                <input type="radio" name="gender" id="gender" value="" required>
                <label id="gender" for="radio">Female</label><br>
                <span class="error" ><?php echo $errors["gender"];?></span> 
            </div>     
        </div>   

        <div class="commonclass">
            <label for="image">Child Image :</label><br>
            <input type="file" name="file"  id="file"><br>
            <span class="error selectgender" style="margin-left: 10%;"><?php echo $errors["file"];?></span>
            <br>
        </div>

       
        <input type="submit" name="submit"  id="submit" value="Insert">
        
        
    </form>
    </div>


</body>
</html>