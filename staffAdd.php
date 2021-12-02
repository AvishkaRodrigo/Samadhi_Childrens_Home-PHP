<?php
    include "database.php";

    $username1 = $iname = $bday= $nic = $contactnumber = $address = $post = "";
    $password = "dfds";
    $errors = array('username1'=>'', 'password'=>'','iname'=>'','nic'=>'','bday'=>'','contactnumber'=>'','address'=>'','post'=>'');

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

        
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if (empty($_POST['username1'])){
            $errors['username1'] = "username is required";
        }else{
            $username1 = validate($_POST['username1']);
            if (!preg_match('/^([a-zA-Z_]+)$/',$username1)){
                $errors['username1'] = "Invalid";
            }
        }

        if (empty($_POST['password'])){
            $errors['password'] = "password is required";
        }else{
            $password = validate($_POST['password']);
            if (!preg_match('/^([a-zA-Z0-9]+)$/',$password)){
                $errors['password'] = "Invalid";
            }
        }

        if (empty($_POST['iname'])){
            $errors['iname'] = "Name is required";
        }else{
            $iname = validate($_POST['iname']);
            if (!preg_match('/^([a-zA-Z.\s]+)$/',$iname)){
                $errors['iname'] = "Invalid";
            }
        }

        if (empty($_POST['bday'])){
            $errors['bday'] = "Date is required";
        }else{
            $bday = validate($_POST['bday']);
          
        }

        if (empty($_POST['nic'])){
            $errors['nic'] = "NIC numberis required";
        }else{
            $nic = validate($_POST['nic']);
            if (!preg_match('/^([0-9vVxX]{10,12})$/',$nic)){
                $errors['nic'] = "Invalid";
            }
        }

        if (empty($_POST['address'])){
            $errors['address'] = "Address is required";
        }else{
            $address = validate($_POST['address']);
            if (!preg_match('/^([a-zA-Z0-9\s\/,.]+)$/',$address)){
                $errors['address'] = "Invalid";
            }
        }

        if (empty($_POST['contactnumber'])){
            $errors['contactnumber'] = "Contact Number is required";
        }else{
            $contactnumber = validate($_POST['contactnumber']);
            if (!preg_match('/^([0-9]{10})$/',$contactnumber)){
                $errors['contactnumber'] = "Invalid";
            }
        }

        if (empty($_POST['post'])){
            $errors['post'] = "Select your post";
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
            $username1 =$_POST['username1'];
            $password =$_POST['password'];
            $iname = $_POST['iname'];
            $bday = $_POST['bday'];
            $nic = $_POST['nic'];
            $contactnumber = $_POST['contactnumber'];
            $address = $_POST['address'];
            $post = $_POST['post'];

            $sql = "INSERT INTO staff(Name,ContactNo,NIC,birthdate,Address,username,password,post) VALUES ('$iname','$contactnumber','$nic','$bday','$address','$username1','$password','$post');";
            $result =$conn -> query($sql);
            if($result==TRUE){
                echo "Staff Member Added Successfully ";
                header("location:staffView.php");
            }else{
                echo "Error".$sql."<br>".$conn->error;
            }
        }

    }
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="staffAdd.css">
	<title>Add-Staff Form</title>
</head>
<body>

<!--Form2-->
    <div class="form2">
        
    <div class="head1">
        <b>Staff Form</b>
    </div>    
  

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" class="form2">
       
          
        <?php
            if(isset($_GET['id'])){
                $updateId=$_GET['id'];
                echo  'id = ' .$updateId;
            }
        ?>

        <div class="commonclass">
            <label for="initialname">Name with initials:</label><br>
            <input type="text" value="<?php echo validate($iname)?>" id="initialname" name="iname">
            <span class="error" style="margin-left: 10%;"><?php echo $errors['iname'];?></span>
            
        </div>
    
        <div class="commonclass">
            <label for="birthdate">Birthdate :</label><br>
            <input type="date" value="<?php echo validate($bday)?>" name="bday" id="birthdate">
            <span class="error" style="margin-left: 10%;"><?php echo $errors['bday'];?></span>
        </div>    
 
        <div class="commonclass">
            <label for="nic">NIC :</label><br>
            <input type="text" value="<?php echo validate($nic)?>" id="nic" name="nic">
            <span class="error" style="margin-left: 10%;"><?php echo $errors["nic"];?></span>
        </div> 
           
        <div class="commonclass">
            <label for="contactno">Contact Number :</label><br>
            <input type="text" value="<?php echo validate($contactnumber)?>" id="contactno" name="contactnumber"><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <span class="error" ><?php echo $errors["contactnumber"];?></span>
        </div>  
        
        <div class="commonclass">
            <label for="address">Permanent Address :</label><br>
            <input type="text" value="<?php echo validate($address)?>" name="address" id="address"></input><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <span class="error" ><?php echo $errors["address"];?></span>
        </div> 

        <div class="commonclass">
            <label for="username">Username : </label><br>
            <input type="text" value="<?php echo validate($username1)?>" id="username1" name="username1">
            <span class="error" style="margin-left: 10%;"><?php echo $errors["username1"];?></span>
        </div>
    
        <div class="commonclass">
            <label for="password">Password : </label><br>
            <input type="password" value="<?php echo validate($password)?>" id="password" name="password">
            <span class="error" style="margin-left: 10%;"><?php echo $errors['password'];?></span>
        </div>  
        
        <div class="commonclass">
            <label for="post">Post :</label><br>    
            <select name="post" id="post" required>
                <option value="Admin">Admin</option>
                <option value="Principal">Principal</option>
                <option value="Matron">Matron</option>
            </select>
            <span class="error" style="margin-left: 10%;"><?php echo $errors["post"];?></span>
        </div>

        <div class="commonclass">
            <label for="Eimage">Employee Image :</label><br>
            <input type="file" name="file"  id="Efile">
        </div>
    
        <input type="submit" name="submit" id="submit" value="Insert">
      
            
    </form>
    </div>

</body>
</html>    