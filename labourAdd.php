<?php
    include "database.php";

    $fname = $contactnumber = $address= $gender =$company =$salary ="";
    $errors = array('fname'=>'', 'contactnumber'=>'','address'=>'','gender'=>'','company'=>'','salary'=>'');

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
        
        if (empty($_POST['contactnumber'])){
            $errors['contactnumber'] = "Contact Number is required";
        }else{
            $contactnumber = validate($_POST['contactnumber']);
            if (!preg_match('/^([0-9]{10})$/',$contactnumber)){
                $errors['contactnumber'] = "Invalid";
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

        if (empty($_POST['salary'])){
            $errors['salary'] = "Salary is required";
        }

        if (empty($_POST['company'])){
            $errors['company'] = "Hiring company is required";
        }
    }
   
   
?>




<!-- submit code -->
<?php

global $sql;
include "database.php";
    if (array_filter($errors)){
        echo "Error".$sql."<br>".$conn->error;
    }else{
        if(isset($_POST['submit'])){
            $name =$_POST['fname'];
            $contactnumber =$_POST['contactnumber'];
            $gender =$_POST['gender'];
            $address =$_POST['address'];
            $salary = $_POST['salary'];
            $company = $_POST['company'];

            $sql = "INSERT INTO labor(name,contact,address,gender,salary,company)  VALUES ('$name','$contactnumber','$address','$gender','$salary','$company');";
            $result =$conn -> query($sql);
            if($result==TRUE){
                echo "Child Added Successfully ";
                header("location:labourView.php");
            }else{
                echo "Error".$sql."<br>".$conn->error;
            }
        }

    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="labourAdd.css">
	<title>Add-Labour Form</title>
</head>
<body>

<!--Form3-->   

    <div class="head1">
        <b>Labour Form</b>
    </div>    

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" class="form2">
        
        <div class="commonclass">
            <label for="initialname">Name with initial: </label><br>
            <input type="text" value="<?php echo validate($fname)?>" id="initialname" name="fname">
            <span class="error" style="margin-left: 10%;"><?php echo $errors["fname"];?></span>
        </div>
 
        <div class="commonclass">
            <label for="Gender">Gender :</label><br>
            <input type="radio" value="<?php echo validate($gender)?>" id="gender" name="gender"  value="male">
            <label for="gender">Male</label>
    
            <input type="radio" id="gender" name="gender"  value="female" required>
            <label for="gender">Female</label>
            <span class="error" style="margin-left: 10%;"><?php echo $errors["gender"];?></span>
        </div>  
           
        <div class="commonclass">
            <label for="contactno">Contact Number :</label><br>
            <input type="text" value="<?php echo validate($contactnumber)?>" id="contactno" name="contactnumber">
            <span class="error" style="margin-left: 10%;"><?php echo $errors["contactnumber"];?></span>
        </div>  
        
        <div class="commonclass">
            <label for="address">Permanent Address :</label><br>
            <textarea name="address" value="<?php echo validate($address)?>" id="textarea" rows="4" cols="50"></textarea>
            <span class="error" style="margin-left: 10%;"><?php echo $errors["address"];?></span>
        </div> 
        
        <div class="commonclass">
            <label for="post">Name of the hiring company :</label><br>
            <select name="company" id="post">
                <option value="sunshine">Sunshine</option>
                <option value="moonlight">Moonlight</option>
                
            </select>
            <br><span class="error" style="margin-left: 10%;"><?php echo $errors["company"];?></span>
        </div>
    
        <div class="commonclass">
            <label for="salary">Salary :</label><br>
            <input type="text" value="<?php echo validate($salary)?>"name="salary" id="birthdate">
            <span class="error" style="margin-left: 10%;"><?php echo $errors["salary"];?></span>
        </div>    

        <input type="submit" name="submit" id="submit" value="Insert">
      
            
    </form>

</body>
</html>    